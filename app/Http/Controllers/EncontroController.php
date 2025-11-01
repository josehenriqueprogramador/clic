<?php
namespace App\Http\Controllers;

use App\Models\Encontro;
use App\Models\Aula;
use App\Models\Professor;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EncontroController extends Controller
{
    public function index()
    {
        $encontros = Encontro::with(['aulas', 'turma'])->get();
        return view('encontros.index', compact('encontros'));
    }

    public function create()
    {
        $turmas = Turma::all();
        $aulas = Aula::all();
        $professores = Professor::all();
        return view('encontros.create', compact('turmas', 'aulas', 'professores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'turma_id' => 'required|exists:turmas,id',
            'aulas' => 'required|array|size:2',
            'aulas.*.id' => 'required|exists:aulas,id',
            'aulas.*.professor_id' => 'required|exists:professores,id',
        ]);

        DB::transaction(function () use ($request) {
            $encontro = Encontro::create([
                'data' => $request->data,
                'turma_id' => $request->turma_id,
            ]);

            foreach ($request->aulas as $aula) {
                $encontro->aulas()->attach($aula['id'], [
                    'professor_id' => $aula['professor_id'],
                ]);
            }
        });

        return redirect()->route('encontros.index')->with('success', 'Encontro criado com sucesso!');
    }

    public function edit($id)
    {
        $encontro = Encontro::with(['aulas'])->findOrFail($id);
        $turmas = Turma::all();
        $aulas = Aula::all();
        $professores = Professor::all();

        return view('encontros.edit', compact('encontro', 'turmas', 'aulas', 'professores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|date',
            'turma_id' => 'required|exists:turmas,id',
            'aulas' => 'required|array|size:2',
            'aulas.*.id' => 'required|exists:aulas,id',
            'aulas.*.professor_id' => 'required|exists:professores,id',
        ]);

        DB::transaction(function () use ($request, $id) {
            $encontro = Encontro::findOrFail($id);
            $encontro->update([
                'data' => $request->data,
                'turma_id' => $request->turma_id,
            ]);
            $encontro->aulas()->detach();
            foreach ($request->aulas as $aula) {
                $encontro->aulas()->attach($aula['id'], [
                    'professor_id' => $aula['professor_id'],
                ]);
            }
        });

        return redirect()->route('encontros.index')->with('success', 'Encontro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $encontro = Encontro::findOrFail($id);
            $encontro->aulas()->detach();
            $encontro->delete();
        });

        return redirect()->route('encontros.index')->with('success', 'Encontro excluído com sucesso!');
    }
}

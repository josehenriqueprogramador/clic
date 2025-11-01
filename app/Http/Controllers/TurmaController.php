<?php
namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Ciclo;
use App\Models\Localidade;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with(['curso', 'ciclo', 'localidade'])->get();
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        $cursos = Curso::all();
        $ciclos = Ciclo::all();
        $localidades = Localidade::all();
        return view('turmas.create', compact('cursos', 'ciclos', 'localidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
            'ciclo_id' => 'required|exists:ciclos,id',
            'localidade_id' => 'required|exists:localidades,id',
        ]);

        Turma::create($request->all());
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso.');
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        $ciclos = Ciclo::all();
        $localidades = Localidade::all();
        return view('turmas.edit', compact('turma', 'cursos', 'ciclos', 'localidades'));
    }

    public function update(Request $request, Turma $turma)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
            'ciclo_id' => 'required|exists:ciclos,id',
            'localidade_id' => 'required|exists:localidades,id',
        ]);

        $turma->update($request->all());
        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso.');
    }
}

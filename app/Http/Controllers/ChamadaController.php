<?php
namespace App\Http\Controllers;

use App\Models\Chamada;
use Illuminate\Http\Request;

class ChamadaController extends Controller
{
    public function index()
    {
        $chamadas = Chamada::all();
        return view('chamadas.index', compact('chamadas'));
    }

    public function create()
    {
        return view('chamadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'presenca' => 'required|boolean',
            'data' => 'required|date',
        ]);

        Chamada::create($request->all());
        return redirect()->route('chamadas.index')->with('success', 'Chamada registrada com sucesso!');
    }

    public function edit(Chamada $chamada)
    {
        return view('chamadas.edit', compact('chamada'));
    }

    public function update(Request $request, Chamada $chamada)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'presenca' => 'required|boolean',
            'data' => 'required|date',
        ]);

        $chamada->update($request->all());
        return redirect()->route('chamadas.index')->with('success', 'Chamada atualizada com sucesso!');
    }

    public function destroy(Chamada $chamada)
    {
        $chamada->delete();
        return redirect()->route('chamadas.index')->with('success', 'Chamada removida com sucesso!');
    }
}

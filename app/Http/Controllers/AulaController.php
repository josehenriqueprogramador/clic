<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Lista todas as aulas
     */
    public function index()
    {
        $aulas = Aula::with('curso')->get(); // opcional: carregar curso relacionado
        return view('aulas.index', compact('aulas'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('aulas.create', compact('cursos'));
    }

    /**
     * Armazena uma nova aula
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        Aula::create($request->only(['titulo', 'curso_id']));

        return redirect()->route('aulas.index')->with('success', 'Aula criada com sucesso!');
    }

    /**
     * Mostra o formulário de edição
     */
    public function edit(Aula $aula)
    {
        $cursos = Curso::all();
        return view('aulas.edit', compact('aula', 'cursos'));
    }

    /**
     * Atualiza uma aula existente
     */
    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $aula->update($request->only(['titulo', 'curso_id']));

        return redirect()->route('aulas.index')->with('success', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove uma aula
     */
    public function destroy(Aula $aula)
    {
        $aula->delete();

        return redirect()->route('aulas.index')->with('success', 'Aula removida com sucesso!');
    }
}


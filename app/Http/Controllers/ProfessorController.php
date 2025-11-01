<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    // Exibir todos os professores
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    // Exibir formulário de criação
    public function create()
    {
        return view('professores.create');
    }

    // Salvar novo professor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Cria o professor apenas com os campos permitidos
        Professor::create($request->only('nome'));

        return redirect()->route('professores.index')
                         ->with('success', 'Professor cadastrado com sucesso!');
    }

    // Exibir formulário de edição
    public function edit(Professor $professor)
    {
        return view('professores.edit', compact('professor'));
    }

    // Atualizar professor existente
    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Atualiza apenas o campo 'nome'
        $professor->update($request->only('nome'));

        return redirect()->route('professores.index')
                         ->with('success', 'Professor atualizado com sucesso!');
    }

    // Remover professor
    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professores.index')
                         ->with('success', 'Professor removido com sucesso!');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    /**
     * Exibe a lista de ciclos
     */
    public function index()
    {
        $ciclos = Ciclo::all();
        return view('ciclos.index', compact('ciclos'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        return view('ciclos.create');
    }

    /**
     * Armazena um novo ciclo
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'ano' => 'required|integer',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
        ]);

        Ciclo::create($request->only(['numero', 'ano', 'data_inicio', 'data_fim']));

        return redirect()->route('ciclos.index')->with('success', 'Ciclo criado com sucesso!');
    }

    /**
     * Mostra o formulário de edição
     */
    public function edit(Ciclo $ciclo)
    {
        return view('ciclos.edit', compact('ciclo'));
    }

    /**
     * Atualiza um ciclo existente
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        $request->validate([
            'numero' => 'required|integer',
            'ano' => 'required|integer',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
        ]);

        $ciclo->update($request->only(['numero', 'ano', 'data_inicio', 'data_fim']));

        return redirect()->route('ciclos.index')->with('success', 'Ciclo atualizado com sucesso!');
    }

    /**
     * Remove um ciclo
     */
    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();

        return redirect()->route('ciclos.index')->with('success', 'Ciclo removido com sucesso!');
    }
}


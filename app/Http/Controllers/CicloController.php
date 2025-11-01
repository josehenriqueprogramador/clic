<?php
namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function index()
    {
        $ciclos = Ciclo::all();
        return view('ciclos.index', compact('ciclos'));
    }

    public function create()
    {
        return view('ciclos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Ciclo::create($request->all());
        return redirect()->route('ciclos.index')->with('success', 'Ciclo criado com sucesso!');
    }

    public function edit(Ciclo $ciclo)
    {
        return view('ciclos.edit', compact('ciclo'));
    }

    public function update(Request $request, Ciclo $ciclo)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $ciclo->update($request->all());
        return redirect()->route('ciclos.index')->with('success', 'Ciclo atualizado com sucesso!');
    }

    public function destroy(Ciclo $ciclo)
    {
        $ciclo->delete();
        return redirect()->route('ciclos.index')->with('success', 'Ciclo removido com sucesso!');
    }
}

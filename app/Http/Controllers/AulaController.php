<?php
namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Aula::create($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula criada com sucesso!');
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $aula->update($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula atualizada com sucesso!');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula removida com sucesso!');
    }
}

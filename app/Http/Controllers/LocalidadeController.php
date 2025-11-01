<?php
namespace App\Http\Controllers;

use App\Models\Localidade;
use Illuminate\Http\Request;

class LocalidadeController extends Controller
{
    public function index()
    {
        $localidades = Localidade::all();
        return view('localidades.index', compact('localidades'));
    }

    public function create()
    {
        return view('localidades.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Localidade::create($request->all());
        return redirect()->route('localidades.index')->with('success', 'Localidade criada com sucesso.');
    }

    public function edit(Localidade $localidade)
    {
        return view('localidades.edit', compact('localidade'));
    }

    public function update(Request $request, Localidade $localidade)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $localidade->update($request->all());
        return redirect()->route('localidades.index')->with('success', 'Localidade atualizada com sucesso.');
    }

    public function destroy(Localidade $localidade)
    {
        $localidade->delete();
        return redirect()->route('localidades.index')->with('success', 'Localidade excluída com sucesso.');
    }
}

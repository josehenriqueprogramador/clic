@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Localidades</h1>
    <a href="{{ route('localidades.create') }}" class="btn btn-primary mb-3">Nova Localidade</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nome</th><th>Cidade</th><th>Ações</th></tr></thead>
        <tbody>
        @foreach($localidades as $localidade)
            <tr>
                <td>{{ $localidade->id }}</td>
                <td>{{ $localidade->nome }}</td>
                <td>{{ $localidade->cidade }}</td>
                <td>
                    <a href="{{ route('localidades.edit', $localidade) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('localidades.destroy', $localidade) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir esta localidade?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

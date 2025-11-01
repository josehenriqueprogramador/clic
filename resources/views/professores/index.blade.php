@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Professores</h1>
    <a href="{{ route('professores.create') }}" class="btn btn-primary mb-3">Novo Professor</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr></thead>
        <tbody>
        @foreach($professores as $professor)
            <tr>
                <td>{{ $professor->id }}</td>
                <td>{{ $professor->nome }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->telefone }}</td>
                <td>
                    <a href="{{ route('professores.edit', $professor) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('professores.destroy', $professor) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir este professor?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

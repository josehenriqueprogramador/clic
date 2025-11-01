@extends('layouts.app')
@section('title', 'Lista de Alunos')
@section('content')
<div class="container mt-4">
    <h1>Alunos</h1>
    <a href="{{ route('alunos.create') }}" class="btn btn-success mb-3">Novo Aluno</a>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <table class="table table-bordered">
        <thead><tr><th>Nome</th><th>Telefone</th><th>Turma</th><th>Ações</th></tr></thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->telefone }}</td>
                <td>{{ $aluno->turma->nome ?? '' }}</td>
                <td>
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente deletar?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Aulas</h1>
    <a href="{{ route('aulas.create') }}" class="btn btn-primary mb-3">Nova Aula</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Título</th><th>Data</th><th>Professor</th><th>Turma</th><th>Ações</th></tr></thead>
        <tbody>
        @foreach($aulas as $aula)
            <tr>
                <td>{{ $aula->id }}</td>
                <td>{{ $aula->titulo }}</td>
                <td>{{ $aula->data }}</td>
                <td>{{ $aula->professor->nome ?? '' }}</td>
                <td>{{ $aula->turma->nome ?? '' }}</td>
                <td>
                    <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir esta aula?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

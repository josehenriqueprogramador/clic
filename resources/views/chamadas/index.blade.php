@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Chamadas</h1>
    <a href="{{ route('chamadas.create') }}" class="btn btn-primary mb-3">Nova Chamada</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Aula</th><th>Presenças</th><th>Faltas</th><th>Ações</th></tr></thead>
        <tbody>
        @foreach($chamadas as $chamada)
            <tr>
                <td>{{ $chamada->id }}</td>
                <td>{{ $chamada->aula->titulo ?? '' }}</td>
                <td>{{ $chamada->presentes }}</td>
                <td>{{ $chamada->faltas }}</td>
                <td>
                    <a href="{{ route('chamadas.edit', $chamada) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('chamadas.destroy', $chamada) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir esta chamada?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

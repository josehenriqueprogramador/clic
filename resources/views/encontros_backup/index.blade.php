@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CLIC - Encontros</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Turma</th>
                <th>Aulas / Professores</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($encontros as $en)
                <tr>
                    <td>{{ $en->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($en->data)->format('d/m/Y') }}</td>
                    <td>{{ $en->turma->nome ?? '' }}</td>
                    <td>
                        @foreach($en->aulas->sortBy('ordem') as $a)
                            <strong>{{ $a->ordem }}°</strong> {{ $a->titulo }}<br>
                            <em>{{ $a->professor->nome ?? '' }}</em><br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('encontros.edit', $en->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('encontros.destroy', $en->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este encontro?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

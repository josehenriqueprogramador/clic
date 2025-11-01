@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📚 CLIC - Encontros</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('encontros.create') }}" class="btn btn-primary mb-3">+ Novo Encontro</a>

    @if ($encontros->isEmpty())
        <div class="alert alert-info">Nenhum encontro cadastrado.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Turma</th>
                    <th>Aulas / Professores</th>
                    <th style="width: 150px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($encontros as $encontro)
                    <tr>
                        <td>{{ $encontro->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($encontro->data)->format('d/m/Y') }}</td>
                        <td>{{ $encontro->turma->nome ?? '-' }}</td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                @foreach ($encontro->aulas as $aula)
                                    <li>
                                        <strong>{{ $aula->titulo }}</strong>
                                        — <em>{{ $aula->pivot->professor_id ? \App\Models\Professor::find($aula->pivot->professor_id)->nome : 'Sem professor' }}</em>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('encontros.edit', $encontro->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('encontros.destroy', $encontro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este encontro?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

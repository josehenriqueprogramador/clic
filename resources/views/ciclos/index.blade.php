@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Ciclos</h1>

  <a href="{{ route('ciclos.create') }}" class="btn btn-primary mb-3">Novo Ciclo</a>

  <table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Data de Início</th>
        <th>Data de Fim</th>
        <th>Ano</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ciclos as $c)
      <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->numero }}</td>
        <td>{{ $c->data_inicio ? \Carbon\Carbon::parse($c->data_inicio)->format('d/m/Y') : '' }}</td>
        <td>{{ $c->data_fim ? \Carbon\Carbon::parse($c->data_fim)->format('d/m/Y') : '' }}</td>
        <td>{{ $c->ano }}</td>
        <td>
          <a href="{{ route('ciclos.edit', $c->id) }}" class="btn btn-sm btn-primary">Editar</a>
          <form action="{{ route('ciclos.destroy', $c->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir este ciclo?')">
              Excluir
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection


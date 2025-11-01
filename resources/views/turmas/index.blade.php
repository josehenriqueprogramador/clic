@extends('layouts.app')
@section('title','Turmas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Turmas</h1>
  <a class="btn btn-success" href="{{ route('turmas.create') }}">Nova Turma</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<table class="table table-bordered">
<thead><tr><th>ID</th><th>Nome</th><th>Curso</th><th>Ciclo</th><th>Localidade</th><th>Professor</th><th>Ações</th></tr></thead>
<tbody>
@foreach($turmas as $t)
<tr>
  <td>{{ $t->id }}</td>
  <td>{{ $t->nome }}</td>
  <td>{{ $t->curso->nome ?? '' }}</td>
  <td>{{ $t->ciclo->numero ?? '' }}</td>
  <td>{{ $t->localidade->nome ?? '' }}</td>
  <td>{{ $t->professor->nome ?? '' }}</td>
  <td>
    <a class="btn btn-sm btn-primary" href="{{ route('turmas.edit', $t->id) }}">Editar</a>
    <form action="{{ route('turmas.destroy', $t->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Excluir</button></form>
  </td>
</tr>
@endforeach
</tbody>
</table>
@endsection

@extends('layouts.app')
@section('title','Editar Aluno')
@section('content')
<div class="container mt-4">
  <h2>Editar Aluno</h2>
  <form method="POST" action="{{ route('alunos.update', $aluno->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}" required>
    </div>
    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
@endsection

@extends('layouts.app')
@section('title','Nova Aula')
@section('content')
<h1>Nova Aula</h1>
<form method="POST" action="{{ route('aulas.store') }}">
  @csrf
  <div class="mb-3"><label>Título</label><input name="titulo" class="form-control" required></div>
  <div class="mb-3"><label>Curso</label>
    <select name="curso_id" class="form-control" required>
      @foreach(\App\Models\Curso::all() as $c)<option value="{{ $c->id }}">{{ $c->nome }}</option>@endforeach
    </select>
  </div>
  <button class="btn btn-success">Salvar</button>
</form>
@endsection

@extends('layouts.app')
@section('title','Editar Aula')
@section('content')
<h1>Editar Aula</h1>
<form method="POST" action="{{ route('aulas.update', $aula->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Título</label><input name="titulo" class="form-control" value="{{ $aula->titulo }}" required></div>
  <div class="mb-3"><label>Curso</label>
    <select name="curso_id" class="form-control" required>
      @foreach(\App\Models\Curso::all() as $c)
        <option value="{{ $c->id }}" @if($aula->curso_id==$c->id) selected @endif>{{ $c->nome }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Atualizar</button>
</form>
@endsection

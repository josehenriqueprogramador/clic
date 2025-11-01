@extends('layouts.app')
@section('title','Editar Turma')
@section('content')
<h1>Editar Turma</h1>
<form method="POST" action="{{ route('turmas.update', $turma->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="{{ $turma->nome }}"></div>

  <div class="mb-3"><label>Curso</label>
    <select name="curso_id" class="form-control" required>
      @foreach(\App\Models\Curso::all() as $c)
        <option value="{{ $c->id }}" @if($turma->curso_id==$c->id) selected @endif>{{ $c->nome }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3"><label>Ciclo</label>
    <select name="ciclo_id" class="form-control" required>
      @foreach(\App\Models\Ciclo::all() as $c)
        <option value="{{ $c->id }}" @if($turma->ciclo_id==$c->id) selected @endif>{{ $c->numero }} - {{ $c->ano }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3"><label>Localidade</label>
    <select name="localidade_id" class="form-control" required>
      @foreach(\App\Models\Localidade::all() as $l)
        <option value="{{ $l->id }}" @if($turma->localidade_id==$l->id) selected @endif>{{ $l->nome }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3"><label>Professor (opcional)</label>
    <select name="professor_id" class="form-control">
      <option value="">—</option>
      @foreach(\App\Models\Professor::all() as $p)
        <option value="{{ $p->id }}" @if($turma->professor_id==$p->id) selected @endif>{{ $p->nome }}</option>
      @endforeach
    </select>
  </div>

  <button class="btn btn-primary">Atualizar</button>
</form>
@endsection

@extends('layouts.app')
@section('title','Nova Turma')
@section('content')
<h1>Nova Turma</h1>
<form method="POST" action="{{ route('turmas.store') }}">
  @csrf
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control"></div>

  <div class="mb-3"><label>Curso</label>
    <select name="curso_id" class="form-control" required>
      @foreach(\App\Models\Curso::all() as $c)<option value="{{ $c->id }}">{{ $c->nome }}</option>@endforeach
    </select>
  </div>

  <div class="mb-3"><label>Ciclo</label>
    <select name="ciclo_id" class="form-control" required>
      @foreach(\App\Models\Ciclo::all() as $c)<option value="{{ $c->id }}">{{ $c->numero }} - {{ $c->ano }}</option>@endforeach
    </select>
  </div>

  <div class="mb-3"><label>Localidade</label>
    <select name="localidade_id" class="form-control" required>
      @foreach(\App\Models\Localidade::all() as $l)<option value="{{ $l->id }}">{{ $l->nome }}</option>@endforeach
    </select>
  </div>

  <div class="mb-3"><label>Professor (opcional)</label>
    <select name="professor_id" class="form-control">
      <option value="">—</option>
      @foreach(\App\Models\Professor::all() as $p)<option value="{{ $p->id }}">{{ $p->nome }}</option>@endforeach
    </select>
  </div>

  <button class="btn btn-success">Salvar</button>
</form>
@endsection

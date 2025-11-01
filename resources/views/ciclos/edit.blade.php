@extends('layouts.app')
@section('title','Editar Ciclo')
@section('content')
<h1>Editar Ciclo</h1>
<form method="POST" action="{{ route('ciclos.update', $ciclo->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Número</label><input name="numero" type="number" class="form-control" value="{{ $ciclo->numero }}" required></div>
  <div class="mb-3"><label>Ano</label><input name="ano" type="number" class="form-control" value="{{ $ciclo->ano }}" required></div>
  <div class="mb-3"><label>Data Início</label><input name="data_inicio" type="date" class="form-control" value="{{ $ciclo->data_inicio }}"></div>
  <div class="mb-3"><label>Data Fim</label><input name="data_fim" type="date" class="form-control" value="{{ $ciclo->data_fim }}"></div>
  <button class="btn btn-primary">Atualizar</button>
</form>
@endsection

@extends('layouts.app')
@section('title','Novo Ciclo')
@section('content')
<h1>Novo Ciclo</h1>
<form method="POST" action="{{ route('ciclos.store') }}">
  @csrf
  <div class="mb-3"><label>Número</label><input name="numero" type="number" class="form-control" required></div>
  <div class="mb-3"><label>Ano</label><input name="ano" type="number" class="form-control" required></div>
  <div class="mb-3"><label>Data Início</label><input name="data_inicio" type="date" class="form-control"></div>
  <div class="mb-3"><label>Data Fim</label><input name="data_fim" type="date" class="form-control"></div>
  <button class="btn btn-success">Salvar</button>
</form>
@endsection

@extends('layouts.app')
@section('title','Painel CLIC')

@section('content')
<h1 class="mb-4">Painel CLIC</h1>
<div class="row g-2">
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('ciclos.index') }}">Ciclos</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('localidades.index') }}">Localidades</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('turmas.index') }}">Turmas</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('professores.index') }}">Professores</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('aulas.index') }}">Aulas</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('encontros.index') }}">Encontros</a></div>
  <div class="col-md-3"><a class="btn btn-primary w-100" href="{{ route('chamadas.index') }}">Chamadas</a></div>
</div>
@endsection

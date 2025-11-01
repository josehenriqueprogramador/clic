@extends('layouts.app')
@section('title','Novo Professor')
@section('content')
<h1>Novo Professor</h1>
<form method="POST" action="{{ route('professores.store') }}">
  @csrf
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
  <button class="btn btn-success">Salvar</button>
</form>
@endsection

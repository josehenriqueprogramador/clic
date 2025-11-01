@extends('layouts.app')
@section('title','Nova Localidade')
@section('content')
<h1>Nova Localidade</h1>
<form method="POST" action="{{ route('localidades.store') }}">
  @csrf
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
  <button class="btn btn-success">Salvar</button>
</form>
@endsection

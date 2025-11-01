@extends('layouts.app')
@section('title','Editar Localidade')
@section('content')
<h1>Editar Localidade</h1>
<form method="POST" action="{{ route('localidades.update', \$localidade->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="{{ \$localidade->nome }}" required></div>
  <button class="btn btn-primary">Atualizar</button>
</form>
@endsection

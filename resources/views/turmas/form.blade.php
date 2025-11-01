@extends('layouts.app')
@section('title', isset($turma) ? 'Editar Turma' : 'Nova Turma')
@section('content')
<div class="container mt-4">
    <h1>{{ isset($turma) ? 'Editar' : 'Nova' }} Turma</h1>
    <form method="POST" action="{{ isset($turma) ? route('turmas.update', $turma->id) : route('turmas.store') }}">
        @csrf @if(isset($turma)) @method('PUT') @endif
        <div class="mb-3"><label>Nome</label><input type="text" name="nome" value="{{ old('nome', $turma->nome ?? '') }}" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

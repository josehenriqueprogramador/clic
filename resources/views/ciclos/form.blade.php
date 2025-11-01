@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($ciclo) ? 'Editar Ciclo' : 'Novo Ciclo' }}</h2>
    <form method="POST" action="{{ isset($ciclo) ? route('ciclos.update', $ciclo->id) : route('ciclos.store') }}">
        @csrf
        @if(isset($ciclo))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Nome do Ciclo</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $ciclo->nome ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ano</label>
            <input type="number" name="ano" class="form-control" value="{{ old('ano', $ciclo->ano ?? date('Y')) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" class="form-control" value="{{ old('data_inicio', $ciclo->data_inicio ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Data de Término</label>
            <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim', $ciclo->data_fim ?? '') }}">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('ciclos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

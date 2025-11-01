@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($professor) ? 'Editar Professor' : 'Novo Professor' }}</h2>
    <form method="POST" action="{{ isset($professor) ? route('professores.update', $professor->id) : route('professores.store') }}">
        @csrf
        @if(isset($professor))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $professor->nome ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $professor->email ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $professor->telefone ?? '') }}">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('professores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

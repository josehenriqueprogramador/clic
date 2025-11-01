@extends('layouts.app')
@section('title','Editar Professor')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Professor</h1>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('professores.update', $professor->id) }}">
        @csrf
        @method('PUT')

        <!-- Campo Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" 
                   id="nome" 
                   name="nome" 
                   class="form-control @error('nome') is-invalid @enderror" 
                   value="{{ old('nome', $professor->nome) }}" 
                   required>

            <!-- Exibe erro de validação -->
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('professores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection


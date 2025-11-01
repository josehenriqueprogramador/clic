@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    <form method="POST" action="{{ route('cursos.update', $curso) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" value="{{ $curso->nome }}" class="form-control" required>
        </div>
        <button class="btn btn-success">Atualizar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Curso</h1>
    <form method="POST" action="{{ route('cursos.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@extends('layouts.app')
@section('title','Novo Aluno')
@section('content')
<div class="container mt-4">
    <h1>Novo Aluno</h1>
    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>
        <div class="mb-3">
            <label>Presenças</label>
            <input type="number" name="presencas" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Faltas</label>
            <input type="number" name="faltas" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label>Turma</label>
            <select name="turma_id" class="form-control">
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

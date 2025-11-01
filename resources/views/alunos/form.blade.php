@extends('layouts.app')
@section('title', isset($aluno) ? 'Editar Aluno' : 'Novo Aluno')
@section('content')
<div class="container mt-4">
    <h1>{{ isset($aluno) ? 'Editar' : 'Novo' }} Aluno</h1>
    <form method="POST" action="{{ isset($aluno) ? route('alunos.update', $aluno->id) : route('alunos.store') }}">
        @csrf
        @if(isset($aluno)) @method('PUT') @endif
        <div class="mb-3"><label>Nome</label><input type="text" name="nome" value="{{ old('nome', $aluno->nome ?? '') }}" class="form-control" required></div>
        <div class="mb-3"><label>Telefone</label><input type="text" name="telefone" value="{{ old('telefone', $aluno->telefone ?? '') }}" class="form-control"></div>
        <div class="mb-3"><label>Turma</label>
            <select name="turma_id" class="form-control">
                <option value="">Selecione</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ (old('turma_id', $aluno->turma_id ?? '') == $turma->id) ? 'selected' : '' }}>{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

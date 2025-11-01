@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($aula) ? 'Editar Encontro' : 'Novo Encontro' }}</h2>
    <form method="POST" action="{{ isset($aula) ? route('encontros.update', $aula->id) : route('encontros.store') }}">
        @csrf
        @if(isset($aula))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label class="form-label">Professor</label>
            <select name="professor_id" class="form-control" required>
                @foreach($professores as $prof)
                    <option value="{{ $prof->id }}" {{ isset($aula) && $aula->professor_id == $prof->id ? 'selected' : '' }}>
                        {{ $prof->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Turma</label>
            <select name="turma_id" class="form-control" required>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ isset($aula) && $aula->turma_id == $turma->id ? 'selected' : '' }}>
                        {{ $turma->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" value="{{ old('data', $aula->data ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tema</label>
            <input type="text" name="tema" class="form-control" value="{{ old('tema', $aula->tema ?? '') }}">
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('encontros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

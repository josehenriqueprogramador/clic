@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🆕 Novo Encontro</h2>

    <form action="{{ route('encontros.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Turma</label>
            <select name="turma_id" class="form-select" required>
                <option value="">Selecione</option>
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>

        <hr>
        <h5>📘 Aulas do Encontro (2 obrigatórias)</h5>

        @for ($i = 0; $i < 2; $i++)
            <div class="card mb-3">
                <div class="card-body">
                    <h6>Aula {{ $i + 1 }}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Aula</label>
                            <select name="aulas[{{ $i }}][id]" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach ($aulas as $aula)
                                    <option value="{{ $aula->id }}">{{ $aula->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Professor</label>
                            <select name="aulas[{{ $i }}][professor_id]" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach ($professores as $professor)
                                    <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endfor

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Salvar Encontro</button>
            <a href="{{ route('encontros.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

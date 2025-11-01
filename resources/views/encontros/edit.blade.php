@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Editar Encontro</h2>

    <form action="{{ route('encontros.update', $encontro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" value="{{ $encontro->data }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Turma</label>
            <select name="turma_id" class="form-select" required>
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}" {{ $encontro->turma_id == $turma->id ? 'selected' : '' }}>
                        {{ $turma->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <hr>
        <h5>📘 Aulas do Encontro</h5>

        @foreach ($encontro->aulas as $i => $aula)
            <div class="card mb-3">
                <div class="card-body">
                    <h6>Aula {{ $i + 1 }}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Aula</label>
                            <select name="aulas[{{ $i }}][id]" class="form-select" required>
                                @foreach ($aulas as $a)
                                    <option value="{{ $a->id }}" {{ $aula->id == $a->id ? 'selected' : '' }}>
                                        {{ $a->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Professor</label>
                            <select name="aulas[{{ $i }}][professor_id]" class="form-select" required>
                                @foreach ($professores as $professor)
                                    <option value="{{ $professor->id }}" {{ $aula->pivot->professor_id == $professor->id ? 'selected' : '' }}>
                                        {{ $professor->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('encontros.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

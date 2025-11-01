@extends('layouts.app')
@section('title','Nova Chamada')
@section('content')
<h1>Nova Chamada</h1>
<form method="POST" action="{{ route('chamadas.store') }}">
  @csrf
  <div class="mb-3"><label>Aula</label>
    <select name="aula_id" class="form-control" required>
      @foreach(\App\Models\Aula::all() as $a)<option value="{{ $a->id }}">{{ $a->titulo }}</option>@endforeach
    </select>
  </div>
  <div class="mb-3"><label>ID do Aluno (use id existente se tiver)</label><input name="aluno_id" class="form-control" type="number"></div>
  <div class="mb-3"><label>Presente</label>
    <select name="presente" class="form-control" required>
      <option value="1">Sim</option>
      <option value="0">Não</option>
    </select>
  </div>
  <button class="btn btn-success">Salvar</button>
</form>
@endsection

@extends('layouts.app')
@section('title','Editar Chamada')
@section('content')
<h1>Editar Chamada</h1>
<form method="POST" action="{{ route('chamadas.update', \$chamada->id) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Aula</label>
    <select name="aula_id" class="form-control" required>
      @foreach(\App\Models\Aula::all() as \$a)
        <option value="{{ \$a->id }}" @if(\$chamada->aula_id==\$a->id) selected @endif>{{ \$a->titulo }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3"><label>ID do Aluno</label><input name="aluno_id" class="form-control" type="number" value="{{ \$chamada->aluno_id }}"></div>
  <div class="mb-3"><label>Presente</label>
    <select name="presente" class="form-control" required>
      <option value="1" @if(\$chamada->presente) selected @endif>Sim</option>
      <option value="0" @if(!\$chamada->presente) selected @endif>Nao</option>
    </select>
  </div>
  <button class="btn btn-primary">Atualizar</button>
</form>
@endsection

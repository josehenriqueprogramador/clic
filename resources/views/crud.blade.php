@extends('layouts.app')
@section('content')
<h1>CRUD Completo CLIC</h1>

<!-- Cursos -->
<h2>Cursos</h2>
<a href="{{ route('cursos.create') }}" class="btn btn-success mb-2">Novo Curso</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Curso::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('cursos.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('cursos.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Ciclos -->
<h2>Ciclos</h2>
<a href="{{ route('ciclos.create') }}" class="btn btn-success mb-2">Novo Ciclo</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Número</th><th>Ano</th><th>Data Início</th><th>Data Fim</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Ciclo::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->numero }}</td>
            <td>{{ $item->ano }}</td>
            <td>{{ $item->data_inicio }}</td>
            <td>{{ $item->data_fim }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('ciclos.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('ciclos.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Localidades -->
<h2>Localidades</h2>
<a href="{{ route('localidades.create') }}" class="btn btn-success mb-2">Nova Localidade</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Localidade::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('localidades.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('localidades.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Turmas -->
<h2>Turmas</h2>
<a href="{{ route('turmas.create') }}" class="btn btn-success mb-2">Nova Turma</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Curso ID</th><th>Ciclo ID</th><th>Localidade ID</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Turma::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->curso_id }}</td>
            <td>{{ $item->ciclo_id }}</td>
            <td>{{ $item->localidade_id }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('turmas.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('turmas.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Professores -->
<h2>Professores</h2>
<a href="{{ route('professores.create') }}" class="btn btn-success mb-2">Novo Professor</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Professor::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('professores.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('professores.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Encontros -->
<h2>Encontros</h2>
<a href="{{ route('encontros.create') }}" class="btn btn-success mb-2">Novo Encontro</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Data</th><th>Tema ID</th><th>Professor ID</th><th>Turma ID</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Encontro::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->data }}</td>
            <td>{{ $item->tema_id }}</td>
            <td>{{ $item->professor_id }}</td>
            <td>{{ $item->turma_id }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('encontros.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('encontros.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Alunos -->
<h2>Alunos</h2>
<a href="{{ route('alunos.create') }}" class="btn btn-success mb-2">Novo Aluno</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Telefone</th><th>Presenças</th><th>Faltas</th><th>Turma ID</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Aluno::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nome }}</td>
            <td>{{ $item->telefone }}</td>
            <td>{{ $item->presencas }}</td>
            <td>{{ $item->faltas }}</td>
            <td>{{ $item->turma_id }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('alunos.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('alunos.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Chamadas -->
<h2>Chamadas</h2>
<a href="{{ route('chamadas.create') }}" class="btn btn-success mb-2">Nova Chamada</a>
<table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Aula ID</th><th>Aluno ID</th><th>Presente</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\Chamada::all() as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->aula_id }}</td>
            <td>{{ $item->aluno_id }}</td>
            <td>{{ $item->presente ? 'Sim' : 'Não' }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('chamadas.edit', $item->id) }}">Editar</a>
                <form method="POST" action="{{ route('chamadas.destroy', $item->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Editar Jogador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Verifique os campos abaixo.<br><br>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jogadores.update', $jogador->id) }}" method="POST" class="border p-4 rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $jogador->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Data de Nascimento</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $jogador->date_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="function" class="form-label">Função</label>
            <input type="text" name="function" class="form-control" value="{{ old('function', $jogador->function) }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Posição (opcional)</label>
            <input type="text" name="position" class="form-control" value="{{ old('position', $jogador->position) }}">
        </div>

        <div class="mb-3">
            <label for="number" class="form-label">Número (opcional)</label>
            <input type="number" name="number" class="form-control" value="{{ old('number', $jogador->number) }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('jogadores.list', $jogador->team_id) }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>
@endsection

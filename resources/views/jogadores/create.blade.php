@extends('layouts.main_layout')

@section('title', 'Cadastrar Jogador')

@section('content')
@include('partials.topbar')
@include('partials.navbar')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Cadastrar Jogador - {{ $time->team_name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('jogadores.store', $time->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Data de Nascimento</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="function" class="form-label">Função</label>
                    <input type="text" name="function" id="function" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Posição</label>
                    <input type="text" name="position" id="position" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Número</label>
                    <input type="number" name="number" id="number" class="form-control">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('jogadores.list', $time->id) }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

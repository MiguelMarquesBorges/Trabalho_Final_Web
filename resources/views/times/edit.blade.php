@extends('layouts.layout_main')

@section('title', 'Editar Time - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Time</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('times.update', $time->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nome -->
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Time</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{ $time->nome }}" required>
                    </div>

                    <!-- Sigla -->
                    <div class="mb-3">
                        <label for="sigla" class="form-label">Sigla</label>
                        <input type="text" name="sigla" id="sigla" class="form-control" maxlength="5" value="{{ $time->sigla }}" required>
                    </div>

                    <!-- ID do ADM -->
                    <div class="mb-3">
                        <label for="adm_id" class="form-label">ID do ADM</label>
                        <input type="number" name="adm_id" id="adm_id" class="form-control" value="{{ $time->adm_id }}" required>
                    </div>

                    <!-- Logo atual -->
                    <div class="mb-3">
                        <label class="form-label">Logo Atual:</label><br>
                        <img src="{{ asset('storage/' . $time->logo_path) }}" alt="Logo Atual" class="rounded mb-2" style="width: 80px; height: 80px;">
                    </div>

                    <!-- Nova Logo -->
                    <div class="mb-3">
                        <label for="logo" class="form-label">Nova Logo (opcional, PNG)</label>
                        <input type="file" name="logo" id="logo" accept="image/png" class="form-control">
                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('times.list') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

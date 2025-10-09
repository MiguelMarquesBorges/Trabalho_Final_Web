@extends('layouts.main_layout')

@section('title', 'Cadastrar Time - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Cadastrar Time</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('times.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="id" class="form-label">ID do Time</label>
                        <input type="number" name="id" id="id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Time</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="sigla" class="form-label">Sigla</label>
                        <input type="text" name="sigla" id="sigla" maxlength="5" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="adm_id" class="form-label">ID do ADM</label>
                        <input type="number" name="adm_id" id="adm_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo do Time (PNG)</label>
                        <input type="file" name="logo" id="logo" accept="image/png" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
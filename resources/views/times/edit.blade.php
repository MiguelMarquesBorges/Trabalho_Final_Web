@extends('layouts.main_layout')

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

                    <div class="mb-3">
                        <label for="team_name" class="form-label">Nome do Time</label>
                        <input type="text" name="team_name" id="team_name" class="form-control" value="{{ old('team_name', $time->team_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="team_sigle" class="form-label">Sigla</label>
                        <input type="text" name="team_sigle" id="team_sigle" class="form-control" maxlength="5" value="{{ old('team_sigle', $time->team_sigle) }}" required>
                    </div>
                    @if($time->team_symbol)
                        <div class="mb-3">
                            <label class="form-label">Logo Atual:</label><br>
                            <img src="data:image/png;base64,{{ $time->team_symbol }}" alt="Logo" width="100">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="team_logo" class="form-label">Nova Logo (opcional, PNG)</label>
                        <input type="file" name="team_logo" id="team_logo" accept="image/png" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('times.list') }}" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

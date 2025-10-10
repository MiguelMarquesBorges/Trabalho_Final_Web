@extends('layouts.main_layout')

@section('title', 'Listar Times - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Times Cadastrados</h4>
                <a href="{{ route('times.create') }}" class="btn btn-light btn-sm">+ Cadastrar Novo Time</a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($times->isEmpty())
                    <p class="text-muted text-center">Nenhum time cadastrado.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Nome</th>
                                    <th>Sigla</th>
                                    <th>ID ADM</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($times as $time)
                                    <tr>
                                        <td>{{ $time->id }}</td>
                                        <td>
                                            <img src="data:image/png;base64,{{ base64_encode($team->team_symbol) }}" alt="Logo do Time">
                                        </td>
                                        <td>{{ $time->nome }}</td>
                                        <td>{{ $time->sigla }}</td>
                                        <td>{{ $time->adm_id }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('times.edit', $time->id) }}" class="btn btn-sm btn-warning">
                                                    Editar
                                                </a>
                                                <form action="{{ route('times.destroy', $time->id) }}" method="POST"
                                                      onsubmit="return confirm('Tem certeza que deseja remover este time?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Remover
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

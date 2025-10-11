@extends('layouts.main_layout')

@section('title', 'Listar Times - Copa do Rio Doce')

@section('content')
    @include('partials.topbar')
    @include('partials.navbar')

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-secondary me-2">Voltar</a>
                <span class="h5 mb-0">Times Cadastrados</span>
                <a href="{{ route('times.create') }}" class="btn btn-secondary me-2">Cadastrar Novo Time</a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($times->isEmpty())
                    <p class="text-muted text-center">Nenhum time cadastrado.</p>
                @else
                    <div class="table-responsive">
                        <table class="table align-middle text-center shadow-sm rounded-4 overflow-hidden">
                            <thead class="table-dark text-white">
                                <tr>
                                    <th scope="col" class="py-3">ID</th>
                                    <th scope="col" class="py-3">Logo</th>
                                    <th scope="col" class="py-3">Nome</th>
                                    <th scope="col" class="py-3">Sigla</th>
                                    <th scope="col" class="py-3">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($times as $time)
                                    <tr class="align-middle table-light">
                                        <td class="border-end">{{ $time->id }}</td>
                                        <td class="border-end">
                                            <img src="data:image/png;base64,{{ $time->team_symbol }}" alt="Logo"
                                                class="img-thumbnail rounded-4" width="100">
                                        </td>
                                        <td class="border-end">{{ $time->team_name }}</td>
                                        <td class="border-end">{{ $time->team_sigle }}</td>
                                        <td class="border-end">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('times.edit', $time->id) }}"
                                                    class="btn btn-warning btn-sm rounded-pill shadow-sm">
                                                    Editar
                                                </a>
                                                <form action="{{ route('times.destroy', $time->id) }}" method="POST"
                                                    onsubmit="return confirm('Tem certeza que deseja remover este time?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm rounded-pill shadow-sm">
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

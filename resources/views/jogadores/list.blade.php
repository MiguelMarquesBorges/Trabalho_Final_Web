@extends('layouts.main_layout')

@section('title', 'Jogadores - ' . $time->team_name)

@section('content')
@include('partials.topbar')
@include('partials.navbar')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Jogadores de {{ $time->team_name }}</h4>

            @if (!session('user')['is_guest'] ?? false)
                <a href="{{ route('jogadores.create', $time->id) }}" class="btn btn-light btn-sm">+ Novo Jogador</a>
            @endif
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($jogadores->isEmpty())
                <p class="text-muted text-center">Nenhum jogador cadastrado.</p>
            @else
                <div class="table-responsive">
                    <table class="table align-middle text-center shadow-sm rounded-4 overflow-hidden">
                        <thead class="table-dark text-white">
                            <tr>
                                <th scope="col" class="py-3">ID</th>
                                <th scope="col" class="py-3">Nome</th>
                                <th scope="col" class="py-3">Data de Nascimento</th>
                                <th scope="col" class="py-3">Função</th>
                                <th scope="col" class="py-3">Posição</th>
                                <th scope="col" class="py-3">Número</th>
                                @if (!session('user')['is_guest'] ?? false)
                                <th scope="col" class="py-3">Ações</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jogadores as $jogador)
                                <tr class="table-light">
                                    <td>{{ $jogador->id }}</td>
                                    <td>{{ $jogador->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jogador->date_of_birth)->format('d/m/Y') }}</td>
                                    <td>{{ $jogador->function }}</td>
                                    <td>{{ $jogador->position ?? '-' }}</td>
                                    <td>{{ $jogador->number ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2 flex-wrap">

                                            @if (!session('user')['is_guest'] ?? false)
                                                <a href="{{ route('jogadores.edit', $jogador->id) }}"
                                                   class="btn btn-warning btn-sm rounded-pill shadow-sm">Editar</a>

                                                <form action="{{ route('jogadores.destroy', $jogador->id) }}" method="POST"
                                                      onsubmit="return confirm('Deseja realmente excluir este jogador?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm rounded-pill shadow-sm">Excluir</button>
                                                </form>
                                            @endif
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

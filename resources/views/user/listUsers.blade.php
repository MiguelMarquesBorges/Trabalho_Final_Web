@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Lista de Administradores</h4>
            <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card-body bg-light">
            @forelse($users as $user)
                <div class="p-3 mb-3 bg-white rounded-3 shadow-sm border">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <p class="mb-1"><strong>ID:</strong> {{ $user->id }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $user->username }}</p>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('findAdmin', ['user' => $user->id]) }}" class="btn btn-sm btn-light">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                            <a href="{{ route('updateAdmin', ['user' => $user->id]) }}" class="btn btn-sm btn-light">
                                <i class="bi bi-pencil-square"></i> Editar
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-4">
                    <i class="bi bi-exclamation-circle"></i> Nenhum administrador encontrado.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

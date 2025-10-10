@extends('layouts.main_layout')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-3 bg-white">
                <div class="text-center p-3 ">
                    <img src="../../assets/images/logo.png" class="img-fluid w-50" alt="Copa Do Rio Doce Logo">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <form action="{{ route('updateUser.submit', ['id' => $user->id]) }}" method="POST" novalidate>
                        @csrf  
                        @method('PUT')
                        <div class="mb-3">
                            <label for="text_username" class="form-label text-dark">Entre com o seu novo e-mail</label>
                            <input class="form-control bg-light text-dark" type="text" name="text_username" value="{{ old('text_username') }}">
                            @error('text_username')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="text_password" class="form-label text-dark">Escolha uma nova senha</label>
                            <input class="form-control bg-light text-dark" type="password" name="text_password" value="{{ old('text_password') }}">
                            @error('text_password')
                                <div class="text-danger">{{ $message }} </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-secondary w-100 text-white" type="submit">Editar</button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="text-center text-secondary">
                    <small>&copy; <?= date('Y') ?> Copa Do Rio Doce</small>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection


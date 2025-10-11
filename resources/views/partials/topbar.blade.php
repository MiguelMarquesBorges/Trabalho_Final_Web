<div class="d-flex justify-content-between align-items-center bg-dark text-white px-4 py-3">
    <div>
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="rounded"
            style="width: 90px; height: 90px;">
    </div>

    <h1 class="m-0 text-center flex-grow-1">Copa Do Rio Doce</h1>

    <div class="d-flex flex-column align-items-end">
        @if (session()->has('user'))
            <span class="badge bg-light text-dark me-2 px-3 py-3">
                Bem vindo {{ session('user')['username'] }} !
            </span>
            <a href="{{ route('listAdmins') }}" class="btn btn-secondary me-2">
                Listar ADMs
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-danger me-2">Sair</button>
            </form>

        @else
            <a href="{{ route('login') }}" class="btn btn-light me-2">
                Login
            </a>

            <a href="{{ route('signin') }}" class="btn btn-light me-2">
                Criar ADM
            </a>
        @endif
    </div>
</div>

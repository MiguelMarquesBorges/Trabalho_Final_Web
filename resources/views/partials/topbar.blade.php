<!-- Topbar -->
    <div class="d-flex justify-content-between align-items-center bg-dark text-white px-4 py-3">
        <!-- Logo -->
        <div>
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="rounded" style="width: 90px; height: 90px;">
        </div>
        <!-- Título -->
        <h1 class="m-0 text-center flex-grow-1">Copa Do Rio Doce</h1>

        <div class="d-flex flex-column">
            @if(session()->has('user'))
                <span class="btn btn-light mb-2 disabled">
                    {{ session('user')['username'] }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>

                <a href="{{ route('listAdmins') }}" class="btn btn-light mb-2">
                    Listar ADMs
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-light mb-2">
                    Login
                </a>

                <a href="{{ route('signin') }}" class="btn btn-light">
                    Criar ADM
                </a>
            @endif
        </div>
    </div>
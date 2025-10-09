<!-- Linha menor abaixo da topbar -->
@if(session()->has('user'))
    <div class="bg-secondary px-4 py-2">
        <div class="d-flex gap-2">
            <a href="{{ route('times.create') }}" class="btn btn-sm btn-light">Cadastrar Time</a>
            <a href="{{ route('times.list') }}" class="btn btn-sm btn-light">Listar Times</a>
            <a href="{{ route('times.remove') }}" class="btn btn-sm btn-light">Remover Times</a>
        </div>
    </div>
@endif
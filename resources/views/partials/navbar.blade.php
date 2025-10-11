@if(session()->has('user'))
    <div class="bg-secondary px-4 py-2">
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('times.create') }}" class="btn btn-secondary">Cadastrar Time</a>
            <a href="{{ route('times.list') }}" class="btn btn-secondary">Listar Times</a>
        </div>
    </div>
@endif

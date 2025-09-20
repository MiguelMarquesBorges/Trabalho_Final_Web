<!-- Linha menor abaixo da topbar -->
    @if(session()->has('user'))
        <div class="bg-secondary px-4 py-2">
            <div class="d-flex gap-2">
                @if(session('user')['role'] === 'adm')
                    <a href="{{ route('times.create') }}" class="btn btn-sm btn-light">Cadastrar Time</a>
                    <a href="{{ route('times.list') }}" class="btn btn-sm btn-light">Listar Times</a>
                    <a href="{{ route('times.remove') }}" class="btn btn-sm btn-light">Remover Times</a>
                    <a href="{{ route('resultados.gerar') }}" class="btn btn-sm btn-light">Gerar Resultados</a>
                @elseif(session('user')['role'] === 'tecnico')
                    <a href="{{ route('jogadores.create') }}" class="btn btn-sm btn-light">Cadastrar Jogadores</a>
                    <a href="{{ route('jogadores.list') }}" class="btn btn-sm btn-light">Listar Jogadores</a>
                    <a href="{{ route('jogadores.remove') }}" class="btn btn-sm btn-light">Remover Jogadores</a>
                @elseif(session('user')['role'] === 'jogador')
                    <a href="{{ route('time.info') }}" class="btn btn-sm btn-light">Informações do Time</a>
                @endif
            </div>
        </div>
    @endif
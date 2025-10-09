<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Usuários</title>
</head>
<body>

    
    @forelse($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user->username }}<br>
        <a href = "{{ route('findAdmin', ['user' => $user->id]) }}">Ver usuário</a><br>
        <a href = "{{ route('updateAdmin', ['user' => $user->id]) }}">Editar usuário</a><br>
        <hr>
    @empty
    @endforelse

    
</body>
</html>
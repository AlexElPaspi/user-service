<!DOCTYPE html>
<html>
<head>
    <title>Asignar Rol</title>
</head>
<body>
    <h1>Asignar Rol</h1>
    <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="role">Rol:</label>
        <select id="role" name="role" required>
            <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
            <option value="bibliotecario" {{ $user->role == 'bibliotecario' ? 'selected' : '' }}>Bibliotecario</option>
        </select>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('users.index') }}">Volver al listado</a>
</body>
</html>

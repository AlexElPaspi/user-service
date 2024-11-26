<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        <label for="password">Contraseña (dejar en blanco para mantener la actual):</label>
        <input type="password" id="password" name="password">
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="{{ route('users.index') }}">Volver al listado</a>
</body>
</html>

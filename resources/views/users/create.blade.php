<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('users.index') }}">Volver al listado</a>
</body>
</html>

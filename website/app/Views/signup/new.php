<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
</head>
<body>
    <h1>Crear cuenta</h1>

    <form action="/signup/create" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
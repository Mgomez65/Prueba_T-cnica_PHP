<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>

    <h2>Formulario de Registro de Usuario</h2>

    <form id="formRegistro" action="../controllers/form.controlles.php" method="POST" enctype="multipart/form-data">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required><br><br>

        <label for="Apellido">Apellido:</label>
        <input type="text" id="Apellido" name="Apellido" required><br><br>

        <label for="Fecha_nacimiento">Fecha de Nacimiento (AAAA/MM/DD):</label>
        <input type="text" id="Fecha_nacimiento" name="Fecha_nacimiento" required><br><br>

        <label for="Dni">DNI:</label>
        <input type="text" id="Dni" name="Dni" required><br><br>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" required><br><br>

        <label for="Celular">Celular:</label>
        <input type="text" id="Celular" name="Celular" required><br><br>

        <label for="Pais">País:</label>
        <input type="text" id="Pais" name="Pais" required><br><br>

        <label for="archivo">Subir CV (PDF o TXT):</label>
        <input type="file" id="archivo" name="archivo" accept=".pdf,.txt" required><br><br>

        <button type="submit">Registrar Usuario</button>
    </form>

    <!-- Aquí aparecerán los mensajes de error o éxito -->
    <div id="mensajeResultado">
        <?php 
            if(isset($_GET['mensaje'])) {
                echo $_GET['mensaje']; 
            }
        ?>
    </div>

</body>
</html>

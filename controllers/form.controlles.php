<?php
include "../utils/validationForm.php";
include "../service/form.service.php";
include "../utils/subirCV.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        'Nombre' => $_POST["Nombre"],
        'Apellido' => $_POST["Apellido"],
        'Fecha_nacimiento' => $_POST["Fecha_nacimiento"],
        'Dni' => $_POST["Dni"],
        'Email' => $_POST["Email"],
        'Celular' => $_POST["Celular"],
        'Pais' => $_POST["Pais"]
    ];
    

// Validación de datos
    $validacion = validatorForm($data);
    if ($validacion['valor'] === 'false') {
        echo "<p style='color:red;'>".$validacion['mensaje']."</p>";  
        return;
    }

    $usuarioEmail = verUsuario("email", $data["Email"]);
    $usuarioDni = verUsuario("dni", $data["Dni"]);


// SI  verificar el dni esta registrado
    if (count($usuarioDni) > 0) {
        echo "<p style='color:red;'>El DNI ya está registrado.</p>";
        return;
    }

// SI  varificar el email esta registrado
    if (count($usuarioEmail) > 0) {
        echo "<p style='color:red;'>El Email ya está registrado.</p>";
        return;
    }

// Subir el archivo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
        $nombre_archivo = subirCV($_FILES['archivo'], $_POST["Dni"]);
    } else {
        echo "<p style='color:red;'>Error al subir el archivo. Código de error: " . $_FILES['archivo']['error']."</p>";
        return;
    }

//Comprubeo si el archivo se subio
    if ($nombre_archivo["valor"] == false) {
        echo "<p style='color:red;'>".$nombre_archivo["mensaje"]."</p>";
        return;
    }

// Crear el usuario y subo Archivo ala BD
    $CreaAsuario = createUsuario($data, $nombre_archivo['mensaje']);
    if ($CreaAsuario === true) {
        echo "<p style='color:green;'>Usuario creado con éxito</p>";  
    } else {
        echo "<p style='color:red;'>Error al crear el usuario: " . $CreaAsuario . "</p>";
    }
}

?>

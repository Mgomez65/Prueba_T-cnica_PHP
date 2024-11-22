<?php 
    include "../config/db.php";

//Funcion para crear usaurio
    function createUsuario($data,$nombreCv){

        global $conexion;
        $consulta_Usuario = "INSERT INTO Usuario (nombre, apellido, fecha_nacimiento, dni, email, celular, pais)
        VALUES ('" . $data['Nombre'] . "', '" . $data['Apellido'] . "', '" . $data['Fecha_nacimiento'] . "', '" . $data['Dni'] . "', '" . $data['Email'] . "', '" . $data['Celular'] . "', '" . $data['Pais'] . "')";
        
//subir Usuario
        if ($conexion->query($consulta_Usuario) === TRUE) {
            $usuario_id = $conexion->insert_id;
           

            $consulta_CV = "INSERT INTO cv_Postulante (id_usuario,nombre_archivo) VALUES ($usuario_id,'$nombreCv')";

//Subir CV            
            if ($conexion ->query($consulta_CV) === TRUE) {
                $usuario_id = $conexion->insert_id;
                
                return true;

            } else {
                echo "Error al crear el usuario: " . $conexion->error;
                return "Error al crear el usuario: " . $conexion->error;
            } 

        } else {
            return "Error al crear el usuario: " . $conexion->error;
        }
    };


//funcion para poder ver al usuario
    function verUsuario($columna,$valor){
        
        global $conexion;

        $consulta = "SELECT * FROM Usuario WHERE $columna = '$valor'";
        $resultado = $conexion->query($consulta);

//serificar Usaurio  
        if($resultado->num_rows >0 ){
            $usuario = $resultado->fetch_assoc();  
            return $usuario;
        }else{
            return $resultado = [];
        }
    }
?>
<?php 
$respuesta = [
    'mensaje' => '',
    'valor' => '',
];
    function subirCV($archivo,$dni){

        global $respuesta;

        $ruta = "../uploads/";
        $nombre = $archivo["name"];
        $extension = pathinfo($nombre, PATHINFO_EXTENSION);
        $nuevoNombre = "CV_".$dni.".".$extension;

        $ubicacion_Actual = $archivo["tmp_name"];
        $destino = $ruta.$nuevoNombre;

 
//se dija si la carpeta existe
        if (file_exists($ruta) == 0 ) {
            @mkdir($ruta);
        }

//se fija que el archivo sea de formato dispobible 
        if ( $extension !== "pdf"  && $extension !== "txt" ){
            $respuesta = [
                'mensaje' => "El Archivo no es de tipo PDF o TXT",
                'valor' => false
            ];
            return $respuesta;
           
        }

// se fija si hay otro archivo con ese nombre 
        if (file_exists($destino)) {
             $respuesta = [
                'mensaje' => "Ya hay un archivo con ese nombre ",
                'valor' => false
            ];
            return $respuesta;
        }


//agretga el archivo ala carpeta
        if (@move_uploaded_file($ubicacion_Actual,$destino)) {

            return [
            'mensaje' => $nuevoNombre,
            'valor' => true
            ];
        }else{
            $respuesta = [
                'mensaje' => "Archivo no subido ",
                'valor' => false
            ];
            return $respuesta;
        }

        
    }
?>

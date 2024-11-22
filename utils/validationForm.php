<?php 
     $respuesta = [
        'mensaje' => '',
        'valor' => '',
    ];
    function validatorForm($data){
        global $respuesta;

        foreach($data as $x => $y){
            if(empty($y) ){
                $respuesta = [
                    'mensaje' => "El campo $x es obligatorio.",
                    'valor' => "false"
                ];
            
                return $respuesta;
            }; 
        };

        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Nombre']) || 
            !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Apellido']) || 
            !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Pais'])) {
                $respuesta = [
                    'mensaje' => "El campo tiene datos que no estan permitidos",
                    'valor' => "false"
                ];
                return $respuesta;
    
        }

        if (!filter_var($data['Email'],FILTER_VALIDATE_EMAIL)) {
            $respuesta = [
                'mensaje' => "Formato invalido del email",
                'valor' => "false"
            ];
            return $respuesta;
        }

        if(!preg_match("/^(\d{3})[\ \-]?\d{7}$/",$data['Celular'])){
            $respuesta = [
                'mensaje' => "El numero es invalido ",
                'valor' => "false"
            ];
            return $respuesta;
        }
        if(!preg_match("/^(\d{8})$/",$data['Dni'])){
            $respuesta = [
                'mensaje' => "El Dni es invalido ",
                'valor' => "false"
            ];
            return $respuesta;
        }

        if(!preg_match( "/^\d{4}\/(0[1-9]|1[0-2])\/([0-2][0-9]|3[01])$/",$data['Fecha_nacimiento'])){
            $respuesta = [
                'mensaje' => "La fecha de Naciomiento es invalida debe ser Año/mes/dia ",
                'valor' => "false"
            ];
            return $respuesta;
        }
        
        return;
    }
?>
<?php 
     $respuesta = [
        'mensaje' => '',
        'valor' => '',
    ];

    function validatorForm($data){
        global $respuesta;

//se fija que no lleguen solo
        foreach($data as $x => $y){
            if(empty($y) ){
                $respuesta = [
                    'mensaje' => "El campo $x es obligatorio.",
                    'valor' => "false"
                ];
            
                return $respuesta;
            }; 
        };

// se fija que el nombre pais y apellido esta es el formato permitido 
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Nombre']) || 
            !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Apellido']) || 
            !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñüÜ ]+$/",$data['Pais'])) {
                $respuesta = [
                    'mensaje' => "El campo tiene datos que no estan permitidos",
                    'valor' => "false"
                ];
                return $respuesta;
    
        }

// se fija que el Email sea un email
        if (!filter_var($data['Email'],FILTER_VALIDATE_EMAIL)) {
            $respuesta = [
                'mensaje' => "Formato invalido del email",
                'valor' => "false"
            ];
            return $respuesta;
        }
// se fija que el celular sea un numero valido 

        if(!preg_match("/^(\d{3})[\ \-]?\d{7}$/",$data['Celular'])){
            $respuesta = [
                'mensaje' => "El numero es invalido ",
                'valor' => "false"
            ];
            return $respuesta;
        }
//se fija que dni sea valido 
        if(!preg_match("/^(\d{8})$/",$data['Dni'])){
            $respuesta = [
                'mensaje' => "El Dni es invalido ",
                'valor' => "false"
            ];
            return $respuesta;
        }
// se fija la fecha de nacimiento 
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
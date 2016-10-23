<?php

 $host= 'localhost';
 $user= 'root';
 $pass= '';
 $db= 'proyecto_web';

 
 $mysqli = new mysqli($host, $user, $pass, $db);

 if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
     }



 $data = json_decode(file_get_contents("php://input"));
 $cedula = mysqli_real_escape_string( $mysqli, $data->cedula);
 $email = mysqli_real_escape_string( $mysqli,$data ->email);
 $nombre = mysqli_real_escape_string( $mysqli, $data->nombre);
 $tipo_usuario = mysqli_real_escape_string( $mysqli, $data->tipo_usuario);





 $query = "INSERT INTO usuario(cedula, nombre, email, tipo_usuario) VALUES ('$cedula ', '$nombre','$email','no se')";
 $resultado= mysqli_query($mysqli, $query);
    if (!$resultado){
        // Código de falla
            $json=array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Creación fallida');

    } else {

        // Código de éxito
            $json=array(
                ESTADO => CODIGO_EXITO,
                MENSAJE => 'Creación exitosa');
    }


	
    header('Content-Type: application/json');
    echo json_encode($json);
    mysqli_close($mysqli);

?>
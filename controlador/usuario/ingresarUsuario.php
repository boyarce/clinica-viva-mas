<?php

if(isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['nombre']) && isset($_POST['perfil'])) {
    
    
    echo ingresarUsuario($_POST['email'],$_POST['clave'], $_POST['nombre'], $_POST['perfil']);
}

function ingresarUsuario($email, $clave, $nombre, $id_perfil) {
    $host = "localhost";
    $user = "user";
    $password = "123";
    $database = "clinica";
    $port = 3306;           

    $query = "INSERT INTO usuario (email,clave, nombre, id_perfil) VALUES(?, ?, ?, ?)";
    
    $db = new mysqli($host, $user, $password, $database, $port);

    if($db->errno) {
        echo '<div class="error">No se pudo conectar a la base de datos: '.$db->error.'</div>';
        exit;
    }       

    $db->set_charset("utf8");
    $stmt = $db->prepare($query);
    $stmt->bind_param("iisi", $email, $clave, $nombre, $id_perfil);

    $resultado = $stmt->execute();
    
    if($resultado != false) {        
        return "El usuario ha sido ingresado exitosamente";
    } else {
        return "No fue posible ingresar el usuario";
    }   
}
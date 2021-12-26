<?php

if(isset($_POST['login-form'])) {
    $usuario = $_POST['email'];
    $password = $_POST['pass'];

    try {
        include_once 'config/db.php';
        $dat = $conn->prepare("SELECT * FROM usuarios WHERE mail = ?;");
        $dat->bind_param('s', $usuario);
        $dat->execute();
        $dat->bind_result ($id_usuarios, $pass, $mail, $Rol_id_rol) ;
        $errno = $dat->errno;
        $error = $dat->error;
        if($dat->affected_rows) {
            $existe = $dat->fetch();
            if($existe) {
                // if(password_verify($password, $pass)) {
                    if ($password == $pass){
                    session_start();
                   
               
                    $_SESSION['email'] = $mail;
                    $_SESSION['role'] = $Rol_id_rol;
                    $respuesta =array(
                        'respuesta' => 'exitoso',
                        'usuario' => $mail
                    );
                } else {
                    $respuesta =array(
                        'respuesta' => 'error_pass'
                    );
                }
            
        } else {
            $respuesta = array(
                'respuesta' => 'error',
                'email' => $usuario
            );
        }
    }

    } catch (Exeption $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));
}
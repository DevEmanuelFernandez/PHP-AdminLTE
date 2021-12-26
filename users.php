<?php

if($_POST['users-form'] == 'add'){
    $pass = $_POST['pass'];
    $mail = $_POST['mail'];
    $rol = $_POST['rol'];
    
    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("INSERT INTO usuarios (pass, mail, rol) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $pass, $mail, $rol);
        $stmt->execute();

        $id_insertado = $stmt->insert_id;
        $errno = $stmt->errno;

        if($stmt->affected_rows && $errno === 0){
            $respuesta = array(
                'respuesta' => 'exitoso',
                'id' => $id_insertado
            );

        } elseif($errno === 1406) {
            $respuesta = array(
                'respuesta' => 'error',
                'errno' => $errno,
                'error' => $stmt->error,
            );
            
        } elseif($errno === 1062) {
            $respuesta = array(
                'respuesta' => 'error',
                'errno' => $errno,
                'error' => $stmt->error,
            );
        }
        $stmt->close();
        $conn->close();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}


// comienzo del edit

if ($_POST['users-form'] == 'edit') {
    $id_usuarios = $_POST['id_usuarios'];
    $pass = $_POST['pass'];
    $mail = $_POST['mail'];
    $rol = $_POST['rol'];

    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("UPDATE usuarios SET pass = ?, mail = ?, rol = ? WHERE id_usuarios = ?");
        $stmt->bind_param('sssi', $pass, $mail, $rol, $id_usuarios);
        $stmt->execute();

        $errno = $stmt->errno;

        if($stmt->affected_rows && $errno === 0){
            $respuesta = array(
                'respuesta' => 'exitoso'
            );
        } elseif($errno === 1406) {
            $respuesta = array(
                'respuesta' => 'error',
                'errno' => $errno,
                'error' => $stmt->error,
            );
        } elseif($errno === 1062) {
            $respuesta = array(
                'respuesta' => 'error',
                'errno' => $errno,
                'error' => $stmt->error,
            );
        }
        $stmt->close();
        $conn->close();



    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    die(json_encode($respuesta));
}


// comienzo del delete

if ($_POST['users-form'] == 'delete') {
    $id_usuarios = $_POST['id'];

    try {
        include_once 'config/db.php';
        $stmt = $conn->prepare('DELETE FROM usuarios WHERE id_usuarios = ? ');
        $stmt->bind_param('i', $id_usuarios);
        $stmt->execute();
        $err = $stmt->errno;
        
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_usuarios
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
<?php

include 'config/sessions.php'; 


if($_POST['teacher-form'] == 'add'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $mail = $_SESSION['email']; //Utilizo el mail del usuario logueado
    $telefono = $_POST['telefono'];
    

    try{
        include_once 'config/db.php';
    
        $stmt = $conn->prepare("INSERT INTO docente (nombre, apellido, dni, mail, telefono) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $nombre, $apellido, $dni, $mail, $telefono);
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

if ($_POST['teacher-form'] == 'edit') {
    $id_docente = $_POST['id_docente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $mail = $_SESSION['email']; //Utilizo el mail del usuario logueado
    $telefono = $_POST['telefono'];


    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("UPDATE docente SET nombre = ?, apellido = ?, dni = ?, mail = ?, telefono = ? WHERE id_docente = ?");
        $stmt->bind_param('sssssi', $nombre, $apellido, $dni, $mail, $telefono, $id_docente);
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

if ($_POST['teacher-form'] == 'delete') {
    $id_docente = $_POST['id'];

    try {
        include_once 'config/db.php';
        $stmt = $conn->prepare('DELETE FROM docente WHERE id_docente = ? ');
        $stmt->bind_param('i', $id_docente);
        $stmt->execute();
        $err = $stmt->errno;
        
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_docente
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
<?php

include 'config/sessions.php'; 


if($_POST['student-form'] == 'add'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $mail = $_SESSION['email']; //Utilizo el mail la session
    $telefono = $_POST['telefono'];
    $carrera = $_POST['carrera'];


    try{
        include 'config/db.php';
    
        $stmt = $conn->prepare("INSERT INTO alumnos (nombre, apellido, dni, mail, telefono, carrera) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $nombre, $apellido, $dni, $mail, $telefono, $carrera);
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


//comienzo del edit

if ($_POST['student-form'] == 'edit') {
    $id_alumnos = $_POST['id_alumnos']; 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $mail = $_SESSION['email']; //Utilizo el mail la session
    $telefono = $_POST['telefono'];
    $carrera = $_POST['carrera'];

    try{
        include 'config/db.php';

        $stmt = $conn->prepare("UPDATE alumnos SET nombre = ?, apellido = ?, dni = ?, mail = ?, telefono = ?, carrera = ? WHERE id_alumnos = ? ");
        $stmt->bind_param('ssssssi', $nombre, $apellido, $dni, $mail, $telefono, $carrera, $id_alumnos);
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


// comienzo del delete

if ($_POST['student-form'] == 'delete') {
    $id_alumnos = $_POST['id'];

    try {
        include_once 'config/db.php';
        $stmt = $conn->prepare('DELETE FROM alumnos WHERE id_alumnos = ? ');
        $stmt->bind_param('i', $id_alumnos);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_alumnos
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
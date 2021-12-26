<?php

if($_POST['matter-form'] == 'add'){
    $materia_nombre = $_POST['materia_nombre'];
    $horas = $_POST['horas'];
    $nota_final = $_POST['nota_final'];
    $docente = $_POST['docente'];
    $carrera = $_POST['carrera'];
    
    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("INSERT INTO materias (materia_nombre, horas, nota_final, docente, carrera) VALUES (?,?,?,?,?)");
        $stmt->bind_param('siiss', $materia_nombre, $horas, $nota_final, $docente, $carrera);
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

if ($_POST['matter-form'] == 'edit') {
    $id_materias = $_POST['id_materias'];
    $materia_nombre = $_POST['materia_nombre'];
    $horas = $_POST['horas'];
    $nota_final = $_POST['nota_final'];
    $docente = $_POST['docente'];
    $carrera = $_POST['carrera'];

    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("UPDATE materias SET materia_nombre = ?, horas = ?, nota_final = ?, docente = ?, carrera = ? WHERE id_materias = ? ");
        $stmt->bind_param('siissi', $materia_nombre, $horas, $nota_final, $docente, $carrera, $id_materias);
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

if ($_POST['matter-form'] == 'delete') {
    $id_materias = $_POST['id'];

    try {
        include_once 'config/db.php';
        $stmt = $conn->prepare('DELETE FROM materias WHERE id_materias = ? ');
        $stmt->bind_param('i', $id_materias);
        $stmt->execute();
        $err = $stmt->errno;
        
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_materias
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
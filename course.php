<?php

if($_POST['course-form'] == 'add'){
    $carrera = $_POST['name'];

    try{
        include_once 'config/db.php';
        $stmt = $conn->prepare("INSERT INTO carreras (carrera) VALUES (?)");
        $stmt->bind_param('s', $carrera);
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

if ($_POST['course-form'] == 'edit') {
    $id_carreras = $_POST['id_carreras'];
    $carrera = $_POST['carrera'];

    try{
            include_once 'config/db.php';
            $stmt = $conn->prepare("UPDATE carreras SET carrera = ? WHERE id_carreras = ?");
            $stmt->bind_param('si', $carrera, $id_carreras);
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

}

// comienzo del deleted

if ($_POST['course-form'] == 'delete') {
    $id_carreras = $_POST['id'];

    try {
        include_once 'config/db.php';
        $stmt = $conn->prepare('DELETE FROM carreras WHERE id_carreras = ?');
        $stmt->bind_param('i', $id_carreras);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_carreras
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
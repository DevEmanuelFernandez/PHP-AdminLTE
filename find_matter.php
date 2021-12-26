<?php
    $id_course = $_POST['id'];
    $id =intval($id_course);
    
    try {
        include_once 'config/db.php';
        $dat = $conn->prepare("SELECT * FROM courses_has_matters INNER JOIN matters ON courses_has_matters.matters_id_matter = matters.id_matters WHERE courses_id_career= ?");
        $dat->bind_param('i', $id);
        $dat->execute();
        $dat->bind_result($course_id_carrer, $matters_id_matter, $matters_id, $matter_name);

        if($dat->affected_rows) {
            $result = $dat->get_result();
            $respuesta = array();
            while ($row = $result->fetch_assoc()) {
                $respuesta[] = $row;
           }
        }    
    } catch (Exeption $e) {
        echo "Error: " . $e->getMessage();
    }
    
    die(json_encode($respuesta));


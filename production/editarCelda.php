<?php 
    include("conexion.php");
    echo '<script>';
    echo 'console.log("Llegué")';
    echo '</script>';
    $input = filter_input_array(INPUT_POST);
    if ($input['action'] == 'edit') {   
        $update_field='';
        if(isset($input['horario'])) {
            $update_field.= "horario='".$input['horario']."'";
        } else if(isset($input['lunes'])) {
            $update_field.= "lunes='".$input['lunes']."'";
        } else if(isset($input['martes'])) {
            $update_field.= "martes='".$input['martes']."'";
        } else if(isset($input['miercoles'])) {
            $update_field.= "miercoles='".$input['miercoles']."'";
        } else if(isset($input['jueves'])) {
            $update_field.= "jueves='".$input['jueves']."'";
        } else if(isset($input['viernes'])) {
            $update_field.= "viernes='".$input['viernes']."'";
        } else if(isset($input['sabado'])) {
            $update_field.= "sabado='".$input['sabado']."'";
        } else if(isset($input['domingo'])) {
            $update_field.= "domingo='".$input['domingo']."'";
        }  
        if($update_field && $input['id']) {
            $sql_query = "UPDATE clases SET $update_field WHERE id_clase='" . $input['id'] . "'";  
            mysqli_query($conexion, $sql_query) or die("database error:". mysqli_error($conn));     
        }
    }
 ?>
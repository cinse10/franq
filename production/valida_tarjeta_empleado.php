<?php
  require("conexion.php");
  if ($_REQUEST['tarjeta_socio']=="") {
    
  }else{
    //valida que exista una petición, consulta la bd con la información 
    //regresa 0 si NO es disponible y un 1 en caso de disponibilidad
    if($_REQUEST) {
        $cedula = $_REQUEST['tarjeta_socio'];
        $sql="Select * from empleados where id_acceso_empleado = '$cedula'";
      if ($result=mysqli_query($conexion,$sql)){
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);
        //printf("Result set has %d rows.\n",$rowcount); mostrar resultado
       if($rowcount > 0)
            // echo '<div id="Error"><span class="label label-danger">NO DISPONIBLE</span></div>';
            echo "0";
          else
            // echo '<div id="Success"><span class="label label-success">DISPONIBLE</span></div>';
            echo "1";
      }
    }
  }
?>
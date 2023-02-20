<?php
  require("conexion.php");
  if ($_REQUEST['tarjeta_socio']=="") {
    
  }else{
    if($_REQUEST) {
        $cedula = $_REQUEST['tarjeta_socio'];
        $sql="Select * from socios where id_acceso = '$cedula'";
      if ($result=mysqli_query($conexion,$sql)){
        $rowcount=mysqli_num_rows($result);
       if($rowcount > 0)
            echo 0;
          else{
             $sql2="Select * from empleados where id_acceso_empleado = '$cedula'";
            if ($result2=mysqli_query($conexion,$sql2)){
              $rowcount2=mysqli_num_rows($result2);
             if($rowcount2 > 0)
                echo 0;
                else
                echo 1;
            }
          }
           
      }
    }
  }
?>
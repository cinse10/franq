<?php 
	include("conexion.php");
	$pw = $_POST['pw'];

	$kuerin = "Select * from `empleados` where id_acceso_empleado='".$pw."' AND (id_empleado = 1 OR id_empleado = 5)";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
		$rengloncito = mysqli_num_rows($res);
		if ($rengloncito==1) {
			echo 1;
		}else{
			echo 0;
		}

	}	


?>
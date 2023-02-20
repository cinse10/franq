<?php 
	include("conexion.php");
	$id_plan = $_POST['id_plan'];
	$nombre_plan = $_POST['nombre_plan'];
	$precio_plan = $_POST['precio_plan'];	
	$descripcion_plan = $_POST['descripcion_plan'];	
	$id_empleado = $_POST['id_empleado'];	
	$duracion_plan = $_POST['duracion_plan'];	
	$otra_duracion = $_POST['otra_duracion'];
	$vigencia_plan = $_POST['vigencia_plan'];

	$duracion;
	$date = date_create($vigencia_plan);
	$fecha_vigencia_plan = date_format($date, 'Y-m-d');
	if ($otra_duracion=="") {
		$duracion=$duracion_plan;
	}else{
		$duracion=$otra_duracion;
	}

	$kuerito = "UPDATE `planes` SET `nombre_plan`='".$nombre_plan."',`costo_plan`=".$precio_plan.",`descripcion_plan`='".$descripcion_plan."',`vigencia_plan`='".$fecha_vigencia_plan."',`duracion_plan`=".$duracion." WHERE id_plan=".$id_plan;
	if(mysqli_query($conexion,$kuerito)){
		echo ' <script type="text/javascript">
			 	alert("Plan actualizado con éxito.");
			 	location.href="consulta_planes.php";
			 </script>';
	}else{
		echo ' <script type="text/javascript">
			 	alert("Algo falló.");
			 	window.history.back(-1);
			 </script>';
	}
 ?>
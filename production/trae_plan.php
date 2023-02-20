<?php 
	include("conexion.php");
	if(isset($_POST['id_plan'])){
		$id_plan = $_POST['id_plan'];
		$query = "select * from planes where id_plan=".$id_plan;
		$respuesta = mysqli_query($conexion,$query)		;
		while($plan = mysqli_fetch_array($respuesta)){
			echo $plan['duracion_plan'];
		}
	}



 ?>
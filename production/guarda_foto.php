<?php 

	$id_socio = $_POST['id_socio'];
	$nombre = $_POST['nombre_socio'];
	$imagen_socio = $_POST['imagen_socio'];
	if ($imagen_socio=="") {
		echo '<script language="javascript">';
			$mensaje = "No haz asignado una imagen";
			echo 'alert("'.$mensaje.'");';
			echo 'window.history.back();';
		echo '</script>';
	}else{
		$sql = "update socios set imagen_socio='".$imagen_socio."' WHERE id_socio=".$id_socio;
		include("conexion.php");

		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				$mensaje = "La imagen ha sido asignada correctamente a: ".$nombre;
				echo 'alert("'.$mensaje.'");';
				//echo 'window.history.back();';
				echo 'window.location="index.php";';
			echo '</script>';
		}
	}
	

?>
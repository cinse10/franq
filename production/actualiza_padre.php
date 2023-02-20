<?php 
	include("conexion.php");
	$id_socio 		= $_POST['id_socio'];
	$dist_padre 		= $_POST['nuevo_pa'];	

	$hoy = date("Y-m-d");	

	$sql1 ="INSERT INTO `herencia_hijos`(`id_dist_hijo`, `id_dist_padre`, `fecha_herencia`) VALUES(".$id_socio.", ".$dist_padre.", '".$hoy."')";
	if(mysqli_query($conexion,$sql1)){
		$sql = "UPDATE `dist_hijo` SET `dist_padre`= ".$dist_padre." where id_dist_hijo =".$id_socio;
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'alert("Distribuidor Actualizado con éxito");';
				echo 'window.location="ver_padre.php?id_socio='.$id_socio.'";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.history.back();';
			echo '</script>';
		}
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar guardar los datos.");';
			echo 'window.history.back();';
		echo '</script>';
	}
 ?>
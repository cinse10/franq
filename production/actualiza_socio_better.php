<?php 
	include("conexion.php");
	$id_socio = $_POST['id_socio'];
	$nombre_socio 		= $_POST['nombre_socio'];	
	$ap_pat_socio 		= $_POST['ap_pat_socio'];	
	$ap_mat_socio		= $_POST['ap_mat_socio'];	
	$whats_socio  		= $_POST['whats_socio'];	
	$nacimiento_socio 	= $_POST['nacimiento_socio'];
	$calle_socio 		= $_POST['calle_socio'];
	$colonia_socio 		= $_POST['colonia_socio'];
	$municipio_socio 	= $_POST['municipio_socio'];
	$cp_socio 			= $_POST['cp_socio'];
	$email_socio 		= $_POST['email_socio'];			
	$notas_socio 		= $_POST['notas_socio'];
	
	
	$SQL = "UPDATE socios_better SET nombre_socio='".$nombre_socio."', ap_pat_socio='".$ap_pat_socio."', ap_mat_socio='".$ap_mat_socio."', tel_socio='".$whats_socio."', whats_socio='".$whats_socio."', nacimiento_socio='".$nacimiento_socio."', calle_socio='".$calle_socio."', colonia_socio='".$colonia_socio."', municipio_socio='".$municipio_socio."', cp_socio='".$cp_socio."', email_socio='".$email_socio."', notas_socio='".$notas_socio."' WHERE id_socio=".$id_socio;
	if(mysqli_query($conexion,$SQL)){
		echo '<script language="javascript">';
			echo 'alert("Socio actualizado con éxito.");';
			echo "window.location='consulta_socios_better.php';";
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar guardar los datos.");';
			echo 'window.history.back();';
		echo '</script>';
	}
 ?>
<?php 

	include("conexion.php");
	$nombre_socio 		= $_POST['nombre_socio'];
	$whats_socio  		= $_POST['whats_socio'];	
	$cod_distribuidor 	= $_POST['cod_distribuidor'];
	$calle_socio 		= $_POST['calle_socio'];
	$email_socio 		= $_POST['email_socio'];	
	$id_socio 		    = $_POST['id_socio'];
		
	$hoy = date("Y-m-d");

	if ($_POST['bandera'] == 1) {
		$sql ="UPDATE `dist_padre` SET `nombre_dist_padre` = '".$nombre_socio."', `cod_dist_padre` = '".$cod_distribuidor."', `tel_dist_padre` = '".$whats_socio."', `domicilio_dist_padre` = '".$calle_socio."', `email_dist_padre` = '".$email_socio."' WHERE id_dist_padre =".$id_socio;
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'alert("Distribuidor Actualizado con éxito");';
				echo 'window.location="edita_distribuidor.php?action=edita&id_socio='.$id_socio.'";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.history.back();';
			echo '</script>';
		}
		
	
	}elseif ($_POST['bandera'] == 2) {
		$tipo_asociado = $_POST['tip_usuario'];
		$sql ="UPDATE `dist_hijo` SET `nombre_dist_hijo` = '".$nombre_socio."', `num_asociado` = '".$cod_distribuidor."', `tel_dist_hijo` = '".$whats_socio."' , `domicilio_dist_hijo` = '".$calle_socio."', `email_dist_hijo` = '".$email_socio."', `tipo_asociado` = '".$tipo_asociado."' WHERE id_dist_hijo =".$id_socio;
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'alert("Asociado Actualizado con éxito");';
				echo 'window.location="edita_asociado.php?action=edita&id_socio='.$id_socio.'";';
			echo '</script>';
			
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.location="edita_asociado.php?action=edita&id_socio='.$id_socio.'";';
			echo '</script>';
		}
				
	}
	


 ?>
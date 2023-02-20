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
	$ventas 		    = $_POST['ventas'];
	
	
	$SQL = "UPDATE socios_chiqui SET nombre_socio='".$nombre_socio."', ap_pat_socio='".$ap_pat_socio."', ap_mat_socio='".$ap_mat_socio."', tel_socio='".$whats_socio."', whats_socio='".$whats_socio."', nacimiento_socio='".$nacimiento_socio."', calle_socio='".$calle_socio."', colonia_socio='".$colonia_socio."', municipio_socio='".$municipio_socio."', cp_socio='".$cp_socio."', email_socio='".$email_socio."', notas_socio='".$notas_socio."' WHERE id_socio=".$id_socio;
	if(mysqli_query($conexion,$SQL)){
			
			if ($ventas >= 0 && $ventas <= 600 ) {
				$tipo_desc = 1;
			}
			elseif ($ventas > 600 && $ventas <= 1200 ) {
				$tipo_desc = 2;
			}
			elseif ($ventas > 1200 && $ventas <= 2400 ) {
				$tipo_desc = 3;
			}
			elseif ($ventas > 2400 && $ventas <= 5500 ) {
				$tipo_desc = 4;
			}
			elseif ($ventas > 5500 && $ventas <= 11000 ) {
				$tipo_desc = 5;
			}
			elseif ($ventas > 11000 && $ventas <= 16000 ) {
				$tipo_desc = 6;
			}
			elseif ($ventas > 16000 && $ventas <= 40000 ) {
				$tipo_desc = 7;
			}
			elseif ($ventas > 40000) {
				$tipo_desc = 8;
			}
			$SQL2 = "UPDATE compras_chiqui SET monto_mensual='".$ventas."', tipo_desc=".$tipo_desc." WHERE id_socio=".$id_socio;
			if(mysqli_query($conexion,$SQL2)){
				echo '<script language="javascript">';
					echo 'alert("Socio actualizado con éxito.");';
					echo "window.location='consulta_socios_chiqui_mundo.php';";
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
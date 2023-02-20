<?php 

	include("conexion.php");
	$nombre_socio 		= $_POST['nombre_socio'];
	$whats_socio  		= $_POST['whats_socio'];	
	$cod_distribuidor 	= $_POST['cod_distribuidor'];
	$calle_socio 		= $_POST['calle_socio'];
	$email_socio 		= $_POST['email_socio'];	
	$id_empleado 		= $_POST['id_empleado'];
		
	$hoy = date("Y-m-d");

	if ($_POST['bandera'] == 1) {
		$kuerin = "SELECT * FROM `dist_padre` where cod_dist_padre ='".$cod_distribuidor."'";
		$res = mysqli_query($conexion,$kuerin);
		if ($res) {
			$rengloncito = mysqli_num_rows($res);
			if ($rengloncito==1) {
				echo "r";
			}else{
				$sql ="INSERT INTO `dist_padre`(`nombre_dist_padre`, `cod_dist_padre`, `tel_dist_padre`, `domicilio_dist_padre`,  `email_dist_padre`, `fecha_add`) VALUES('".$nombre_socio."', '".$cod_distribuidor."', '".$whats_socio."', '".$calle_socio."', '".$email_socio."', '".$hoy."')";
				if(mysqli_query($conexion,$sql)){
					$ultimo_id = mysqli_insert_id($conexion);
					// $mensaje = "El socio ".$nombre_socio." ".$ap_pat_socio." se ha registrado con éxito";
					// $ruta = "window.location='agrega_imagen_socio.php?id=".$ultimo_id."';";
					// echo '<script language="javascript">';
					// 	echo 'alert("'.$mensaje.'");';
					// 	echo $ruta;
					// echo '</script>';
					echo $ultimo_id;
				}else{
					echo 0;
				}
			}

		}	
		
	
	}elseif ($_POST['bandera'] == 2) {
		$kuerin = "SELECT * FROM `dist_hijo` where num_asociado ='".$cod_distribuidor."'";
		$res = mysqli_query($conexion,$kuerin);
		if ($res) {
			$rengloncito = mysqli_num_rows($res);
			if ($rengloncito==1) {
				echo "r";
			}else{
				$id_papa = $_POST['dist_padre'];
				$ref_socio = $_POST['ref_socio'];
				$tip_usuario = $_POST['tip_usuario'];
				$sql ="INSERT INTO `dist_hijo`(`nombre_dist_hijo`, `num_asociado`, `tel_dist_hijo`, `domicilio_dist_hijo`,  `email_dist_hijo`, `dist_padre`, `cod_referido`, `tipo_asociado`, `fecha_add`) VALUES('".$nombre_socio."', '".$cod_distribuidor."', '".$whats_socio."', '".$calle_socio."', '".$email_socio."', ".$id_papa.", '".$ref_socio."', '".$tip_usuario."', '".$hoy."')";
				if(mysqli_query($conexion,$sql)){
					$ultimo_id = mysqli_insert_id($conexion);
					$sql1 ="INSERT INTO `herencia_hijos`(`id_dist_hijo`, `id_dist_padre`, `fecha_herencia`) VALUES(".$ultimo_id.", ".$id_papa.", '".$hoy."')";
					if(mysqli_query($conexion,$sql1)){
						echo $ultimo_id;
					}else{
						echo 0;
					}
					
				}else{
					echo 0;
				}
			}
		}
				
	}
	


 ?>
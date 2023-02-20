<?php 

	include("conexion.php");
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
	$id_empleado 		= $_POST['id_empleado'];			
	$notas_socio 		= $_POST['notas_socio'];
	$codigo_lealtad     = $_POST['codigo_lealtad'];	
	$ventas             = 0;	
		
	$hoy = date("Y-m-d");
	if ($_POST['bandera'] == 1) {
		echo $sqlc ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.", 0, '0', ".$codigo_lealtad.")";

		$ejecutado = mysqli_query($conexion,$sqlc);
//inisertar si tarjeta afiliado
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			
		}
		
		if(mysqli_query($conexion,$sql)){
			$ultimo_id = mysqli_insert_id($conexion);
			
			
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
			
			$sql2 ="INSERT INTO `compras_cklass`(`id_socio`, `monto_mensual`, `tipo_desc`)VALUES(".$ultimo_id.", '".$ventas."', ".$tipo_desc.")";
			if(mysqli_query($conexion,$sql2)){
				echo $ultimo_id;
			 }
			 else{
			 	echo 0;
			 }
		}else{
				// echo 0;
			}
	}elseif ($_POST['bandera'] == 2) {
		$sqln ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.", 0,'0',".$codigo_lealtad.")";
		$ejecutado = mysqli_query($conexion,$sqln);

		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
			
		}

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

		

	


 ?>
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
	$codigo_lealtad     = $_POST['codigo_lealtad'];		
	$notas_socio 		= $_POST['notas_socio'];
	$ventas             = 0;	
	
	$hoy = date("Y-m-d");
	$hoy1 = date("Ymd");
	
	//$codigo = $_POST['codigo'];
	//VICKYFORM
	if ($_POST['bandera'] == 2) {
		echo $sqlv ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.", 0, '0',".$codigo_lealtad.")";

		$ejecutado = mysqli_query($conexion,$sqlv);
	//insertar en las tablas de cada marca
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado = mysqli_query($conexion,$sql); 
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad!=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad!=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad!=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad!=""){
			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			
		}

		if(mysqli_query($conexion,$sql)){
			$ultimo_id = mysqli_insert_id($conexion);
			
			if ($ventas < 1299) {
				$tipo_desc = 1;
			} 
			elseif ($ventas >= 1299 && $ventas <= 2499 ) {
				$tipo_desc = 2;
			}
			elseif ($ventas >= 2500 ) {
				$tipo_desc = 3;
			}
			
			$sql2 ="INSERT INTO `compras_vicky`(`id_socio`, `monto_mensual`, `tipo_desc`)VALUES(".$ultimo_id.", '".$ventas."', ".$tipo_desc.")";
			if(mysqli_query($conexion,$sql2)){
				echo $ultimo_id;
			 }
			 else{
			 	echo 0;
			 }
		}else{
				echo 0;
			}
	//Intima
	}elseif ($_POST['bandera'] == 1) {
		$sqls ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, 0,".$codigo_lealtad.")";
		$ejecutado = mysqli_query($conexion,$sqls);
//inisertar en la tabla totales
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1 && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado == 1 && $codigo_lealtad !=0 && $codigo_lealtad!=""){
			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
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
	//TERRA		
	}elseif ($_POST['bandera'] == 3) {
		$sqlt ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.", 0, '0',".$codigo_lealtad.")";
		$ejecutado = mysqli_query($conexion,$sqlt);


//inisertar en las tablas de otras marcas
		if($ejecutado == 1 && $codigo_lealtad !=0 && $codigo_lealtad !="" ){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			
		}

		
		if(mysqli_query($conexion,$sql)){
			$ultimo_id = mysqli_insert_id($conexion);
			
			if ($ventas == 0) {
				$tipo_desc = 1;
			} 
			if ($ventas >= 1 && $ventas <= 1000 ) {
				$tipo_desc = 2;
			}
			elseif ($ventas >= 1001 && $ventas <= 2200 ) {
				$tipo_desc = 3;
			}
			elseif ($ventas >= 2201 && $ventas <= 5200 ) {
				$tipo_desc = 4;
			}
			elseif ($ventas >= 5201 && $ventas <= 10800 ) {
				$tipo_desc = 5;
			}
			
			$sql2 ="INSERT INTO `compras_terra`(`id_socio`, `monto_mensual`, `tipo_desc`)VALUES(".$ultimo_id.", '".$ventas."', ".$tipo_desc.")";
			if(mysqli_query($conexion,$sql2)){
				echo $ultimo_id;
			 }
			 else{
			 	echo 0;
			 }
		}else{
				// echo 0;
			}
	//MARYKAY
	}elseif ($_POST['bandera'] == 4) {
		$sql ="INSERT INTO `socios_mk`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,".$codigo_lealtad.")";

		$ejecutado = mysqli_query($conexion,$sql);
//inisertar en la tabla totales
		if($ejecutado ==1 ){

			$sql ="INSERT INTO `totales`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,".$codigo_lealtad.")";
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
	//BETTER
	}elseif ($_POST['bandera'] == 5) {
		
		//$codigo = $id_socio;
		//$id_socio = mysqli_insert_id($conexion);
		$sql1 ="INSERT INTO `socios_better`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,".$codigo_lealtad.")";
		
		$ejecutado = mysqli_query($conexion,$sql1);
//inisertar en la tabla totales
		if($ejecutado ==1 ){

			$sql ="INSERT INTO `totales`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,".$codigo_lealtad.")";
		}

		
		/*$resul = mysqli_query($conexion,$sql);
        $id = mysqli_insert_id($conexion);
        $codigo = $id.$hoy1;
       
        
        $sql = "UPDATE totales set codigo = '$codigo' where id_socio='$id'";
		$actulizado = mysqli_query($conexion,$sql);

		if($actulizado==1){

			$sql = "UPDATE socios_better set codigo = '$codigo' where id_socio='$id'";
		}*/
		
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
		
	//CHIQUI
	} elseif ($_POST['bandera'] == 6) {
		$sqlch ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";

		$ejecutado = mysqli_query($conexion,$sqlch);

//inisertar en la tabla totales
		if($ejecutado == 1 && $codigo_lealtad !=0 && $codigo_lealtad !="" ){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			
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
	//DANKRIZ SHOES	
	}elseif ($_POST['bandera'] == 7) {
		$sqlda ="INSERT INTO `socios_dankriz`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
		$ejecutado = mysqli_query($conexion,$sqlda);
		//inisertar en la tabla totales
		if($ejecutado == 1 && $codigo_lealtad !=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

		$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			
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
	
	}elseif ($_POST['bandera'] == 8) {
		$sqlda ="INSERT INTO `socios_berlei`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`, `saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,'0',".$codigo_lealtad.")";
		$ejecutado = mysqli_query($conexion,$sqlda);
		//inisertar en la tabla totales
		/*if($ejecutado == 1 && $codigo_lealtad !=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0, '0',".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_vicky`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_cklass`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_nice`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
			}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_terra`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

			$sql ="INSERT INTO `socios_chiqui`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			$ejecutado =mysqli_query($conexion,$sql);
		}
		if($ejecutado ==1  && $codigo_lealtad!=0 && $codigo_lealtad !=""){

		$sql ="INSERT INTO `socios_total`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`saldo`, `codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0,".$codigo_lealtad.")";
			
		}	*/
	
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
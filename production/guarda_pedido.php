<?php 
	include("conexion.php");
	$id_socio 		= $_POST['id_socio'];
	$id_empleado 	= $_POST['id_empleado'];	
	$id_socio 		= $_POST['id_socio'];
	$pedido 		= $_POST['pedido'];
	$devolucion     = $_POST['devolucion'];
	$dev_final 		= $devolucion * 0.8135;
	$f_pedido 		= round($pedido-$dev_final);
	$apagar 		= $_POST['apagar'];
	$tip_pago 		= $_POST['tip_pago'];
	$fracc 		= $_POST['fracc'];
	$fracc1 		= $_POST['fracc1'];

	if ($apagar >= $f_pedido) {
		$cambio = ($apagar-$f_pedido)*-1;
		$apagar = $f_pedido;
	}
	switch ($tip_pago) {
		case 1:
			$fracc1 = $apagar;
			$fracc = 0;
			$tt = $apagar;
			break;
		case 2:
			$fracc = $apagar;
			$fracc1 = 0;
			$tt = $apagar;
			break;
		case 3:
			$tt = $fracc + $fracc1;
			break;
	}
	$hoy = date("Y-m-d H:i:s");	

	if ($tt != $apagar) {
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error los montos de pago Fraccionado no coinciden con el monto total.");';
			echo 'window.history.back();';
		echo '</script>';
	}else{

		$sql1 ="INSERT INTO `venta_caja`(`id_dist_hijo`, `id_empleado`, `fecha_venta`, `monto_caja`, `monto_pagado`, `dev_final`) VALUES(".$id_socio.", ".$id_empleado.", '".$hoy."', '".$pedido."', '".$apagar."', '".$dev_final."')";
		if(mysqli_query($conexion,$sql1)){
			$ultimo_id = mysqli_insert_id($conexion);
			$sql = "INSERT INTO `pagos_caja` (`id_venta`, `monto_pago`, `fecha_pago`, `forma_pago`, `fracc_tarjeta`, `fracc_efectivo`) VALUES(".$ultimo_id.", '".$apagar."', '".$hoy."', '".$tip_pago."', '".$fracc."', '".$fracc1."')";
			
			if(mysqli_query($conexion,$sql)){
				echo '<script language="javascript">';
					echo 'alert("Pedido Pagado");';
					echo 'window.location="ver_cuenta.php?id_socio='.$id_socio.'&id_venta='.$ultimo_id.'";';
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
	}

 ?>
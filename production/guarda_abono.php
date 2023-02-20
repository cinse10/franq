<?php 
	include("conexion.php");
	$id_socio 		= $_POST['id_socio'];
	$id_empleado 		= $_POST['id_empleado'];	
	$id_venta 		= $_POST['id_venta'];
	$pedido 		= $_POST['pedido'];
	$apagar 		= $_POST['apagar'];
	$tip_pago 		= $_POST['tip_pago'];
	$fracc 		= $_POST['fracc'];
	$fracc1 		= $_POST['fracc1'];

	if ($apagar >= $pedido) {
		$cambio = ($apagar-$pedido)*-1;
		$apagar = $pedido;
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
		$ventilla = "SELECT * FROM `venta_caja` WHERE id_venta_caja =".$id_venta;
		$requi = mysqli_query($conexion,$ventilla);
	    while ($reg=mysqli_fetch_array($requi)) {
	    	$pagado_total = $reg['monto_pagado'];
	    }

	    $pagado_total = $pagado_total + $apagar ;

		$sql = "INSERT INTO `pagos_caja` (`id_venta`, `monto_pago`, `fecha_pago`, `forma_pago`, `fracc_tarjeta`, `fracc_efectivo`) VALUES(".$id_venta.", '".$apagar."', '".$hoy."', '".$tip_pago."', '".$fracc."', '".$fracc1."')";
			if(mysqli_query($conexion,$sql)){
				$sql1 ="UPDATE `venta_caja` SET `monto_pagado`='".$pagado_total."' WHERE id_venta_caja =".$id_venta;
				if(mysqli_query($conexion,$sql1)){
					echo '<script language="javascript">';
						echo 'alert("Pedido Pagado");';
						echo 'window.location="ver_cuenta.php?id_socio='.$id_socio.'&id_venta='.$id_venta.'";';
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
<?php 
	include("conexion.php");
	if(isset($_POST['array'])){
		$productos = json_decode($_POST['array']);
		$id_cliente = $_POST['id_cliente'];
		if (isset($_POST['FPAGO'])) {
			$forma_pago = $_POST['FPAGO'];
		}else{
			$forma_pago = "EFECTIVO";
		}
		
		$total_pago=0;
		$id_empleado=$_POST['id_empleado'];

		$fecha_ticket = date("Y-m-d H:i:s");
		$bandera = 0;
		$precios = array();
		$sql2 = "Select * from compras_cklass where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
        $kuerillo = "Select * from socios_cklass where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$kuerillo);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$saldo = $desc['saldo'];
        }
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos_cklass where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	$catalogo = $productillo['catalogo_producto'];
	        	if($stock>0){
	        		if ($_POST['id_cliente']==1 ) {
	        			$precio_producto = $productillo['precio_credito'];
	        		}elseif ($_POST['id_cliente']==71) {
        				$precio_producto = ceil($productillo['precio_asociado']-($productillo['precio_asociado']*0.10));
        			}else{
	        			if ($productillo['catalogo_producto'] == 'CATALOGO') {
	        				$precio_producto = $productillo['precio_credito'];
	        			}else{
		        			if ($_POST['id_cliente']==21) {
		        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.30);
		        			}elseif ($_POST['id_cliente']==3) {
		        				$precio_producto = $productillo['precio_contado'];
		        			}elseif ($_POST['id_cliente']==68) {
		        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.33);
		        			}elseif ($_POST['id_cliente']==79) {
		        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.37);
		        			}elseif ($_POST['id_cliente']==249) {
		        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.25);
		        			}
							else{
								if($row['precio_oferta'] =="1"){
									$precio_producto = 1;
								}
								/*else if($row['precio_oferta'] == 0){
									$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.15),1,PHP_ROUND_HALF_UP);
								}*/else if($productillo['precio_oferta'] != 0 ){
		        				$precio_producto = round($productillo['precio_oferta']-($productillo['precio_oferta']*0.15),1,PHP_ROUND_HALF_UP);
								}else{
									$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.15),1,PHP_ROUND_HALF_UP);
								}
							}
	        			}
		        	}	
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_cklass SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		}
		$marca=5;
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$total_final = $totalito_pago-$saldo;
		$resta=0;
		if ($total_final < 0) {
			$resta = $total_final*-1; 
			$total_final = 0;
		}
		$sql_ticket = "INSERT INTO `tickets_cklass_op`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','6','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_cklass_op`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			// echo $kuerin;
			// echo "<br><br>";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		if ($id_cliente == 3 || $id_cliente == 24 || $id_cliente == 31 ) {
			$sql4 = "UPDATE `socios_cklass` SET `saldo`='0' WHERE id_socio=".$id_cliente;
		}else{
			$sql4 = "UPDATE `socios_cklass` SET `saldo`='".$resta."' WHERE id_socio=".$id_cliente;
		}
		mysqli_query($conexion,$sql4);
		// echo "Bandera: ".$bandera;
		echo $id_ticket;

	}
	


 ?>
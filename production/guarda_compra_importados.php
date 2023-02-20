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
		$sql2 = "Select * from compras_importados where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
        $kuerillo = "Select * from socios_dankriz where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$kuerillo);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$saldo = $desc['saldo'];
        }
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos_importados where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	$catalogo = $productillo['catalogo_producto'];
	        	if($stock>0){
	        		if ($_POST['id_cliente']==1 ) {
	        			$precio_producto = $productillo['precio_publico'];
	        		}elseif($_POST['id_cliente']==4){
						$precio_producto = $productillo['precio_afiliado']-($productillo['precio_afiliado']*0.25);	
					}elseif ($_POST['id_cliente']==3) {
						$precio_producto = $productillo['precio_afiliado']-($productillo['precio_afiliado']*0.20);
					}elseif ($_POST['id_cliente']==41) {
						$precio_producto = $productillo['precio_afiliado']-($productillo['precio_afiliado']*0.20);
					}
					else{
	        			/*if ($_POST['id_cliente']==21) { 
	        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.25);
	        			}elseif ($_POST['id_cliente']==3) {
	        				$precio_producto = $productillo['precio_contado'];
	        			}elseif ($_POST['id_cliente']==68) {
	        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.33);
	        			}elseif ($_POST['id_cliente']==79) {
	        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.37);
	        			}elseif ($_POST['id_cliente']==41) {
	        				$precio_producto = $productillo['precio_afiliado']-($productillo['precio_afiliado']*0.20);
	        			}else{
							$precio_producto = $productillo['precio_afiliado'];
						}*/
						/*else{
	        				if ($catalogo!='Multimarcas') { 
				        		switch ($tipo_desc) {
				        			case '1':
				        				$precio_producto = $productillo['precio_asociado'];
				        				break;
				        			case '2':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.03),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '3':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.06),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '4':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.12),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '5':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.18),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '6':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.20),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '7':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.22),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '8':
				        				$precio_producto = round($productillo['precio_asociado']-($productillo['precio_asociado']*0.25),1,PHP_ROUND_HALF_UP);
				        				break;
				        			default:
				        				$precio_producto = $productillo['precio_asociado'];
				        				break;
				        		}	
				        	}
	        			}*/
						$precio_producto = $productillo['precio_afiliado'];
		        	}	
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_importados SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		}
		$marca=11;
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$total_final = $totalito_pago-$saldo;
		$resta=0;
		if ($total_final < 0) {
			$resta = $total_final*-1; 
			$total_final = 0;
		}
		$sql_ticket = "INSERT INTO `tickets_importados`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','11','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_importados`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			// echo $kuerin;
			// echo "<br><br>";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}

		if ($id_cliente == 3 || $id_cliente == 24 || $id_cliente == 31 ) {
			$sql4 = "UPDATE `socios_dankriz` SET `saldo`='0' WHERE id_socio=".$id_cliente;
		}else{
			$sql4 = "UPDATE `socios_dankriz` SET `saldo`='".$resta."' WHERE id_socio=".$id_cliente;
		}
		mysqli_query($conexion,$sql4);
		// echo "Bandera: ".$bandera;
		echo $id_ticket;
	}
	


 ?>

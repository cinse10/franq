  <?php 
	include("conexion.php");
	if(isset($_POST['array'])){
		$productos = json_decode($_POST['array']);
		$id_cliente = $_POST['id_cliente'];
		$nombre = $_POST['nombre'];
		$tel = $_POST['tel'];
		if (isset($_POST['FPAGO'])) {
			$forma_pago = $_POST['FPAGO'];
		}else{
			$forma_pago = "EFECTIVO";
		}
		
		$total_pago=0;
		$id_empleado=$_POST['id_empleado'];
		$abono=$_POST['abono'];

		$fecha_ticket = date("Y-m-d H:i:s");
		$bandera = 0;
		$precios = array();
		$sql2 = "Select * from compras_cklass where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
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
	        		}else{
	        			if ($_POST['id_cliente']==21) {
	        				$precio_producto = $productillo['precio_asociado']-($productillo['precio_asociado']*0.00);
	        			}elseif ($_POST['id_cliente']==3) {
	        				$precio_producto = $productillo['precio_contado'];
	        			}else{
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
				        	}else{
				        		$precio_producto = $productillo['precio_asociado'];
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
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$sql_ticket = "INSERT INTO `apartado_cklass`(`total_ticket`, `nombre_cliente`, `telefono_cliente`, `id_empledo`, `fecha_ticket`, `id_marca`, `total_abono`) VALUES ('".$totalito_pago."','".$nombre."','".$tel."',".$id_empleado.",'".$fecha_ticket."','6','".$abono."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
			$kuerito = "INSERT INTO `abonos_cklass`(`id_ticket`, `abono`, `fecha_abono`, `forma_pago`) VALUES (".$id_ticket.",'".$abono."', '".$fecha_ticket."','".$forma_pago."')";
			if(mysqli_query($conexion,$kuerito)){
		foreach ($productos as $posicion => $producto) {
				$bandera = 1;
				$kuerin = "INSERT INTO `transac_apartado_cklass`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
				if(mysqli_query($conexion,$kuerin)){
					$bandera = 1;
				}else{
					$bandera = 0;
				}
		}
			}else{
				$bandera = 0;
			}
			
		echo $id_ticket;
	}
 ?>
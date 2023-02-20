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
		$sql2 = "Select * from compras_terra where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos_terra where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	$lista = $productillo['lista_producto'];
	        	if($stock>0){
	        		if ($_POST['id_cliente']==1 ) {
	        			$precio_producto = $productillo['precio_pagos'];
	        		}else{ 
	        			if ($lista==1) {
	        				if ($_POST['id_cliente']==30) {
	        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.22),1,PHP_ROUND_HALF_UP);
	        				}else{
				        		switch ($tipo_desc) {
				        			case '1':
				        				$precio_producto = $productillo['precio_clave'];
				        				break;
				        			case '2':
				        				$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.04),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '3':
				        				$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.07),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '4':
				        				$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.13),1,PHP_ROUND_HALF_UP);
				        				break;
				        			case '5':
				        				$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.18),1,PHP_ROUND_HALF_UP);
				        				break;
				        			default:
				        				$precio_producto = $productillo['precio_clave'];
				        				break;
				        		}
				        	}
			        	}elseif ($lista==2){
			        		if ($_POST['id_cliente']==30) { //17%
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.34),1,PHP_ROUND_HALF_UP);
			        		}elseif ($_POST['id_cliente']==3) {
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.08),1,PHP_ROUND_HALF_UP);
			        		}else{
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.17),1,PHP_ROUND_HALF_UP);
			        		}
			        	}else{
			        		if ($_POST['id_cliente']==30) {//9%
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.18),1,PHP_ROUND_HALF_UP);
			        		}elseif ($_POST['id_cliente']==3) {
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.04),1,PHP_ROUND_HALF_UP);
			        		}else{
			        			$precio_producto = round($productillo['precio_pagos']-($productillo['precio_pagos']*0.09),1,PHP_ROUND_HALF_UP);
			        		}
			        	}
		        	}	
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_terra SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		}
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$sql_ticket = "INSERT INTO `apartado_terra`(`total_ticket`, `nombre_cliente`, `telefono_cliente`, `id_empledo`, `fecha_ticket`, `id_marca`, `total_abono`) VALUES ('".$totalito_pago."','".$nombre."','".$tel."',".$id_empleado.",'".$fecha_ticket."','5','".$abono."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
			$kuerito = "INSERT INTO `abonos_terra`(`id_ticket`, `abono`, `fecha_abono`, `forma_pago`) VALUES (".$id_ticket.",'".$abono."', '".$fecha_ticket."','".$forma_pago."')";
			if(mysqli_query($conexion,$kuerito)){
		foreach ($productos as $posicion => $producto) {
				$bandera = 1;
				$kuerin = "INSERT INTO `transac_apartado_terra`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
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
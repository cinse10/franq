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
	        	$lista = $productillo['lista_producto'];
	        	$libro = $productillo['libro_producto'];
	        	if($stock>=0){
	        		if ($_POST['id_cliente']==1 || $_POST['id_cliente']==2) {
	        			$precio_producto = $productillo['precio_pagos'];
	        		}else{
	        			if($libro == 'IMPORTADOS'){
	        				if ($_POST['id_cliente']==30) {
	        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.45),1,PHP_ROUND_HALF_UP);
	        				}elseif ($_POST['id_cliente']==3) {
	        					$precio_producto = $productillo['precio_clave'];
	        				}else{
	        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.15),1,PHP_ROUND_HALF_UP);
	        				}

	        			}elseif($libro == 'VERANO'){
	        				if ($_POST['id_cliente']==30) {
	        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.40),1,PHP_ROUND_HALF_UP);
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
		$sql_ticket = "INSERT INTO `devoluciones_cklass`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','5','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_cklass_devoluciones`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			// echo $kuerin;
			// echo "<br><br>";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		/*if ($id_cliente == 1 || $id_cliente == 3 || $id_cliente == 36 ) {
			$sql4 = "UPDATE `socios_terra` SET `saldo`='0' WHERE id_socio=".$id_cliente;
		}else{
			$sql4 = "UPDATE `socios_terra` SET `saldo`='".$resta."' WHERE id_socio=".$id_cliente;
		}*/
		mysqli_query($conexion,$sql4);
		// echo "Bandera: ".$bandera;
		echo $id_ticket;
	}
	


 ?>
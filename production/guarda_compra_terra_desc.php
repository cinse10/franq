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
		$sql2 = "Select * from compras_terra where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
        $kuerillo = "Select * from socios_terra where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$kuerillo);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$saldo = $desc['saldo'];
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
	        			
        				if ($_POST['id_cliente']==30) {
        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.32),1,PHP_ROUND_HALF_UP);
        				}else{
        					if ($_POST['id_cliente']==3) {
	        					$precio_producto = $productillo['precio_clave'];
	        				}elseif ($_POST['id_cliente']==67) {
	        					if ($productillo['marca_producto']=="MUNDO TERRA") {
	        						$precio_producto = ceil($productillo['precio_clave']-($productillo['precio_clave']*0.10));
	        					}elseif ($productillo['marca_producto']=="FLEXI" || $productillo['marca_producto']=="QUIRELLI") {
	        						$precio_producto = ceil($productillo['precio_clave']-($productillo['precio_clave']*0.15));
	        					}else{
	        						$precio_producto = ceil($productillo['precio_clave']-($productillo['precio_clave']*0.20));
	        					}
							
	        				}elseif ($_POST['id_cliente']==213) {
	        					$precio_producto = ceil($productillo['precio_clave']-($productillo['precio_clave']*0.34));
	        					
							}else{
								if($row['precio_oferta'] == "1"){
									$precio_producto = round(1);
								}
								else if($productillo['precio_oferta']!= 0){
									$precio_producto = round($productillo['precio_oferta']-($productillo['precio_oferta']*0.15),1,PHP_ROUND_HALF_UP);
								}else{
	        					$precio_producto = round($productillo['precio_clave']-($productillo['precio_clave']*0.15),1,PHP_ROUND_HALF_UP);
								}
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
		$marca=5;
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$total_final = $totalito_pago-$saldo;
		$resta=0;
		if ($total_final < 0) {
			$resta = $total_final*-1; 
			$total_final = 0;
		}
		$sql_ticket = "INSERT INTO `tickets_terra_desc`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','5','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_terra_desc`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			// echo $kuerin;
			// echo "<br><br>";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		// echo "Bandera: ".$bandera;
		if ($id_cliente == 1 || $id_cliente == 3 || $id_cliente == 36 ) {
			$sql4 = "UPDATE `socios_terra` SET `saldo`='0' WHERE id_socio=".$id_cliente;
		}else{
			$sql4 = "UPDATE `socios_terra` SET `saldo`='".$resta."' WHERE id_socio=".$id_cliente;
		}
		mysqli_query($conexion,$sql4);
		
		echo $id_ticket;
	}
	


 ?>
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
		$sql2 = "Select * from compras_cubrebocas where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
        $kuerillo = "Select * from socios_vicky where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$kuerillo);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$saldo = $desc['saldo'];
        }
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from cubrebocas where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	if($stock>0){
	        		if ($_POST['id_cliente']==1 ) {
	        			$precio_producto = $productillo['precio_catalogo'];
	        		}else{
					$precio_producto = $productillo['precio_afiliado'];
					}
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE cubrebocas SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		} 
		$total_final = $total_pago-$saldo;
		$resta=0;
		if ($total_final < 0) {
			$resta = $total_final*-1; 
			$total_final = 0;
		}
		$sql_ticket = "INSERT INTO `tickets_cubrebocas`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','4','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_cubrebocas`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		if ($id_cliente == 4 || $id_cliente == 1 ) {
			$sql4 = "UPDATE `socios_vicky` SET `saldo`='0' WHERE id_socio=".$id_cliente;
		}else{
			$sql4 = "UPDATE `socios_vicky` SET `saldo`='".$resta."' WHERE id_socio=".$id_cliente;
		}
		mysqli_query($conexion,$sql4);
		echo $id_ticket;
	}


 ?>
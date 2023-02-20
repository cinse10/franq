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
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	if($stock>0){
	        		if($id_cliente==1){
	        			$precio_producto = $productillo['precio_producto'];
	        		}elseif ($id_cliente==249) {
	        			$precio_producto = $productillo['precio_afi_producto']-($productillo['precio_afi_producto']*0.20);;
	        		}else{
	        			$precio_producto = $productillo['precio_afi_producto'];
	        		}
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		}
		$porcentaje=0;
		if ($total_pago>3000) {
			$porcentaje = $total_pago *0.05;
			$total_pago = $total_pago - $porcentaje;
		}
		$sql_ticket = "INSERT INTO `tickets_intima_bf`(`total_ticket`, `desc_intima`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`) VALUES ('".$total_pago."','".$porcentaje."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','3')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_intima_bf`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		echo $id_ticket;
	}


 ?>
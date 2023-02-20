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
			$sql_productos = "Select * from productos_nice where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	if($stock>0){
	        		if($id_cliente==4){
	        			$precio_producto = $productillo['precio_producto']-($productillo['precio_producto']*0.35);
	        		}else{
	        			$precio_producto = $productillo['precio_producto']-($productillo['precio_producto']*0.10);
	        		}
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_nice SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
	        	}else{
	        	}
	      	}
		}
		$totalito_pago = ((ceil($total_pago)+floor($total_pago))/2);
		$sql_ticket = "INSERT INTO `tickets_nice`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`) VALUES ('".$totalito_pago."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','7')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_nice`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		echo $id_ticket;
	}


 ?>
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
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos_nice where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	if($stock>0){
	        		if($id_cliente==4){
	        			$precio_producto = $productillo['precio_producto']-($productillo['precio_producto']*0.35);
	        		}else{
	        			// $precio_producto = $productillo['precio_producto'];
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
		$sql_ticket = "INSERT INTO `apartado_nice`(`total_ticket`, `nombre_cliente`, `telefono_cliente`, `id_empledo`, `fecha_ticket`, `id_marca`, `total_abono`) VALUES ('".$total_pago."','".$nombre."','".$tel."',".$id_empleado.",'".$fecha_ticket."','7','".$abono."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
			$kuerito = "INSERT INTO `abonos_nice`(`id_ticket`, `abono`, `fecha_abono`, `forma_pago`) VALUES (".$id_ticket.",'".$abono."', '".$fecha_ticket."','".$forma_pago."')";
			if(mysqli_query($conexion,$kuerito)){
		foreach ($productos as $posicion => $producto) {
				$bandera = 1;
				$kuerin = "INSERT INTO `transac_apartado_nice`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
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
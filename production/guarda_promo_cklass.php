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
		$ban =0; 
		$kuerillo = "Select * from socios_cklass where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$kuerillo);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$saldo = $desc['saldo'];
        }
		$productin = 0;
		foreach ($productos as $posicion => $producto) {
			$sql_productos = "Select * from productos_cklass where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	if($stock>0){
	        		if($id_cliente==1){
	        			$precio_producto = $productillo['precio_credito'];
	        		}elseif($id_cliente==21){
	        			$precio_producto = ceil($productillo['precio_asociado']-($productillo['precio_asociado']*0.30));
	        		}elseif($id_cliente==3){
	        			$precio_producto = $productillo['precio_contado'];
	        		}else{
	        			$precio_producto = ceil($productillo['precio_asociado']-($productillo['precio_asociado']*0.15));
	        		}
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	if ($ban == 0) {
				      $chiquito =  $precio_producto;
				      $ban = 1;
				    }else{
				      if ($chiquito <  $precio_producto) {
				        $chiquito = $chiquito;
				      }else {
				        $chiquito =  $precio_producto;
				      }
				      	$ban++;
				    }
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_cklass SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
		        	$productin++;
	        	}else{
	        	}
	      	}
		}
		if ($productin < 2) {
			$total_pago = $total_pago;
		}else{
			$total_pago = $total_pago-$chiquito;
		}
		$total_final = $total_pago-$saldo;
		$resta=0;
		if ($total_final < 0) {
			$resta = $total_final*-1; 
			$total_final = 0;
		}
		$sql_ticket = "INSERT INTO `tickets_cklass_promo`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`, `saldito`) VALUES ('".$total_final."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','6','".$saldo."')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_cklass_promo`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
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
		echo $id_ticket;
	}
	


 ?>
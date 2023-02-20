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
			$sql_productos = "Select * from productos_marykay where id_producto=".$producto;
			$resp_producto = mysqli_query($conexion,$sql_productos);
	        while ($productillo=mysqli_fetch_array($resp_producto)) {
	        	$stock = $productillo['inventario_producto'];
	        	$linio = $productillo['sub_linio'];
	        	$cod_linio = $productillo['cod_linio']; 
	        	if($stock>0){
	        		$precio_producto = $productillo['precio_compra'];
	        		
	        		array_push($precios,$precio_producto);
		        	$total_pago += $precio_producto;
		        	$stock = $stock -1 ;
		        	$update_producto = "UPDATE productos_marykay SET inventario_producto=".$stock." WHERE id_producto=".$productillo['id_producto'];
		        	mysqli_query($conexion,$update_producto);
		        	if ($linio != NULL) {
		        		$accion = 'ProductUpdate';
	                    $formato = 'JSON';
	                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
	                                    <Request>
	                                        <Product>
	                                            <SellerSku>'.$cod_linio.'</SellerSku>
	                                            <Quantity>'.$stock.'</Quantity>
	                                        </Product>
	                                    </Request>   

	                    ';

	                    $url = '';

	                    // No prestes atención a este comunicado.
	                    // Es sólo necesario si la zona horaria en php.ini no están correctamente ajustadas.
	                    //date_default_timezone_set("UTC");
	                    date_default_timezone_set("America/Mexico_City");

	                    // La hora actual. Necesaria para crear el parámetro de marca de hora a continuación.
	                    $now = new DateTime();

	                    // Los parámetros para nuestra petición GET. Estos se consiguen firmado.
	                    $parameters = array(
	                        // El ID de usuario para el que estamos haciendo la llamada.
	                        'UserID' => 'perliz_cusgar@outlook.com',

	                        // La versión de la API. Actualmente debe ser 1.0
	                        'Version' => '1.0',

	                        // El método API para llamar.
	                        'Action' => $accion,

	                        // El formato del resultado.
	                        'Format' => $formato,

	                        // La hora actual formato de ISO8601
	                        'Timestamp' => $now->format(DateTime::ISO8601)
	                    );

	                    // Ordenar parámetros por nombre.
	                    ksort($parameters);

	                    // URL codificar los parámetros.
	                    $encoded = array();
	                    foreach ( $parameters as $name => $value ) {
	                        $encoded[] = rawurlencode($name) . '=' . rawurlencode($value);
	                    }

	                    // Concatenar los parámetros ordenados y URL codificadas en una cadena.
	                    $concatenated = implode('&', $encoded);

	                    // La clave API para el usuario como genera en el Centro GUI vendedor.
	                    // Debe ser una clave de API asociado con el parámetro ID de usuario.
	                    $api_key = '923d60f6beebda30ec62cf9cde302ad977e4d67d';

	                    // Calcular firma y añadirlo a los parámetros.
	                    $parameters['Signature'] = rawurlencode(hash_hmac('sha256', $concatenated, $api_key, false));

	                    // Armando consulta
	                    $api_url = 'https://sellercenter-api.linio.com.mx?';
	                    $url = $api_url.$concatenated.'&Signature='.$parameters['Signature'];


	                    // Open Curl connection
	                    $ch = curl_init();
	                    curl_setopt($ch, CURLOPT_URL, $url);
	                    // Save response to the variable $data
	                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	                    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_xml);
	                    $data = curl_exec($ch);
	                    // Close Curl connection
	                    curl_close($ch);
		        	}
	        	}else{
	        	}
	      	}
		}
		$sql_ticket = "INSERT INTO `tickets_marykay`(`total_ticket`, `id_cliente`, `forma_pago`, `id_empledo`, `fecha_ticket`, `id_marca`) VALUES ('".$total_pago."',".$id_cliente.",'".$forma_pago."',".$id_empleado.",'".$fecha_ticket."','8')";
		mysqli_query($conexion,$sql_ticket);
		$id_ticket = mysqli_insert_id($conexion);
		foreach ($productos as $posicion => $producto) {
			$kuerin = "INSERT INTO `transacciones_marykay`(`id_ticket`, `id_producto`, `precio_venta`) VALUES (".$id_ticket.",".$producto.",'".$precios[$posicion]."')";
			if(mysqli_query($conexion,$kuerin)){
				$bandera = 1;
			}else{
				$bandera = 0;
			}
		}
		echo $id_ticket;
	}
	


 ?>
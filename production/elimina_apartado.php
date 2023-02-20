<?php 
	include("conexion.php");
		
	if (isset($_POST['id_ticket'])) {
		$id_ticket=$_POST['id_ticket'];
		$marca = $_POST['marca'];
		if ($marca ==1) {
			$sql = "UPDATE `tickets_misentir` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_misentir` INNER JOIN productos_misentir ON transacciones_misentir.id_producto=productos_misentir.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_misentir` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_misentir` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==2) {
			$sql = "DELETE FROM `abonos_bike`  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transac_apartado_bike` INNER JOIN productos_bike ON transac_apartado_bike.id_producto=productos_bike.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
				while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;		
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
			        	$item_id = $producto['ml_id'];			
						$sql2 ="UPDATE `productos_bike` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
			        	if ($item_id != NULL) {
			        		include ("conector_ml/credencial.php");

							$post = array(			   
									   "available_quantity" => $inventario		   
									);
							$post3 = json_encode($post);
							$ch = curl_init("https://api.mercadolibre.com/items/$item_id?access_token=$token");
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
								curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);

								// execute!
								$respuesta = curl_exec($ch);

								// close the connection, release resources used
								curl_close($ch);
		
			        	}
					}
				}
				$sql3 = "DELETE FROM `transac_apartado_bike` WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
                if(mysqli_query($conexion,$sql3)){
                    $sqld = "DELETE FROM `apartado_bike` WHERE id_ticket=".$id_ticket;
                    mysqli_query($conexion,$sqld);
                }
			}				
		}
		if ($marca ==3) {
			$sql = "UPDATE `tickets_intima` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_intima` INNER JOIN productos ON transacciones_intima.id_producto=productos.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;		
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];		
						$sql2 ="UPDATE `productos` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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

					}
				}
				$sql3 = "DELETE FROM `transac_apartado_intima` WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
				if(mysqli_query($conexion,$sql3)){ 
                    $sqld = "DELETE FROM `apartado_intima` WHERE id_ticket=".$id_ticket;
                    mysqli_query($conexion,$sqld);
                }
			}				
		}
		if ($marca ==4) {
			$sql = "UPDATE `tickets_vicky` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_vicky` INNER JOIN productos_vicky ON transacciones_vicky.id_producto=productos_vicky.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_vicky` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_vicky` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}							
		}			
		if ($marca ==5) {
			$sql = "UPDATE `tickets_terra` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_terra` INNER JOIN productos_terra ON transacciones_terra.id_producto=productos_terra.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_terra` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_terra` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==6) {
			$sql = "UPDATE `tickets_cklass` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_cklass` INNER JOIN productos_cklass ON transacciones_cklass.id_producto=productos_cklass.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_cklass` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==7) {
			$sql = "UPDATE `tickets_nice` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_nice` INNER JOIN productos_nice ON transacciones_nice.id_producto=productos_nice.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_nice` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_nice` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==8) {
			$sql = "UPDATE `tickets_desc_vicky` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_desc_vicky` INNER JOIN productos_vicky ON transacciones_desc_vicky.id_producto=productos_vicky.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_vicky` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_desc_vicky` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}							
		}	
		if ($marca ==9) {
			$sql = "UPDATE `tickets_cklass_promo` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_cklass_promo` INNER JOIN productos_cklass ON transacciones_cklass_promo.id_producto=productos_cklass.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_cklass_promo` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==10) {
			$sql = "UPDATE `tickets_cklass_op` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_cklass_op` INNER JOIN productos_cklass ON transacciones_cklass_op.id_producto=productos_cklass.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_cklass_op` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==11) {
			$sql = "UPDATE `tickets_terra_desc` SET `total_ticket`='0'  WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_terra_desc` INNER JOIN productos_terra ON transacciones_terra_desc.id_producto=productos_terra.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;					
						$sql2 ="UPDATE `productos_terra` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
				}
				$sql3 = "UPDATE `transacciones_terra_desc` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==12) {
			$sql = "UPDATE `tickets_intima_bf` SET `total_ticket`='0', `desc_intima`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_intima_bf` INNER JOIN productos ON transacciones_intima_bf.id_producto=productos.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];				
						$sql2 ="UPDATE `productos` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_intima_bf` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==13) {
			$sql = "UPDATE `tickets_marykay` SET `total_ticket`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_marykay` INNER JOIN productos_marykay ON transacciones_marykay.id_producto=productos_marykay.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
						$sql2 ="UPDATE `productos_marykay` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_marykay` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==14) {
			$sql = "UPDATE `tickets_betterware` SET `total_ticket`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_betterware` INNER JOIN productos_betterware ON transacciones_betterware.id_producto=productos_betterware.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
						$sql2 ="UPDATE `productos_betterware` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_betterware` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		if ($marca ==15) {
			$sql = "UPDATE `tickets_chiqui` SET `total_ticket`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_chiqui` INNER JOIN productos_chiqui ON transacciones_chiqui.id_producto=productos_chiqui.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
						$sql2 ="UPDATE `productos_chiqui` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_chiqui` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}

		if ($marca ==16) {
			$sql = "UPDATE `tickets_dankriz` SET `total_ticket`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_dankriz` INNER JOIN productos_dankriz ON transacciones_dankriz.id_producto=productos_dankriz.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
						$sql2 ="UPDATE `productos_dankriz` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_dankriz` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
		//Importados
		if ($marca ==17) {
			$sql = "UPDATE `tickets_importados` SET `total_ticket`='0'   WHERE id_ticket=".$id_ticket;
			if(mysqli_query($conexion,$sql)){
				$kueri = "SELECT * FROM `transacciones_importados` INNER JOIN productos_importados ON transacciones_importados.id_producto=productos_importados.id_producto WHERE id_ticket=".$id_ticket;
				$respuesta2=mysqli_query($conexion,$kueri);
				$renglones = mysqli_num_rows($respuesta2);
				if($renglones!=0){
					
					while($producto = mysqli_fetch_array($respuesta2)){
						$id_producto = $producto['id_producto'];
						$inventario = $producto['inventario_producto'] + 1;	
						$linio = $producto['sub_linio'];
			        	$cod_linio = $producto['cod_linio'];
						$sql2 ="UPDATE `productos_importados` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
						if ($linio != NULL) {
			        		$accion = 'ProductUpdate';
		                    $formato = 'JSON';
		                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
		                                    <Request>
		                                        <Product>
		                                            <SellerSku>'.$cod_linio.'</SellerSku>
		                                            <Quantity>'.$inventario.'</Quantity>
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
					}
				}
				$sql3 = "UPDATE `transacciones_importados` SET `precio_venta`='0' WHERE id_ticket=".$id_ticket;
				mysqli_query($conexion,$sql3);
			}				
		}
	
	}
 ?>
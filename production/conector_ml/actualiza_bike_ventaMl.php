<?php 
	include ("credencialmm.php");
	include("../conexion.php");
        //$id_producto = $_GET['id_producto'];
		//$productos = json_decode($_POST['array']) ;
        $id_producto = $_POST['id_producto'];
		
            $sql = "select * from productos_bike WHERE id_producto=".$id_producto."";
            $requi = mysqli_query($conexion,$sql);

            while ($reg=mysqli_fetch_array($requi)) {
                
                $item_id = $reg['ml_id'];
                
                $id_producto = $reg['id_producto'];
                
                $nombre_producto = $reg['nombre_producto'];
                $rodada_producto = $reg['rodada_producto'];
                $color_producto = $reg['color_producto'];
                $precio_publico = $reg['precio_publico'];
               // $precio_publico = 	$precio_publico * 1.05;

                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['cod_barras_bike'];
                $co_generico = $reg['co_generico'];
                $tipo_bike = $reg['tipo_bike'];
                $modelo_bike = $reg['modelo_bike'];
                $marca_bike = $reg['marca_bike'];
                $material_bike = $reg['material_bike'];
                $edad = $reg['edad_bike'];
                if ($edad==0) {
                	$edad_bike="Adultos";
                }elseif ($edad==1) {
                	$edad_bike="Niños";
                }

                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];  

                $i_uno = "https://bikenet.com.mx/bikes1/bikes/".$uno."";
				$i_dos = "https://bikenet.com.mx/bikes1/bikes/".$dos."";
				$i_tres = "https://bikenet.com.mx/bikes1/bikes/".$tres."";     

                $estilo_bike = $reg['estilo_bike'];
                $tipo_accesorio = $reg['tipo_accesorio'];
                $tipo_triciclo = $reg['tipo_triciclo'];
                $genero_bike = $reg['genero_bike'];

                if ($genero_bike == 'MUJER' || $genero_bike == 'NIÑA') {
                	$genero_bike = 'Femenino';
                }elseif ($genero_bike == 'HOMBRE' || $genero_bike == 'NIÑO') {
                	$genero_bike = 'Masculino';
                }

                $velocidades_bike = $reg['velocidades_bike'];
                $freno_delantero = $reg['freno_delantero'];
                $freno_trasero = $reg['freno_trasero'];             
                $montaje_bike = $reg['montaje_bike'];
                $pegable_bike = $reg['pegable_bike'];
                $personaje_bike = $reg['personaje_bike'];
                $ruedas = $reg['ruedas'];
                $edad_max = $reg['edad_max'];
				$peso_max = $reg['peso_max'];
				$edad_min = $reg['edad_min'];
                $desc = $reg['descripcion_bike'];

                $descripcion = str_replace( '<br />',"\n",  $desc);
                $descripcion_bike = strip_tags($descripcion); 

                $detalles_bike = $reg['detalles_bike'];
                $altura=$reg['altura'];
                $anchura=$reg['anchura'];
                $longitud=$reg['longitud'];
                $peso=$reg['peso'];                
                $cod_linio=$reg['cod_linio'];
				$ensamblado = "Sí";
            }
            
            
//----
	/* $nombre="prueba dE BICIS cherry _otrA";
	 $precio=4000;
	 $disponible=5;
	 $desc="• Cubre cadena tipo “P” \n
	 		• 3 capas de pintura en polvo y calcomanía bajo barniz \n
	 		• Llantas entrenadoras en R12 y R16\n
	 		• Cuadro y tijera de acero Hi-Ten\n
	 		• Rines pintados\n
	 		• Asiento confort\n            
	 		• Salpicaderas de acero pintadas\n";

	
	 $edad = "Adultos"; //select opcion, Adultos- niños
	 $material_bici = "Acero";
	 $tipo_bici = "Mountain bike"; //este va con un select opcion Checar ML
	 $marca = "NAHEL";
	 $modelo = "GP Reacing";
	 $tipo_freno = "Cantilever";
	 $genero = "Sin género";
	 $velocidades = "1";
	 $rodada = "24";
	 $color = "Naranja";
*/
	//--------
        $desc_envio = 0.40;

        if ($tipo_bike==0) {
        	// BICICLETAS
        	$categoria = "MLM62091";  
        	$envio = 460;
        	$pago_envio = $envio-($envio*$desc_envio);
			$porcent = $precio_publico * 26 /100;
        	$precio_final = ceil($precio_publico + $porcent + $pago_envio);
        	$put = array(
			   //"title" => $nombre_producto,
			  // "category_id" => "MLM62091", //Bicicleta-Triciclo MLM38486-Scooter MLM74484-Accesorios pa bicicletas (chacar tipos en ml)          
            	//"price" => $precio_final,
			    //"currency_id" => "MXN",
				"available_quantity" => $inventario_producto,
			   //"buying_mode" => "buy_it_now",
			   
			   //"listing_type_id" => "gold_pro",	
			   "sale_terms" => array(
			      array(
			         "id" => "WARRANTY_TYPE",
			         "value_name" => "Sin garantía"
			      )
			   ),
			   /*"description" => array(
				"plain_text" => $descripcion_bike
			 ),*/
			   /*"pictures" => array(
			      array(
			         "source" => $i_uno,
			      ),
			      array(
			         "source" => $i_dos,
			      ),
			      array(
			      	 "source" => $i_tres
			      )
			   ),*/
			   	"accepts_mercadopago" => true,
    			
                
			   /*"attributes" => array(
			      array(
			         "id" => "AGE_GROUP",
			         "value_name" => $edad_bike
			      ),
			      array(
			         "id" => "BICYCLE_FRAME_MATERIALS",
			         "value_name" => $material_bike
			      ),
			      array(
			         "id" => "BICYCLE_TYPE",
			         "value_name" => $estilo_bike
			      ),
			      array(
			         "id" => "BRAND",
			         "value_name" => $marca_bike
			      ),
			      array(
			      	"id" => "MODEL",
			      	"value_name" => $modelo_bike
			      ),
			      array(
			      	"id" => "FRONT_BREAK_TYPE",
		            "value_name" => $freno_delantero
			      ),
			      array(
			      	"id" => "REAR_BREAK_TYPE",
		            "value_name" => $freno_trasero
			      ),
			      array(
			      	"id" => "REQUIRES_ASSEMBLY",
			      	"value_name" => $ensamblado
			      ),
			      array(
			      	"id" => "FRONT_GEARS",
			      	"value_name" => "N/A"
			      ),
			      array(
			      	"id" => "REAR_GEARS",
			      	"value_name" => "N/A"
			      ),
			      array(
			      	"id" => "IS_FOLDABLE",
			      	"value_name" => "No"
			      ),
			      array(
			      	"id" => "SEX",
			      	"value_name" => $genero_bike
			      ),
			      array(
			      	"id" => "SPEEDS_NUMBER",
			      	"value_name" => $velocidades_bike
			      ),
			      array(
			      	"id" => "WHEEL_SIZE",
			      	"value_name" => $rodada_producto
			      ),
			      array(
			      	"id" => "COLOR",
			      	"value_name" => $color_producto
			      )			           
			  ),   */
			);
        }elseif ($tipo_bike==1) {
        	// echo "accesorios";
        	switch ($tipo_accesorio) {
        		case 0:
        			// CASCOS  cATEGORIA: MLM6143
        			$categoria = "MLM6143";
		        	$envio = 141;
		        	$pago_envio = $envio-($envio*$desc_envio);
		        	$porcent = $precio_publico * 26 /100;
        			$precio_final = ceil($precio_publico + $porcent + $pago_envio);
					$put = array(
						   "title" => $nombre_producto,
						   "category_id" => $categoria, 
						   "price" => $precio_final,
						   "currency_id" => "MXN",
						   "available_quantity" => $inventario_producto,
						   "buying_mode" => "buy_it_now",
						   
						   "listing_type_id" => "gold_pro",
						   /*"description" => array(
						      "plain_text" => $descripcion_bike
						   ),*/
						   "sale_terms" => array(
						      array(
						         "id" => "WARRANTY_TYPE",
						         "value_name" => "Sin garantía"
						      )
						   ),
						  /* "pictures" => array(
						      array(
						         "source" => $i_uno,
						      ),
						      array(
						         "source" => $i_dos,
						      ),
						      array(
						      	 "source" => $i_tres
						      )
						   ),*/
						   	"accepts_mercadopago" => true,
			    			

						   "attributes" => array(
						      
						      array(
						         "id" => "GENDER",
						         "value_name" => $genero_bike
						      ),
						      array(
						         "id" => "MOUNTING_PLACE",
						         "value_name" => $montaje_bike
						      ),
						      array(
						         "id" => "MATERIAL",
						         "value_name" => $material_bike
						      ),
						      array(
						         "id" => "BRAND",
						         "value_name" => $marca_bike
						      ),
						      array(
						      	"id" => "MODEL",
						      	"value_name" => $modelo_bike
						      ),
						      array(
						      	"id" => "WITH_VENTILATION",
						      	"value_name" => "SI"
						      ),
						      array(
						      	"id" => "COLOR",
						      	"value_name" => $color_producto
						      )			           
						  ),		      
					);
        			break;
        		
        		case 1:
        			// RUEDITAS cATEGORIA: MLM191185 
        			$categoria = "MLM191185";
		        	$envio = 141;
		        	$pago_envio = $envio-($envio*$desc_envio);
		        	$porcent = $precio_publico * 26 /100;
        			$precio_final = ceil($precio_publico + $porcent + $pago_envio);
					$put = array(
						   "title" => $nombre_producto,
						   "category_id" => $categoria,
						   "price" => $precio_final,
						   "currency_id" => "MXN",
						   "available_quantity" => $inventario_producto,
						   "buying_mode" => "buy_it_now",
						   
						   "listing_type_id" => "gold_pro",
						   /*"description" => array(
						      "plain_text" => $descripcion_bike
						   ),*/
						   "sale_terms" => array(
						      array(
						         "id" => "WARRANTY_TYPE",
						         "value_name" => "Sin garantía"
						      )
						   ),
						   /*"pictures" => array(
						      array(
						         "source" => $i_uno,
						      ),
						      array(
						         "source" => $i_dos,
						      ),
						      array(
						      	 "source" => $i_tres
						      )
						   ),*/
						   	"accepts_mercadopago" => true,
			    			

						   "attributes" => array(
						     
						      array(
						         "id" => "BRAND",
						         "value_name" => $marca_bike
						      ),
						      array(
						      	"id" => "MODEL",
						      	"value_name" => $modelo_bike
						      ),
						      array(
						      	"id" => "COLOR",
						      	"value_name" => $color_producto
						      )			           
						  ),		      
					);

        			break;
        		case 2:
        			// CANASTAS cATEGORIA: MLM191176
        			$categoria = "MLM191176";
		        	$envio = 141;
		        	$porcent = $precio_publico * 26 /100;
        			$precio_final = ceil($precio_publico + $porcent + $pago_envio);
					$put = array(
						   "title" => $nombre_producto,
						   "category_id" => $categoria, //Bicicleta-Triciclo MLM38486-Scooter MLM74484-Accesorios pa bicicletas (chacar tipos en ml)
						   "price" => $precio_final,
						   "currency_id" => "MXN",
						   "available_quantity" => $inventario_producto,
						   "buying_mode" => "buy_it_now",
						   
						   "listing_type_id" => "gold_pro",
						   /*"description" => array(
						      "plain_text" => $descripcion_bike
						   ),*/
						   "sale_terms" => array(
						      array(
						         "id" => "WARRANTY_TYPE",
						         "value_name" => "Sin garantía"
						      )
						   ),
						   /*"pictures" => array(
						      array(
						         "source" => $i_uno,
						      ),
						      array(
						         "source" => $i_dos,
						      ),
						      array(
						      	 "source" => $i_tres
						      )
						   ),*/
						   	"accepts_mercadopago" => true,
			    			

						   "attributes" => array(
						      
						      array(
						         "id" => "MOUNTING_PLACE",
						         "value_name" => $montaje_bike
						      ),
						      array(
						         "id" => "MATERIAL",
						         "value_name" => $material_bike
						      ),
						      array(
						         "id" => "BRAND",
						         "value_name" => $marca_bike
						      ),
						      array(
						      	"id" => "MODEL",
						      	"value_name" => $modelo_bike
						      ),
						      array(
						      	"id" => "COLOR",
						      	"value_name" => $color_producto
						      )			           
						  ),		      
					);
        			break;
        	}


        }elseif ($tipo_bike==2) {
        	// TRICICLO
        	$categoria = "MLM38486";
        	$envio = 248;
        	$pago_envio = $envio-($envio*$desc_envio);
        	$porcent = $precio_publico * 30 /100;
        	$precio_final = ceil($precio_publico + $porcent + $pago_envio);
			/*if($inventario_producto > 0){
				array_push($put, "status => active");
			}*/
			$put = array(
				   "title" => $nombre_producto,
				   "category_id" => "MLM38486", //Bicicleta-Triciclo MLM38486-Scooter MLM74484-Accesorios pa bicicletas (chacar tipos en ml)
				   //"price" => $precio_final,
				   "currency_id" => "MXN",
				   "available_quantity" => $inventario_producto,
				  
				   "buying_mode" => "buy_it_now",
				   
				  // "listing_type_id" => "gold_pro",
				   /*"description" => array(
				      "plain_text" => $descripcion_bike
				   ),*/
				   "sale_terms" => array(
				      array(
				         "id" => "WARRANTY_TYPE",
				         "value_name" => "Sin garantía"
				      )
				   ),
				   /*"pictures" => array(
				      array(
				         "source" => $i_uno,
				      ),
				      array(
				         "source" => $i_dos,
				      ),
				      array(
				      	 "source" => $i_tres
				      )
				   ),*/
				   	"accepts_mercadopago" => true,
	    			

				   "attributes" => array(
				      array(
				         "id" => "AGE_GROUP",
				         "value_name" => $edad_bike
				      ),
				      array(
				         "id" => "CHARACTER",
				         "value_name" => $personaje_bike
				      ),
				      array(
				         "id" => "VEHICLE_MATERIALS",
				         "value_name" => $material_bike
				      ),
				      array(
				         "id" => "BRAND",
				         "value_name" => $marca_bike
				      ),
				      array(
				      	"id" => "MODEL",
				      	"value_name" => $modelo_bike
				      ),
				      array(
				      	"id" => "REQUIRES_ASSEMBLY",
				      	"value_name" => $ensamblado
				      ),
				      array(
				      	"id" => "IS_FOLDABLE",
				      	"value_name" => "NO"
				      ),
				      array(
				      	"id" => "SEX",
				      	"value_name" => $genero_bike
				      ),				      
				      array(
				      	"id" => "MAX_RECOMMENDED_AGE",
				      	"value_name" => "7 años"
				      ),
				      array(
				      	"id" => "RECOMMENDED_MINIMUM_AGE",
				      	"value_name" => "50 Kg"
				      ),
				      array(
				      	"id" => "MAX_RECOMMENDED_AGE",
				      	"value_name" => "3 años"
				      ),
				      array(
				      	"id" => "COLOR",
				      	"value_name" => $color_producto
				      )			           
				  ),		      
			);

        }elseif ($tipo_bike==3) {
        	// SCOTTER
        	$categoria = "MLM74484";
        	$envio = 212;
        	$pago_envio = $envio-($envio*$desc_envio);
        	$porcent = $precio_publico * 26 /100;
        	$precio_final = ceil($precio_publico + $porcent + $pago_envio);
			$put = array(
				   "title" => $nombre_producto,
				   "category_id" => "MLM74484", //Bicicleta-Triciclo MLM38486-Scooter MLM74484-Accesorios pa bicicletas (chacar tipos en ml)
				   "price" => $precio_final,
				   "currency_id" => "MXN",
				   "available_quantity" => $inventario_producto,
				   "buying_mode" => "buy_it_now",
				   
				   "listing_type_id" => "gold_pro",
				   /*"description" => array(
				      "plain_text" => $descripcion_bike
				   ),*/
				   "sale_terms" => array(
				      array(
				         "id" => "WARRANTY_TYPE",
				         "value_name" => "Sin garantía"
				      )
				   ),
				   /*"pictures" => array(
				      array(
				         "source" => $i_uno,
				      ),
				      array(
				         "source" => $i_dos,
				      ),
				      array(
				      	 "source" => $i_tres
				      )
				   ),*/
				   	"accepts_mercadopago" => true,
	    			

				   "attributes" => array(
				      array(
				         "id" => "AGE_GROUP",
				         "value_name" => $edad_bike
				      ),
				      array(
				         "id" => "CHARACTER",
				         "value_name" => $personaje_bike
				      ),
				      array(
				         "id" => "SCOOTER_MATERIAL",
				         "value_name" => $material_bike
				      ),
				     array(
				      	"id" => "WHEELS_NUMBER",
				      	"value_name" => $ruedas
				      ),
				      array(
				         "id" => "BRAND",
				         "value_name" => $marca_bike
				      ),
				      array(
				      	"id" => "MODEL",
				      	"value_name" => $modelo_bike
				      ),
				      array(
				      	"id" => "REQUIRES_ASSEMBLY",
				      	"value_name" => $ensamblado
				      ),
				      array(
				      	"id" => "IS_FOLDABLE",
				      	"value_name" => $pegable_bike
				      ),
				      array(
				      	"id" => "SEX",
				      	"value_name" => $genero_bike
				      ),
				      array(
				      	"id" => "COLOR",
				      	"value_name" => $color_producto
				      )			           
				  ),		      
			);

        }
		

       // Sin modificar (ML)
		// echo $post;
		
		$put3 = json_encode($put);
        //var_dump($put3);
		$ch = curl_init("https://api.mercadolibre.com/items/$item_id/?access_token=$token");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_PUT, true);
        curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $put3);
        
		// execute!
		$respuesta = curl_exec($ch);
		var_dump($respuesta);

		// close the connection, release resources used
		curl_close($ch);
		 //echo $respuesta;

		// do anything you want with your response
		//var_dump($response);


		$item = json_decode($respuesta);
		//var_dump($item);
		$prod = (array)$item;
		//var_dump($prod);
		$ml_id = $prod['id'];
		//var_dump($ml_id);
		$ml_link = $prod['permalink'];
		// echo "<hr>";
		//var_dump( $ml_link);
		// echo "<br>";
		// echo $ml_link;
		// Sin modificar (ML)

/*
		if ($ml_id!=NULL) {
			$sql1 = "UPDATE `productos_bike` SET `ml_id`='".$ml_id."',`ml_link`='".$ml_link."' WHERE id_producto=".$id_producto;
                if(mysqli_query($conexion,$sql1)){
                    echo '<script language="javascript">';
                        echo 'alert("Subido con éxito a Mercado Libre");';
                        echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                        echo 'alert("Error al agregar ID y LINK de MercadoLibre");';
                        echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }
		}else{
			echo '<script language="javascript">';
                echo 'alert("Error al subir a Mercado Libre");';
                echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
            echo '</script>'
			;
		}

		*/
		

			
			
 ?>


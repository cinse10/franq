<?php 
    include ("credencialmm.php");
	include("../conexion.php");
     $id_producto = $_GET['id_producto'];

    $sql = "select * from productos WHERE id_producto=".$id_producto."";
    $requi = mysqli_query($conexion,$sql);
     
    while ($reg=mysqli_fetch_array($requi)) {
        
                $id_producto = $reg['id_producto'];
                $nombre_producto = $reg['nombre_producto'];
                $color_producto = $reg['color_producto'];
                $tipo_producto = $reg['tipo_producto'];
                $material_producto = $reg['material_producto'];
                $precio_producto = $reg['precio_afi_producto'];
               // $precio_producto = 	$precio_producto * 1.05;

                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['codigo_barras_producto'];
                
                   /*
                   switch($tipo_producto){
                        case 19405:
                            $productoIntima = "Colchas";
                            break;
                        case 19406:
                            $productoIntima = "Sabanas";
                            break;
                        case 19408:
                            $productoIntima = "Almohadas";
                            break;
                        case 19409:
                            $productoIntima = "Mantas decorativas";
                            break;
                        case 19410:
                            $productoIntima = "Edredon";
                            break;
                        case 19411:
                            $productoIntima = "Fundas para colchones";
                            break;
                        case 19427:
                            $productoIntima = "Alfombra";
                            break;
                        case 19431:
                            $productoIntima = "Cortinas";
                            break;
                        case 19414:
                            $productoIntima = "Manteles";
                            break;
                        case 19391:
                            $productoIntima = "Toallas";
                            break;
                        case 19392:
                            $productoIntima = "Batas de baño";
                            break;
                    }*/
                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];  

                $i_uno = "http://13.59.1.71/franq/production/intima/".$uno."";
				$i_dos = "http://13.59.1.71/franq/production/intima/".$dos."";
				$i_tres = "http://13.59.1.71/franq/production/intima/".$tres.""; 

                $descripcion = $reg['descripcion_producto'];
                //$descripcion = str_replace( '<br />',"\n",  $desc);
                //$descripcion = strip_tags($descripcion);
                $color = $reg['color_producto'];
                $var_producto = $reg['var_producto'];
                $material_producto = $reg['material_producto'];
                $altura = $reg['altura'];
                $anchura = $reg['anchura'];
                $longitud = $reg['longitud'];
                $peso = $reg['peso'];
            
            }
    $desc_envio = 0.0;


    switch ($tipo_producto) {
        case 19405:
            $categoria = "MLM1610";
        
            $envio = 159;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio)) + $porcent);
            $post = array(
                "title" => $nombre_producto,
                "category_id" => $categoria,
                "price" => $precio_final,
                "currency_id" => "MXN",
                "available_quantity" => $inventario_producto,
                
                "sale_terms" => array(
                    array(
                       "id" => "WARRANTY_TYPE",
                       "value_name" => "Sin garantía"
                    )
                 ),
                "buying_mode" => "buy_it_now",
                "listing_type_id" => "gold_pro",
                "condition" => "new",
                
                
                 "pictures" => array(
                    array(
                       "source" => $i_uno,
                    ),
                    array(
                       "source" => $i_dos,
                    ),
                    array(
                         "source" => $i_tres
                    )
                 ),
                 "accepts_mercadopago" => true,
                 "non_mercado_pago_payment_methods" => array(),
                 "attributes" => array(
                    array(
                        "id" => "BRAND",
                        "value_name" => 'intima'
                     ),
                    array(
                        "id" => "INCLUDES_CUSHION_COVERS",
                        "value_name" => 'No'
                     ),
                    array(
                        "id" => "IS_REVERSIBLE",
                        "value_name" => 'No'
                     ),
                    array(
                        "id" => "ITEM_CONDITION",
                        "value_name" => 'NUEVO'
                     ),
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                    array(
                        "id" => "QUILT_AND_COVERLET_SIZE",
                        "value_name" => $var_producto
                     ),
                     array(
                        "id"=> "GTIN",
                        "value_name"=> "000417264187"
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                    )
                    

                )
            );   
            break;
        case 19410:
         //Edredones 19410
         
         $categoria = "MLM7983";
         $envio = 185;
         $pago_envio = $envio-($envio*$desc_envio);
         $porcent = $precio_producto *20 /100;
         $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
         $post = array(
             "title" => $nombre_producto,
             "category_id" => $categoria,
             "price" => $precio_final,
             "currency_id" => "MXN",
             "available_quantity" => $inventario_producto,
             "condition" => "new",
             "listing_type_id" => "gold_pro",
             "sale_terms" => array(
                 array(
                    "id" => "WARRANTY_TYPE",
                    "value_name" => "Sin garantía"
                 )
              ),
             "buying_mode" => "buy_it_now",
             "pictures" => array(
                 array(
                    "source" => $i_uno,
                 ),
                 array(
                    "source" => $i_dos,
                 ),
                 array(
                      "source" => $i_tres
                 )
              ),
             "accepts_mercadopago" => true,
             "non_mercado_pago_payment_methods" => array(),
             "attributes" => array(
                 array(
                     "id" => "BRAND",
                     "value_name" => "Intima"
                 ),
                 array(
                     "id" => "COMFORTER_SIZE",
                     "value_name" => $var_producto
                 ),
                 array(
                     "id" => "EXTERNAL_MATERIALS",
                     "value_name" => $material_producto
                 ),
                 array(
                     "id" => "ITEM_CONDITION",
                     "value_name" => "NUEVO"
                 ),
                 array(
                     "id" => "LENGTH",
                     "value_name" => $longitud
                 ),
                 array(
                     "id" => "MODEL",
                     "value_name" => "intima"
                 ),
                 array(
                     "id" => "SHIPMENT_PACKING",
                     "value_name" => "Bolsa"
                 ),
                 array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                 array(
                     "id" => "WIDTH",
                     "value_name" => $anchura
                 )
 
             )
         );
        break;
        
        case 19406:
        //sabanas 19406
        $categoria = "MLM30059";
        $envio = 165;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "buying_mode" => "buy_it_now",
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            "accepts_mercadopago" => true,
			"non_mercado_pago_payment_methods" => array(),
            "atributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => 'Intima'
                 ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                 ),
                array(
                    "id" => "MAIN_MATERIAL",
                    "value_name" => $material_producto
                 ),
                array(
                    "id" => "SHEET_PRESENTATION",
                    "value_name" => $productoIntima
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "SHEET_SIZE",
                    "value_name" => $var_producto
                )

            ),
        );

            break;
       case 19408:
        //almohadas 19408
        $categoria = "MLM31529";
        $envio = 170;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil($precio_producto+ $pago_envio + $porcent);
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "buying_mode" => "buy_it_now",
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "FILLING_MATERIALS",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "LENGTH",
                    "value_name" => $longitud.'cm'
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "PILLOW_HEIGHT",
                    "value_name" => $altura.'cm'
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $tipo_producto
                )

            )
        );

            break;
        case 19409:
        //Mantas y cobertores 19409
        $categoria = "MLM159228";
        $envio = 185;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *25 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent) );
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "buying_mode" => "buy_it_now",
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => "intima"
                ),
                array(
                    "id" => "COMPOSITTION   ",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "LENGTH",
                    "value_name" => $longitud
                ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "WIDTH",
                    "value_name" => $anchura
                )

            )
        );

            break;
        case 19411:
             //Potectores de coclchon 19411
        $categoria = "MLM159222";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "buying_mode" => "buy_it_now",
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "HEIGHT",
                    "value_name" => $altura
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "LENGTH",
                    "value_name" => $longitud
                ),
                array(
                    "id" =>"MATERIALS",
                    "value_name" => $material_producto
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "WIDTH",
                    "value_name" => $anchura
                )

            )

        );
            break;
        
        case 19427:
             //Alfombras y tapetes 19427
        $categoria = "MLM145934";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "buying_mode" => "buy_it_now",
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
             "accepts_mercadopago" => true,
             "non_mercado_pago_payment_methods" => array(),
             "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "HEIGHT",
                    "value_name" => $altura
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "LENGTH",
                    "value_name" => $longitud
                ),
                array(
                    "id" =>"MATERIALS",
                    "value_name" => $material_producto
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "WIDTH",
                    "value_name" => $anchura
                )

            )

        ); 
            break;
        case 19431:
              //CORTINAS 19431
        $categoria = "MLM4771";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "buying_mode" => "buy_it_now",
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "HEIGHT",
                    "value_name" => $altura
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "WIDTH",
                    "value_name" => $anchura
                )

            )
        );   
            break;
        
        case 19414:
            //MANTELES 19414
        $categoria = "MLM167526";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "buying_mode" => "buy_it_now",
            "condition" => "new",
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
             
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "HEIGHT",
                    "value_name" => $altura
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "LENGTH",
                    "value_name" => $longitud
                ),
                array(
                    "id" =>"MATERIALS",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "WIDTH",
                    "value_name" => $anchura
                )

            )

        );  

            break;

        case 19391:
             //TOALLAS DE BAÑO 19391
        $categoria = "MLM193854";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent));
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
            "buying_mode" => "buy_it_now",
            "condition" => "new",
            "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "BATH_TOWEL_LENGTH",
                    "value_name" => $longitud
                ),
                array(
                    "id" =>"COMPOSITION",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "BATH_TOWEL_WIDTH",
                    "value_name" => $anchura
                )

            )
        );    
            break;
        
        case 19392:
             //Batas de baño 19392
        $categoria = "MLM168250";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent) );
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
             "buying_mode" => "buy_it_now",
             "condition" => "new",
             "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),

            )
        );    
            break;
        case 19178:
             //Cubre Salas
        $categoria = "MLM188292";
        $envio = 141;
        $pago_envio = $envio-($envio*$desc_envio);
        $porcent = $precio_producto *20 /100;
        $precio_final = ceil(($precio_producto+ $pago_envio + $porcent) );
        $post = array(
            "title" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "listing_type_id" => "gold_pro",
            "sale_terms" => array(
                array(
                   "id" => "WARRANTY_TYPE",
                   "value_name" => "Sin garantía"
                )
             ),
             "buying_mode" => "buy_it_now",
             "condition" => "new",
             "pictures" => array(
                array(
                   "source" => $i_uno,
                ),
                array(
                   "source" => $i_dos,
                ),
                array(
                     "source" => $i_tres
                )
             ),
            
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => "Intima"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id"=> "GTIN",
                    "value_name"=> "417264187"
                 ),
                array(
                    "id" => "SHIPMENT_PACKING",
                    "value_name" => "Bolsa"
                ),

            )
        );    
            break;


            
    }

    $post3 = json_encode($post);
    $ch = curl_init("https://api.mercadolibre.com/items?access_token=$token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);

    
    //var_dump($post3);
    // execute!
    $respuesta = curl_exec($ch);
    //var_dump($respuesta);

    // close the connection, release resources used
    curl_close($ch);
    // echo $respuesta;

    // do anything you want with your response
    //var_dump($response);


    $item = json_decode($respuesta);
    //print_r($item);
    $prod = (array)$item;
    //var_dump($prod);
    $gg = json_encode($prod['cause']);
    $datos = json_decode($gg);

    foreach($datos as $fila =>$v) {
        if($v->cause_id == 134){
            $guardada =  $v->message;
        }
    }
    
    $ml_id = $prod['id'];
    //var_dump($ml_id);
    $ml_link = $prod['permalink'];
    // echo "<hr>";
    //var_dump( $ml_link);
    // echo "<br>";
    //echo $ml_link;
    // Sin modificar (ML)
    //$error = json_encode($prod['cause'][1]->message);


   if ($ml_id!=NULL) {
        $sql1 = "UPDATE `productos` SET `ml_id`='".$ml_id."',`ml_link`='".$ml_link."' WHERE id_producto=".$id_producto;
            if(mysqli_query($conexion,$sql1)){
                echo '<script language="javascript">';
                    echo 'alert("Subido con éxito a Mercado Libre");';
                    echo 'window.location="../plus_pintima.php?id_producto='.$id_producto.'";';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                    echo 'alert("Error al agregar ID y LINK de MercadoLibre");';
                    echo 'window.location="../plus_pintima.php?id_producto='.$id_producto.'";';
                echo '</script>';
            }
    }else{
        //echo $guardada;
        echo '<script language="javascript">';
                    echo 'alert("Error al subir:   '.$guardada.' ");';
                    
                    echo 'window.location="../plus_pintima.php?id_producto='.$id_producto.'";';
                echo '</script>';
        
    }


?>
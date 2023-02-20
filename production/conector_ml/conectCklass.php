<?php 
    include ("credencialmm.php");
	include("../conexion.php");
     $id_producto = $_GET['id_producto'];

    $sql = "select * from productos_cklass WHERE id_producto=".$id_producto."";
    $requi = mysqli_query($conexion,$sql);
     
    while ($reg=mysqli_fetch_array($requi)) {
        
                $id_producto = $reg['id_producto'];
                $color_producto = $reg['color_producto'];
                $tipo_producto = $reg['tipo_producto'];
                $material_producto = $reg['material_producto'];
                $precio_producto = $reg['precio_producto'];
                $modelo = $reg['modelo_producto'];
                
                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['codigo_barras_producto'];
                
                
                   
                   switch($tipo_producto){
                        case 16549:
                            $prod = "Zapatos Mocasines Mujer";
                            break;
                        case 16548:
                            $prod = "Zapatos oxfords mujer";
                            break;
                        case 16547:
                            $prod = "Tenis casuales mujer";
                            break;
                        case 16546:
                            $prod = "Sandalias Mujer";
                            break;
                        case 16540:
                            $prod = "Tacones";
                            break;
                        case 16539:
                            $prod = "Plataformas";
                            break;
                        case 16533:
                            $prod = "Botas y botines mujer";
                            break;
                        case 16371:
                            $prod = "Tenis casuales hombre";
                            break;
                        case 16369:
                            $prod = "Zapatos oxford hombre";
                            break;
                        case 16364:
                            $prod = "Botas y botines hombre";
                            break;
                        case 16353:
                            $prod = "Sandalias hombre";
                            break;
                        case 14630:
                            $prod = "Zapatos niño";
                            break;
                        case 14628:
                            $prod = "Botas niño";
                            break;
                        case 14639:
                            $prod = "Tenis niño";
                            break;
                        case 14625:
                            $prod = "Sandalias niño";
                            break;
                        case 14528:
                            $prod = "Zapatos niña";
                            break;
                        case 14531:
                            $prod = "Tenis niña";
                            break;
                        case 14529:
                            $prod = "Sandalias niña";
                            break;
                    }
                    $marca = "Cklass";
                $nombre_producto = $prod." ".$marca." ".$color_producto." ".$modelo;
                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];  

                $i_uno = "http://3.15.38.22/franq/production/cklass/".$uno."";
				$i_dos = "http://3.15.38.22/franq/production/cklass/".$dos."";
				$i_tres = "http://3.15.38.22/franq/production/cklass/".$tres.""; 

                $descripcion = $reg['descripcion_producto'];
                $color = $reg['color_producto'];
                $var_producto = $reg['var_producto'];
                $material_producto = $reg['material_producto'];
                $altura = $reg['altura'];
                $anchura = $reg['anchura'];
                $longitud = $reg['longitud'];
                $peso = $reg['peso'];
            
            }
    $desc_envio = 0.40;

    if($tipo_producto=="16547") {
        //tenis mujer
        $categoria = "MLM6585";
        
        $envio = 155;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
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
            "description" => array(
                "plain_text" => $descripcion
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
                    "value_name" => $marca
                 ),
                array(
                    "id" => "EXTERIOR_MATERIALS",
                    "value_name" => $material_producto
                 ),
                 array(
                     "id" => "ITEM_CONDITION",
                     "value_name" => 'NUEVO'
                  ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                 ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" => "COLOR",
                    "value_name" => $color_producto
                ),
                array(
                    "id" => "INTERIOR_MATERIALS",
                    "value_name" => $material_producto
                 )
               
            )
        );   
        
        
   }elseif ($tipo_producto=="16371"){
        //tenis hombre
        $categoria = "MLM6585";
        
        $envio = 155;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
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
            "description" => array(
                "plain_text" => $descripcion
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
                    "value_name" => $marca
                 ),
                array(
                    "id" => "EXTERIOR_MATERIALS",
                    "value_name" => $material_producto
                 ),
                 array(
                     "id" => "ITEM_CONDITION",
                     "value_name" => 'NUEVO'
                  ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                 ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Hombre"
                ),
                array(
                    "id" => "COLOR",
                    "value_name" => $color_producto
                ),
                array(
                    "id" => "INTERIOR_MATERIALS",
                    "value_name" => $material_producto
                 )
               
            )
        );   

    }
    elseif($tipo_producto="16549" || $tipo_producto == "16548"){
        //mocasines y oxford mujer
        $categoria = "MLM192964";
        $envio = 155;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "buying_mode" => "buy_it_now",
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "description" => array(
                "plain_text" => $descripcion
             ),
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
                    "value_name" => $marca
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                )
            )
        );

    }
    elseif ($tipo_producto="16546"){
        //Sandalias mujer
        $categoria = "MLM192717";
        $envio = 155;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
            "category_id" => $categoria,
            "price" => $precio_final,
            "currency_id" => "MXN",
            "available_quantity" => $inventario_producto,
            "buying_mode" => "buy_it_now",
			"condition" => "new",
            "listing_type_id" => "gold_pro",
            "description" => array(
                "plain_text" => $descripcion
             ),
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
                    "value_name" => $marca
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                )
            )
        );

    }
    elseif ($tipo_producto="16540"){ 
        //Tacones
        $categoria = "MLM193324";
        $envio = 155;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
                    "value_name" => $marca
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                )
            )
        );
    }elseif ($tipo_producto="16539"){
        //Plataformas
        $categoria = "MLM192394";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
                    "value_name" => $marca
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" =>"MODEL",
                    "value_name" => $modelo
                )
            )

        );
    }
    elseif ($tipo_producto=="16533"){
        //Botas y botines mujer
        $categoria = "MLM192062";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
             "accepts_mercadopago" => true,
             "non_mercado_pago_payment_methods" => array(),
             "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "FOOTWEAR_TYPE",
                    "value_name" => $tipo_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Mujer"
                ),
                array(
                    "id" =>"MODEL",
                    "value_name" => $modelo
                )

            )

        ); 
    }
    elseif ($tipo_producto=="16369"){
        //Zapatos hombre
        $categoria = "MLM192964";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" =>"GENDEr",
                    "value_name" => "Hombre"
                )

            )
        );   
    }
    elseif ($tipo_producto=="16364"){
        //botas y botines hombre
        $categoria = "MLM192062";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
             "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "GENDER",
                    "value_name" => "Hombre"
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" =>"FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                )

            )

        );  
        
    }
    elseif ($tipo_producto=="16353"){
        //Sandalias hombre
        $categoria = "MLM192717";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $material_producto
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Hombre"
                )
            )
        );    
    }
    elseif ($tipo_producto=="14630"){
        //Zapatos niño
        $categoria = "MLM192964";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niños"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_TYPE",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14628"){
        //Botas niño
        $categoria = "MLM192062";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niños"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_TYPE",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14639"){
        //Tenis niño
        $categoria = "MLM6585";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niños"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "EXTERIOR_MATERIALS",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14625"){
        //Sandalias niño
        $categoria = "MLM192717";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niños"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14528"){
        //Zapatos niña
        $categoria = "MLM192964";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niñas"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14531"){
        //Tenis niña
        $categoria = "MLM6585";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niñas"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $tipo_producto
                )

            )
        );    
    }
    elseif ($tipo_producto=="14529"){
        //Tenis niña
        $categoria = "MLM192717";
        $envio = 131;
        $pago_envio = $envio-($envio*$desc_envio);
        $precio_final = ceil((($precio_producto+ $pago_envio) * 1.25)  + 50);
        $post = array(
            "tittle" => $nombre_producto,
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
            "descriptions" => array(
                "plain_text" => $descripcion
             ),
            "accepts_mercadopago" => true,
            "non_mercado_pago_payment_methods" => array(),
            "attributes" => array(
                array(
                    "id" => "BRAND",
                    "value_name" => $marca
                ),
                array(
                    "id" => "ITEM_CONDITION",
                    "value_name" => "NUEVO"
                ),
                array(
                    "id" =>"GENDER",
                    "value_name" => "Niñas"
                ),
                array(
                    "id" => "MODEL",
                    "value_name" => $modelo
                ),
                array(
                    "id" => "FOOTWEAR_MATERIAL",
                    "value_name" => $tipo_producto
                )

            )
        );    
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

 
	    if ($ml_id!=NULL) {
			$sql1 = "UPDATE `productos_cklass` SET `ml_id`='".$ml_id."',`ml_link`='".$ml_link."' WHERE id_producto=".$id_producto;
                if(mysqli_query($conexion,$sql1)){
                    echo '<script language="javascript">';
                        echo 'alert("Subido con éxito a Mercado Libre");';
                        echo 'window.location="../plus_cklass.php?id_producto='.$id_producto.'";';
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                        echo 'alert("Error al agregar ID y LINK de MercadoLibre");';
                        echo 'window.location="../plus_cklass.php?id_producto='.$id_producto.'";';
                    echo '</script>';
                }
		}else{
			echo '<script language="javascript">';
                echo 'alert("Error al subir a Mercado Libre");';
                echo 'window.location="../plus_cklass.php?id_producto='.$id_producto.'";';
            echo '</script>';
		}


?>
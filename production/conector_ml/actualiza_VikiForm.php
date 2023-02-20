

<?php 
include ("credencialmm.php");
include("../conexion.php");
 $id_producto = $_GET['id_producto'];

$sql = "select * from productos_vicky WHERE id_producto=".$id_producto."";
$requi = mysqli_query($conexion,$sql);
while ($reg=mysqli_fetch_array($requi)) {
    $id_producto = $reg['id_producto'];
        $item_id = $reg['ml_id'];
                $nombre_producto = $reg['nombre'];
                $color_producto = $reg['color_vf'];
                $tipo_producto = $reg['tipo_producto'];
                $modelo = $reg['modelo_vf'];
                $talla = $reg['talla_vf'];
                $material_producto = "Tela";
                $precio_producto = $reg['precio_afiliado'];
                

                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['codigo_barras_producto'];

                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];  

                $i_uno = "http://3.15.38.22/franq/production/intima/vicky".$uno."";
				$i_dos = "http://3.15.38.22/franq/production/intima/vicky".$dos."";
				$i_tres = "http://3.15.38.22/franq/production/intima/vicky".$tres.""; 

                $desc = $reg['descripcion_linio'];
                $descripcion = str_replace( '<br />',"\n",  $desc);
                $descripcion = strip_tags($descripcion);
                $color = $reg['color_vf'];
                //$var_producto = $reg['var_producto'];
                //$material_producto = $reg['material_producto'];
                $altura = $reg['altura'];
                $anchura = $reg['anchura'];
                $longitud = $reg['longitud'];
                $peso = $reg['peso'];
    }

    $desc_envio = 0.40;

    switch ($tipo_producto) {
        case 16628:
            //BRASIERE,SUJETADOR,BRALETE
            $categoria = "MLM194122";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))+ 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );  
            break;
        case 16605:
            //TOP
            $categoria = "MLM429576";
            $envio = 139;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto * 20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))+ 10);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );    
            break;
        case 16615:
            //BIKINI
            $categoria = "MLM194123";
            $envio = 139;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))+ 25);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );    
            
            

            break;
        case 16612 :
            //TANGA
            $categoria = "MLM194123";
            $envio = 149;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *25 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 50);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );    
            

            break;

        case 16613:
            //BOXER
            $categoria = "MLM194123";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent) ) + 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );
            break;
        case 17746:
            //LEGGIN
            $categoria = "MLM194183";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )

            );




            break;
        case 16701:
            //PANTALONES
            $categoria = "MLM194175";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );

            break;
        case 18335:
            //FAJA
            $categoria = "MLM194120";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );


            break;
        case 16552:
            //PIJAMA 
            $categoria = "MLM194132";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $porcent = $precio_producto *20 /100;
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent)) + 15);
            $post = array(
                "title" => $nombre_producto,
                "category_id" => $categoria,
                "price" => $precio_final,
                "currency_id" => "MXN",
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );

            break;
        
        case 17716:
            //TRAJE DE BAÑO
            $categoria = "MLM430284";
            $envio = 129;
            $pago_envio = $envio-($envio*$desc_envio);
            $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 15);
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
                        "value_name" => 'vicky form'
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
                        "value_name" => 'Mujer'
                    ),
                    
                    array(
                        "id" => "MATERIALS",
                        "value_name" => $material_producto
                     ),
                     array(
                         "id" => "COLOR",
                          "value_name" => $color_producto
                     ),
                     array(
                         "id" => "SIZE",
                         "value_name" => $talla 
                     ),
                    array(
                        "id" => "SHIPMENT_PACKING",
                        "value_name" => 'Bolsa'
                     )
                )
            );

            break;
        case 16739:
            //VESTIDOS MLM112156
            
                $categoria = "MLM112156";
                $envio = 129;
                $pago_envio = $envio-($envio*$desc_envio);
                $porcent = $precio_producto *20 /100;
                $precio_final = ceil((($precio_producto+ $pago_envio + $porcent)) + 15);
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
                            "value_name" => 'vicky form'
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
                            "value_name" => 'Mujer'
                        ),
                        
                        array(
                            "id" => "MATERIALS",
                            "value_name" => $material_producto
                         ),
                         array(
                             "id" => "COLOR",
                              "value_name" => $color_producto
                         ),
                         array(
                             "id" => "SIZE",
                             "value_name" => $talla 
                         ),
                        array(
                            "id" => "SHIPMENT_PACKING",
                            "value_name" => 'Bolsa'
                         )
                    )
                );
    
                break;
        case 16735:
            //BLUSAS 
                    $categoria = "MLM194159";
                    $envio = 129;
                    $pago_envio = $envio-($envio*$desc_envio);
                    $porcent = $precio_producto *20 /100;
                    $precio_final = ceil((($precio_producto+ $pago_envio + $porcent)) + 15);
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
                                "value_name" => 'vicky form'
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
                                "value_name" => 'Mujer'
                            ),
                            
                            array(
                                "id" => "MATERIALS",
                                "value_name" => $material_producto
                             ),
                             array(
                                 "id" => "COLOR",
                                  "value_name" => $color_producto
                             ),
                             array(
                                 "id" => "SIZE",
                                 "value_name" => $talla 
                             ),
                            array(
                                "id" => "SHIPMENT_PACKING",
                                "value_name" => 'Bolsa'
                             )
                        )
                    );
        
                    break;
        case 16606:
            //BABYDOLL MLM194136
            //tedyes MLM194121
                    $categoria = "MLM194136";
                    $envio = 129;
                    $pago_envio = $envio-($envio*$desc_envio);
                    $porcent = $precio_producto *20 /100;
                    $precio_final = ceil((($precio_producto+ $pago_envio + $porcent))  + 15);
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
                                "value_name" => 'vicky form'
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
                                "value_name" => 'Mujer'
                            ),
                             array(
                                 "id" => "COLOR",
                                  "value_name" => $color_producto
                             ),
                             array(
                                 "id" => "SIZE",
                                 "value_name" => $talla 
                             ),
                            array(
                                "id" => "SHIPMENT_PACKING",
                                "value_name" => 'Bolsa'
                             )
                        )
                    );
            break;
        case 16580:
            //MEDIAS
                    $categoria = "MLM194126";
                    $envio = 129;
                    $pago_envio = $envio-($envio*$desc_envio);
                    $porcent = $precio_producto *20 /100;
                    $precio_final = ceil((($precio_producto+ $pago_envio + $porcent)) + 15);
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
                                "value_name" => 'vicky form'
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
                                "value_name" => 'Mujer'
                            ),

                             array(
                                 "id" => "COLOR",
                                  "value_name" => $color_producto
                             ),
                             array(
                                 "id" => "SIZE",
                                 "value_name" => $talla 
                             ),
                            array(
                                "id" => "SHIPMENT_PACKING",
                                "value_name" => 'Bolsa'
                             )
                        )
                    );
            
                    break;
        
    }

    
    $post3 = json_encode($post);
    $ch = curl_init("https://api.mercadolibre.com/items/$item_id/?access_token=$token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);

    
    //var_dump($post3);
    // execute!
    $respuesta = curl_exec($ch);
   // var_dump($respuesta);

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

/*
    if ($ml_id!=NULL) {
        $sql1 = "UPDATE `productos_vicky` SET `ml_id`='".$ml_id."',`ml_link`='".$ml_link."' WHERE id_producto=".$id_producto;
            if(mysqli_query($conexion,$sql1)){
                echo '<script language="javascript">';
                    echo 'alert("Subido con éxito a Mercado Libre");';
                    echo 'window.location="../acciones_vicky.php?action=edita&id_producto='.$id_producto.'";';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                    echo 'alert("Error al agregar ID y LINK de MercadoLibre");';
                    echo 'window.location="../acciones_vicky.php?action=edita&id_producto='.$id_producto.'";';
                echo '</script>';
            }
    }else{
        echo '<script language="javascript">';
            echo 'alert("Error al subir a Mercado Libre");';
            echo 'window.location="../acciones_vicky.php?action=edita&id_producto='.$id_producto.'";';
        echo '</script>';
    }*/
    echo '<script language="javascript">';
                    echo 'alert("Actualizado con éxito en Mercado Libre");';
                    echo 'window.location="../acciones_vicky.php?action=edita&id_producto='.$id_producto.'";';
                echo '</script>';
?>                 
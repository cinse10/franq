<?php
    include("../conexion.php");
        $id_producto = $_GET['id_producto'];
            $sql = "select * from productos WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
                
                $id_producto = $reg['id_producto'];
                $nombre_producto = $reg['nombre_producto'];
                $precio_producto = $reg['precio_producto'];
                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['codigo_barras_producto'];
                $codigo_extra = $reg['codigo_extra'];
                $color_producto = $reg['color_producto'];
                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];
                $tipo_producto = $reg['tipo_producto'];
                if ($reg['var_producto'] == NULL) {
                    $var_producto = '';  
                }else{
                    $var_producto = $reg['var_producto'];  
                }
                                            
                $material_producto = $reg['material_producto'];
                $descripcion_linio = $reg['descripcion_linio'];
                $detalles_linio = $reg['detalles_linio'];
                $altura=$reg['altura'];
                $anchura=$reg['anchura'];
                $longitud=$reg['longitud'];
                $peso=$reg['peso'];                
                $cod_linio=$reg['cod_linio'];
            }

    $peso_vol = ($altura * $anchura *$longitud)/5000;
    
    if ($precio_producto > 499) {
        if ($peso_vol >= 0 && $peso_vol <= 5) {
            $costo_guia = 64;    
        }
        elseif ($peso_vol > 5 && $peso_vol <= 15) {
            $costo_guia = 93;
        }elseif ($peso_vol > 15 && $peso_vol <= 30) {
            $costo_guia = 160;
        }elseif ($peso_vol > 30 && $peso_vol <= 50) {
            $costo_guia = 349;
        }elseif ($peso_vol > 50 ) {
            $costo_guia = 649;
        }
    }else{
        if ($peso_vol >= 0 && $peso_vol <= 5) {
            $costo_guia = 69;
        }
        elseif ($peso_vol > 5 && $peso_vol <= 15) {
            $costo_guia = 129;
        }elseif ($peso_vol > 15 && $peso_vol <= 30) {
            $costo_guia = 239;
        }elseif ($peso_vol > 30 && $peso_vol <= 50) {
            $costo_guia = 349;
        }elseif ($peso_vol > 50 ) {
            $costo_guia = 649;
        }
    }

    switch ($tipo_producto) {
        case "19405":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;        
        case "19406":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19408":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19409":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19410":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19411":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19427":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.21);
            break;
        case "19431":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.21);
            break;
        case "19414":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.25);
            break;
        case "19391":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.21);
            break;
        case "19392":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.21);
            break;
        case "19178":
            $precio_linio = ceil(($precio_producto + $costo_guia) * 1.17);
            break;

    }
    
    $marca = "INTIMA";


    $accion = 'ProductCreate';
    $formato = 'JSON';
    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
                    <Request>
                      <Product>
                        <SellerSku>'.$cod_linio.'</SellerSku>
                        <ParentSku/>
                        <Status>active</Status>
                        <Name>'.$nombre_producto.'- INTIMA</Name>
                        <Variation>'.$color_producto.'</Variation>
                        <PrimaryCategory>'.$tipo_producto.'</PrimaryCategory>
                        <Description><![CDATA['.$descripcion_linio.']]></Description>
                        <Brand>'.$marca.'</Brand>
                        <Price>'.$precio_linio.'</Price>
                        <TaxClass>IVA 16%</TaxClass>
                        <ShipmentType></ShipmentType>
                        <ProductId>'.$cod_linio.'</ProductId>
                        <Quantity>'.$inventario_producto.'</Quantity>
                        <ProductData>
                            <MinOrderQuantity>1</MinOrderQuantity>
                            <ProductSize>'.$var_producto.'</ProductSize>
                            <MainMaterial>'.$material_producto.'</MainMaterial>
                            <ConditionType>Nuevo</ConditionType>
                            <SupplierWarrantyMonths>0</SupplierWarrantyMonths>
                            <ProductWarranty>Sin garantía por cuestión de higiene por ser prendas de cama.</ProductWarranty>
                            <PackageHeight>'.$altura.'</PackageHeight>
                            <PackageWidth>'.$anchura.'</PackageWidth>
                            <PackageLength>'.$longitud.'</PackageLength>
                            <PackageWeight>'.$peso.'</PackageWeight>
                            <PackageContent>Contiene: 1 '.$nombre_producto.'</PackageContent>
                            <ShortDescription><![CDATA['.$detalles_linio.']]></ShortDescription>
                            <Color>'.$color_producto.'</Color>
                            <ProductMeasures>'.$anchura.' x '.$altura.' x '.$longitud.'</ProductMeasures>
                            <FilterColor>'.$color_producto.'</FilterColor>
                        </ProductData>
		            
                      </Product>
                    </Request>
    ';
    //Contesta linio (apartir de aqui serian las modificaciones)
    
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
    
    if ($data) {
        
        $accion = 'GetProducts';
        $formato = 'JSON';
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
            $data2 = curl_exec($ch);
            // Close Curl connection
            

            //Contesta linio (apartir de aqui serian las modificaciones)
            $pos = strpos($data2, $cod_linio);
            //var_dump($pos);
           if ($pos === NULL) {
                echo '<script language="javascript">';
                    echo 'alert("Error al subir a Linio");';
                    echo 'window.location="../plus_pintima.php?action=edita&id_producto='.$id_producto.'";';
                echo '</script>';
            }else{
                $band=1;
                $sql1 = "UPDATE `productos` SET `sub_linio`='".$band."' WHERE id_producto=".$id_producto;
                
                if(mysqli_query($conexion,$sql1)){
                    echo '<script language="javascript">';
                        echo 'alert("Subido con éxito a Linio");';
                        echo 'window.location="../plus_pintima.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                        echo 'alert("Error al agregar bandera");';
                        echo 'window.location="../plus_pintima.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }
                
            }

    }




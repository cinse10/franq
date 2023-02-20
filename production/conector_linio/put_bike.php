<?php
    include("../conexion.php");
        $id_producto = $_GET['id_producto'];
            $sql = "select * from productos_bike WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
                
                $id_producto = $reg['id_producto'];
                $nombre_producto = $reg['nombre_producto'];
                $rodada_producto = "R".$reg['rodada_producto'];
                $color_producto = $reg['color_producto'];
                $precio_compra = $reg['precio_compra'];
                $precio_publico = $reg['precio_publico'];
                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['cod_barras_bike'];
                $co_generico = $reg['co_generico'];
                $tipo_bike = $reg['tipo_bike'];
                $modelo_bike = $reg['modelo_bike'];
                $marca_bike = $reg['marca_bike'];
                $material_bike = $reg['material_bike'];
                $edad_bike = $reg['edad_bike'];
                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];                
                $estilo_bike = $reg['estilo_bike'];
                $tipo_accesorio = $reg['tipo_accesorio'];
                $tipo_triciclo = $reg['tipo_triciclo'];
                $genero_bike = $reg['genero_bike'];
                $velocidades_bike = $reg['velocidades_bike'];
                $freno_delantero = $reg['freno_delantero'];
                $freno_trasero = $reg['freno_trasero'];             
                $montaje_bike = $reg['montaje_bike'];
                $personaje_bike = $reg['personaje_bike'];
                $ruedas = $reg['ruedas'];
                $descripcion_bike = $reg['descripcion_bike'];
                $detalles_bike = $reg['detalles_bike'];
                $altura=$reg['altura'];
                $anchura=$reg['anchura'];
                $longitud=$reg['longitud'];
                $peso=$reg['peso'];                
                $cod_linio=$reg['cod_linio'];
            }

    $peso_vol = ($altura * $anchura *$longitud)/5000;
    $precio_linio = $precio_publico * 1.16;

    if ($precio_publico > 499) {
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

    if ($tipo_bike == 0) {
        $categoria = 17317;
    }elseif ($tipo_bike == 1) {
        $categoria = 17293;
        $rodada_producto = '';
        $velocidades_bike = '';
    }elseif ($tipo_bike == 2) {
        $categoria = 17264;
        $rodada_producto = '';
        $velocidades_bike = '';
    }elseif ($tipo_bike == 3) {
        $categoria = 17200;
        $rodada_producto = '';
        $velocidades_bike = '';
    }

    $precio_linio = ceil(($precio_publico + $costo_guia)*1.20);

    $accion = 'ProductUpdate';
    $formato = 'JSON';
    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
                    <Request>
                      <Product>
                        <SellerSku>'.$cod_linio.'</SellerSku>
                        <ParentSku/>
                        <Status>active</Status>
                        <Name>'.$nombre_producto.'</Name>
                        <Variation>'.$color_producto.'</Variation>
                        <PrimaryCategory>'.$categoria.'</PrimaryCategory>
                        <Description><![CDATA['.$descripcion_bike.']]></Description>
                        <Brand>'.$marca_bike.'</Brand>
                        <Price>'.$precio_linio.'</Price>
                        <TaxClass>IVA 16%</TaxClass>
                        <ShipmentType></ShipmentType>
                        <ProductId>'.$cod_linio.'</ProductId>
                        <Quantity>'.$inventario_producto.'</Quantity>
                        <ProductData>
                            <Gender>'.$genero_bike.'</Gender>
                            <MainMaterial>'.$material_bike.'</MainMaterial>
                            <SportType>Ciclismo</SportType>
                            <ConditionType>Nuevo</ConditionType>
                            <SupplierWarrantyMonths>1</SupplierWarrantyMonths>
                            <ProductWarranty>Garantía de cuadro y de cualquier otro componente, excepto cámara y llanta</ProductWarranty>
                            <PackageHeight>'.$altura.'</PackageHeight>
                            <PackageWidth>'.$anchura.'</PackageWidth>
                            <PackageLength>'.$longitud.'</PackageLength>
                            <PackageWeight>'.$peso.'</PackageWeight>
                            <PackageContent>'.$nombre_producto.'</PackageContent>
                            <ShortDescription><![CDATA['.$detalles_bike.']]></ShortDescription>
                            <Color>'.$color_producto.'</Color>
                            <ProductMeasures>'.$anchura.' x '.$altura.' x '.$longitud.'</ProductMeasures>
                            <Speeds>'.$velocidades_bike.'</Speeds>
                            <WheelSize>'.$rodada_producto.'</WheelSize>
                            <BrakeType>'.$freno_trasero.'</BrakeType>
                            <FilterColor>'.$color_producto.'</FilterColor>
                        </ProductData>
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
            $pos = strpos($data2, $cod_linio);
            if ($pos === NULL) {
                echo '<script language="javascript">';
                    echo 'alert("Error al subir a Linio");';
                    echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                echo '</script>';
            }else{
                $band=1;
                $sql1 = "UPDATE `productos_bike` SET `sub_linio`='".$band."' WHERE id_producto=".$id_producto;
                if(mysqli_query($conexion,$sql1)){
                    echo '<script language="javascript">';
                        echo 'alert("Actualizado con éxito a Linio");';
                        echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }else{
                    echo '<script language="javascript">';
                        echo 'alert("Error al agregar bandera");';
                        echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                    echo '</script>';
                }
                
            }

    }




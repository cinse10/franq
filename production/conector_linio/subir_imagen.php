<?php
    include("../conexion.php");
        $id_producto = $_GET['id_producto'];
            $sql = "select * from productos_bike WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
                
                $id_producto = $reg['id_producto'];
                
                $uno = $reg['imagen_uno'];
                $dos = $reg['imagen_dos'];
                $tres = $reg['imagen_tres'];                
                              
                $cod_linio=$reg['cod_linio'];
            }

                    $accion = 'Image';
                    $formato = 'JSON';
                    $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
                                    <Request>
                                        <ProductImage>
                                            <SellerSku>'.$cod_linio.'</SellerSku>
                                            <Images>
                                                <Image>http://13.59.1.71/franq/production/bikes/'.$uno.'</Image>
                                                <Image>http://13.59.1.71/franq/production/bikes/'.$dos.'</Image>
                                                <Image>http://13.59.1.71/franq/production/bikes/'.$tres.'</Image>
                                            </Images>
                                        </ProductImage>
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
                        echo '<script language="javascript">';
                            echo 'alert("Operación Realizada, favor de verificar en Linio las imagenes");';
                            echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
                        echo '</script>';
                    }

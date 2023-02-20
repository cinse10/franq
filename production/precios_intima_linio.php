<?php
    include("conexion.php");
            $sql = "select * from productos WHERE sub_linio=1 ORDER BY `productos`.`cod_linio` ASC";
            $requi = mysqli_query($conexion,$sql);

                echo "<table>";
                echo "    <thead>";
                echo "        <tr>";
                echo "            <th>ID</th>";
                echo "            <th>Nombre producto</th>";
                echo "            <th>Cod. Linio</th>";
                echo "            <th>Existencia</th>";
                echo "            <th>Precio Linio</th>";
                echo "        </tr>";
                echo "    </thead>";
            while ($reg=mysqli_fetch_array($requi)) {
                
                $id_producto = $reg['id_producto'];
                $nombre_producto = $reg['nombre_producto'];
                $precio_producto = $reg['precio_producto'];
                $inventario_producto = $reg['inventario_producto'];
                $codigo_barras_producto = $reg['codigo_barras_producto'];
                $codigo_extra = $reg['codigo_extra'];
                $color_producto = $reg['color_producto'];
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

                }





                echo "    <tbody>";
                         echo "<tr>";
                            echo "<th>".$id_producto."</th>";
                            echo "<th>".$nombre_producto."</th>";
                            echo "<th>".$cod_linio."</th>";
                            echo "<th>".$inventario_producto."</th>";
                            echo "<th>$ ".$precio_linio."</th>";
                          echo "</tr>";
                           
                echo"    </tbody>";


                 $accion = 'ProductUpdate';
                            $formato = 'JSON';
                            $request_xml = '<?xml version="1.0" encoding="UTF-8" ?>
                                            <Request>
                                                <Product>
                                                    <SellerSku>'.$cod_linio.'</SellerSku>
                                                    <Price>'.$precio_linio.'</Price>
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
                echo"</table>";

    

?>


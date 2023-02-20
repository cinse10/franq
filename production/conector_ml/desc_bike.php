<?php 
    include ("credencialmm.php");
	include("../conexion.php");
    $id_producto = $_GET['id_producto'];
    //$id_producto = $_POST['id_producto'];

    $sql = "select * from productos_bike WHERE id_producto=".$id_producto."";
    $requi = mysqli_query($conexion,$sql);
     
    while ($reg=mysqli_fetch_array($requi)) {
        $id_producto = $reg['id_producto'];
        $item_id = $reg['ml_id'];
        
        //$descripcion = $reg ['descripcion_producto'];
        $descripcion_ln = $reg['descripcion_bike'];
        $detalles_ln = $reg['detalles_bike'];

         $descripcion = str_replace( '<br />',"\n",  $descripcion_ln.$detalles_ln);
        $descripcion = strip_tags($descripcion);
    }
    //$todo = $descripcion.$descripcion_ln.$detalles_ln;
        var_dump($todo);


        switch($tipo_bike){
            case 0:
                //BICI
                $categoria = "MLM62091";
                break;
            case 1:
                //ACCESORIOS
                switch ($tipo_accesorio) {
                    case 0:
                        $categoria = "MLM6143";
                        break;
                    case 1:
                        $categoria = "MLM191185";
                        break;
                    case 2:
                        $categoria = "MLM191176";
                        break;
                    
                    
                    default:
                        # code...
                        break;
                }
                
                break;
            case 2:
                //TRICICLO
                $categoria = "MLM38486";
                break;
            case 3:
                //ESCOTTER
                $categoria = "MLM74484";
                break;
            
        } 
    //$categoria = "MLM1610";
    //$item_id = $item_id1;
    //$item_id= 'MLM924796374';




    $post = array(
        //"id" => $item_id,
        //"title" => $nombre_producto,
        "category_id" => $categoria,
        "plain_text"=>$descripcion
    );

   // var_dump($post);
    $post3 = json_encode($post);
    //var_dump($post3);
    $ch = curl_init("https://api.mercadolibre.com/items/$item_id/description?access_token=$token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);
    //https://api.mercadolibre.com/items/$ITEM_ID/description
    //var_dump($ch);
    // execute!
     $respuesta = curl_exec($ch);
     //var_dump($respuesta);
 
     // close the connection, release resources used
     curl_close($ch);
     // echo $respuesta;
 
     // do anything you want with your response
     //var_dump($response);
     $item = json_decode($respuesta);
    //var_dump($item);
    $prod = (array)$item;
    //var_dump($prod);

    echo '<script language="javascript">';
            echo 'alert("Descripcion subida a Mercado Libre");';
            echo 'window.location="../acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
        echo '</script>';
?>
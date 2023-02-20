<?php 
    include ("credencialmm.php");
	include("../conexion.php");
    $id_producto = $_GET['id_producto'];

    $sql = "select * from productos_cklass WHERE id_producto=".$id_producto."";
    $requi = mysqli_query($conexion,$sql);
     
    while ($reg=mysqli_fetch_array($requi)) {
        $id_producto = $reg['id_producto'];
        $item_id = $reg['ml_id'];
        
        //$descripcion = $reg ['descripcion_producto'];
        $descripcion_ln = $reg['descripcion_linio'];
        $detalles_ln = $reg['detalles_linio'];

         $descripcion = str_replace( '<br />',"\n",  $detalles_ln);
        $descripcion = strip_tags($descripcion);
    }
    //$todo = $descripcion.$descripcion_ln.$detalles_ln;
        //var_dump($todo);


        switch($tipo_producto){
            case 16547:
                $categoria = "MLM6585";
                break;
            case 16371:
                $categoria = "MLM6585";
                break;
            case 16549 || 16548:
                $categoria = "MLM192964";
                break;
            case 16546:
                $categoria = "MLM192717";
                break;
            case 16540:
                $categoria = "MLM193324";
                break;
            case 16539:
                $categoria = "MLM192394";
                break;
            case 16533:
                $categoria = "MLM192062";
                break;
            case 16369:
                $categoria = "MLM192964";
                break;
            case 16353:
                $categoria = "MLM192717";
                break;
            case 14630:
                $categoria = "MLM192964";
                break;
            case 14628:
                $categoria = "MLM192062";
                break;
            case 14639:
                $categoria = "MLM6585";
                break;
            case 14625:
                $categoria = "MLM192717";
                break;
            case 14528:
                $categoria = "MLM192964";
                break;
            case 14531:
                $categoria = "MLM6585";
                break;
            case 14529:
                $categoria = "MLM192717";
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
            echo 'window.location="../plus_cklass.php?id_producto='.$id_producto.'";';
        echo '</script>';
?>
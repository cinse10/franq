<?php 
    include ("credencialmm.php");
	include("../conexion.php");
    $id_producto = $_GET['id_producto'];

    $sql = "select * from productos WHERE id_producto=".$id_producto."";
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
        var_dump($todo);


        switch($tipo_producto){
            case 19405:
                $categoria = "MLM1610";
                break;
            case 19406:
                $categoria = "MLM30059";
                break;
            case 19408:
                $categoria = "MLM31529";
                break;
            case 19409:
                $categoria = "MLM439259";
                break;
            case 19410:
                $categoria = "MLM7983";
                break;
            case 19411:
                $categoria = "MLM159222";
                break;
            case 19427:
                $categoria = "MLM145934";
                break;
            case 19431:
                $categoria = "MLM4771";
                break;
            case 19414:
                $categoria = "MLM167526";
                break;
            case 19391:
                $categoria = "MLM193854";
                break;
            case 19392:
                $categoria = "MLM168250";
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
            echo 'window.location="../plus_pintima.php?id_producto='.$id_producto.'";';
        echo '</script>';
?>
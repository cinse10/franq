<?php 
    include ("credencialmm.php");
	include("../conexion.php");
    $id_producto = $_GET['id_producto'];

    $sql = "select * from productos_vicky WHERE id_producto=".$id_producto."";
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
            case 16628:
                //BRASIERE,SUJETADOR,BRALETE
                $categoria = "MLM194122";
                break;
            case 16605:
                //TOPS
                $categoria = "MLM429576";
                break;
            case 16615:
                //BIKINI
                $categoria = "MLM194123";
                break;
            case 16612:
                //TANGA
                $categoria = "MLM194123";
                break;
            case 16613:
                //BOXER
                $categoria = "MLM194123";
                break;
            case 17746:
                //LEGGINGS
                $categoria = "MLM194183";
                break;
            case 16701:
                //PANTALONES
                $categoria = "MLM194175";
                break;
            case 18335:
                //FAJA
                $categoria = "MLM194120";
                break;
            case 16552:
                //PIJAMA
                $categoria = "MLM194132";
                break;
            case 17716:
                //TRAJE DE BAÑO
                $categoria = "MLM430284";
                break;
            case 16739:
                //VESTIDOS
                $categoria = "MLM112156";
                break;
            case 16735:
                //BLUSAS
                $categoria = "MLM194159";
                break;
            case 16580:
                //MEDIAS
                $categoria = "MLM194126";
                break;
            case 16606:
                //BABYDOLL Y TEDDIES
                $categoria = "MLM194136";
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
            echo 'window.location="../acciones_vicky.php?action=edita&id_producto='.$id_producto.'";';
        echo '</script>';
?>
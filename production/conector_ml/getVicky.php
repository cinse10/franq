<?php 
    include("credencial.php");
    $SELLER_ID = "1881466303470941";
    $NICKNAME = "MM5+MULTIMARCAS";

    $categoria = "MLM194122";
    $post = array(			   
        "available_quantity" => $disponible		   
     );
//$post3 = json_encode($post);
$ch = curl_init("https://api.mercadolibre.com/sites/MLM/search?nickname=$NICKNAME&category=$categoria?access_token=$token");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
 //curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);

 // execute!
 $respuesta = curl_exec($ch);

 // close the connection, release resources used
 curl_close($ch);

 // do anything you want with your response
 print_r($respuesta);

?>
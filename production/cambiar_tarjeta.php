<?php 
	include("conexion.php");
	$sql = "select * from socios";
    $requi = mysqli_query($conexion,$sql);
    while ($reg=mysqli_fetch_array($requi)) {
    	$id_acceso = $reg['id_acceso'];
    	$id_socio = $reg['id_socio'];

    	$id2_acceso = "000".$id_acceso;
    	
    	echo $sql2 = "update socios set id_acceso='".$id2_acceso."' where id_socio=".$id_socio;
    	mysqli_query($conexion,$sql2);
    	echo "<br>";
    }
 ?>
<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from productos_nice where id_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_nice = $producto['id_producto'];
			$cadena = "Nombre: ".$producto['nombre_producto']."\nModelo: ".$producto['modelo_producto']."\nCatálogo: ".$producto['catalogo_producto'];
			$kuerito = "INSERT INTO `base_nice`(`id_nice`) VALUES (".$id_nice.")";
			if(mysqli_query($conexion,$kuerito)){
				echo $cadena;
			}else{
				echo '0';
			}			
		}
	}
	else{
		echo '7';
	}
 ?>
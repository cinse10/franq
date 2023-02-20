<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from importados where codigo_barras_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_importados = $producto['id_importados'];
			$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nModelo: ".$producto['modelo_ck']."\nColor: ".$producto['color']."\nTalla: ".$producto['talla'];
			$kuerito = "INSERT INTO `base_importados`(`id_importados`) VALUES (".$id_importados.")";
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
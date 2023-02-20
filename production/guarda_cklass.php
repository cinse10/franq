<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from cklass where codigo_barras_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_cklass = $producto['id_cklass'];
			$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nModelo: ".$producto['modelo_ck']."\nColor: ".$producto['color_ck']."\nTalla: ".$producto['talla_ck'];
			$kuerito = "INSERT INTO `base_cklass`(`id_cklass`) VALUES (".$id_cklass.")";
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
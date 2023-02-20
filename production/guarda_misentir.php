<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];
	$cantidad = $_POST['cantidad'];

	$kuerin = "Select * from productos_misentir where id_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_misentir = $producto['id_producto'];
			$cadena = "Nombre: ".$producto['nombre_producto']."\nPrecio: ".$producto['precio_producto']."\nCod. Barras: ".$producto['codigo_barras_producto'];
			$kuerito = "INSERT INTO `base_misentir`(`id_misentir`,`cantidad`) VALUES (".$id_misentir.",".$cantidad.")";
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
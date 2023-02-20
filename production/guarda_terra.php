<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from terra where cod_barras='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_terra = $producto['id_terra'];
			$cadena = "Codigo: ".$producto['cod_barras']."\nMarca: ".$producto['marca']."\nColor: ".$producto['color']."\nTalla: ".$producto['talla_cod_barras'];
			$kuerito = "INSERT INTO `base_terra`(`id_terra`) VALUES (".$id_terra.")";
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
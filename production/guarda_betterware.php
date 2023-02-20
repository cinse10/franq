<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from productos_betterware where codigo_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_betterware = $producto['id_producto'];
			$cadena = "Codigo: ".$producto['codigo_producto']."\nNombre: ".$producto['nombre_producto'];
			$sqli = "Select * from base_betterware where id_betterware='".$id_betterware."'";
			$reng = mysqli_query($conexion,$sqli);
			$unm = mysqli_num_rows($reng);
			if ($unm==1) {
				while($produc = mysqli_fetch_array($reng)){
					$inventario = $produc['inventario_better']+1;					
					$kuerito = "UPDATE `base_betterware` SET `inventario_better`=".$inventario." WHERE id_betterware=".$id_betterware;
					if(mysqli_query($conexion,$kuerito)){
						echo $cadena;
					}else{
						echo '0';
					}	
				}
			} 
			else{
				$kuerito = "INSERT INTO `base_betterware`(`id_betterware`) VALUES (".$id_betterware.")";
				if(mysqli_query($conexion,$kuerito)){
					echo $cadena;
				}else{
					echo '0';
				}	
			}		
		}
	} 
	else{
		echo '7';
	}
 ?>


			
<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	if (isset($_POST['cod'])) {
		$kuerin = "Select * from productos_bike where cod_barras_bike='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_bike = $producto['id_producto'];
				$cadena = "Nombre: ".$producto['nombre_producto']."\nRodada: ".$producto['rodada_producto']."\nColor: ".$producto['color_producto'];
				$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
				if(mysqli_query($conexion,$kuerito)){
					echo $cadena;
				}else{
					echo '0';
				}			
			}
		}
		else{
			$sql = "INSERT INTO `productos_bike`(`inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`, `cod_barras_bike`) VALUES(0,0,0,'".$codigo."')";
			if(mysqli_query($conexion,$sql)){
				$id_bike = mysqli_insert_id($conexion);
				$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
				if(mysqli_query($conexion,$kuerito)){
					$mensaje = "El producto con código ".$codigo." se ha registrado con éxito";
					echo $mensaje;
				}else{
					echo '0';
				}			
				
			}else{
				echo '0';
			}
		}
		
	}else{
		$kuerin = "Select * from productos_bike where id_producto='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_bike = $producto['id_producto'];
				$cadena = "Nombre: ".$producto['nombre_producto']."\nRodada: ".$producto['rodada_producto']."\nColor: ".$producto['color_producto'];
				$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
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
	}
 ?>
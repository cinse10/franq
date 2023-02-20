<?php 
	include('conexion.php');
	$id = $_POST['Id'];
	if ($_POST['Caso']=="1") {

		$precio_unitario = $_POST['Compra'];

		if ($precio_unitario!=NULL) {
			$sql = "select * from porcentaje_bike WHERE id_porcentaje= 1";
			$requi = mysqli_query($conexion,$sql);
			while ($reg=mysqli_fetch_array($requi)) {
			    $id_porcentaje = $reg['id_porcentaje'];
			    $p_publico = $reg['p_publico'];
			    $p_publico_desc = $reg['p_publico_desc'];
			}

			if (strlen($p_publico)!=1) {
				$p_publico = "0.".$p_publico;
			}else{
				$p_publico = "0.0".$p_publico;
			}

			if (strlen($p_publico_desc)!=1) {
				$p_publico_desc = "0.".$p_publico_desc;
			}else{
				$p_publico_desc = "0.0".$p_publico_desc;
			}

			$precio_compra=round($precio_unitario*1.16);

			$precio_publico = round($precio_compra+($precio_compra*$p_publico));
			$precio_publico_desc = round($precio_compra+($precio_compra*$p_publico_desc));
			
		}else{
			$precio_publico = 0;
			$precio_publico_desc = 0;
			
		}


		$kueri = "UPDATE `productos_bike` SET `nombre_producto`= '".$_POST['Nombre']."',`rodada_producto`= '".$_POST['Rodada']."',`color_producto`= '".$_POST['Color']."',`precio_compra`= '".$_POST['Compra']."',`precio_publico`= '".$precio_publico."',`precio_publico_desc`= '".$precio_publico_desc."',`cod_barras_bike`= '".$_POST['Barras']."',`co_generico`= '".$_POST['Generico']."' WHERE id_producto=".$id;
		
		if (mysqli_query($conexion,$kueri)) {
			$mensaje = "El producto ".$_POST['Nombre'].", se ha modificado.";
			echo $mensaje;
		}else{
			echo 'Error al modificar producto';
		}
		
	}
 ?>



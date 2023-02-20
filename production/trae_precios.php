<?php 
	include ('conexion.php');
	$id = $_POST['id'];
	$precio_unitario = $_POST['precio_compra'];

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

		if ($id == 1) {
			$precio_publico = round($precio_compra+($precio_compra*$p_publico));
			echo $precio_publico;
			
		}elseif ($id == 2) {
			$precio_publico_desc = round($precio_compra+($precio_compra*$p_publico_desc));
			echo $precio_publico_desc;
		}
	}else{
		if ($id == 1) {
			$precio_publico = 0;
			echo $precio_publico;
			
		}elseif ($id == 2) {
			$precio_publico_desc = 0;
			echo $precio_publico_desc;
		}
	}

	
 ?>
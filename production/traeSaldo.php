<?php 
	include("conexion.php");
	$id_cliente = $_POST['id_cliente'];
	$marca = $_POST['marca'];
	if ($marca == 3) {
		$sql = "select * from socios where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 5) {
		$sql = "select * from socios_vicky where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 6) {
		$sql = "select * from socios_terra where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 7) {
		$sql = "select * from socios_cklass where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 11) {
		$sql = "select * from socios_dankriz where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 12) {
		$sql = "select * from socios_chiqui where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}
	if ($marca == 15) {
		$sql = "select * from socios_berlei where id_socio='".$id_cliente."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$saldo = $configuracion['saldo'];
		}
		echo $saldo;
	}

 ?>
<?php 
	include("conexion.php");
	$marca = $_GET['marca'];

	if ($marca == 3) {
		$delete="TRUNCATE TABLE `inventario_intima`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_intima.php";';
		echo '</script>';
	}
	if ($marca == 4) {
		$delete="TRUNCATE TABLE `inventario_vicky`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_vicky.php";';
		echo '</script>';
	}
	if ($marca == 5) {
		$delete="TRUNCATE TABLE `inventario_terra`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_terra.php";';
		echo '</script>';
		
	}
	if ($marca == 6) {
		$delete="TRUNCATE TABLE `inventario_cklass`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_cklass.php";';
		echo '</script>';
	}
	if ($marca == 7) {
		$delete="TRUNCATE TABLE `inventario_nice`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_nice.php";';
		echo '</script>';
	}
	if ($marca == 12) {
		$delete="TRUNCATE TABLE `inventario_chiqui`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Reset con Éxito.");';
			echo 'window.location="checa_inventario_chiqui.php";';
		echo '</script>';
	}

	
 ?>
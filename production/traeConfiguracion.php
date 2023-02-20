<?php 
	include("conexion.php");
	$id_configuracion = $_POST['id_configuracion'];
	if (isset($_POST['configuracion'])) {
		$sql = "select * from configuracion where id_configuracion='".$id_configuracion."'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$logo = $configuracion['logo'];
			$nombre = $configuracion['nombre'];
			$direccion = $configuracion['direccion'];
			$leyenda_inferior = $configuracion['leyenda_inferior'];
		}
		$config = $_POST['configuracion'];
		switch ($config) {
			case "direccion":
				echo $direccion;
			break;

			case "nombre":
				echo $nombre;
			break;

			case "logo":
				echo $logo;
			break;

			case "leyenda_inferior":
				echo $leyenda_inferior;
			break;
		}
	}
 ?>
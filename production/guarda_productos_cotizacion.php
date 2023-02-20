<?php 
	include("conexion.php");
	if (isset($_POST['id_cotizacion'])&&isset($_POST['cantidad'])&&isset($_POST['nombre_producto'])&&isset($_POST['costo_producto'])) {
		$id_cotizacion = $_POST['id_cotizacion'];
		$url = 1;
		$cantidad = $_POST['cantidad'];
		$nombre_producto = $_POST['nombre_producto'];
		$costo_producto = $_POST['costo_producto'];
		$sql = "INSERT INTO `prod_cotizacion`(`id_cotizacion`, `url_producto`, `cantidad_producto`, `nombre_producto`, `costo_producto`) VALUES (".$id_cotizacion.",'".$url."',".$cantidad.",'".$nombre_producto."',".$costo_producto.")";
		if (mysqli_query($conexion,$sql)) {
			echo 1;
		}else{
			echo '<script type="text/javascript">
                    console.log("Llegó vacío.");
                    alertify.error("No pude guardar en BD.");
                  </script>';
		}
	}else{
		echo '<script type="text/javascript">
                    console.log("Llegó vacío.");
                    alertify.error("Campos vacíos.");
                  </script>';
	}
 ?>
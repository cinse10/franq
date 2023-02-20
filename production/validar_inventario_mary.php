<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_marykay` INNER JOIN productos_marykay ON base_marykay.id_marykay = productos_marykay.id_producto";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $id_producto  = $producto['id_producto'];
	        $cod  = $producto['codigo_producto'];
	        $nombre_prod = $producto['nombre_producto'];
	        $precio_cat = $producto['precio_catalogo'];
	        $precio_com = $producto['precio_compra'];
	        $inv_producto = $producto['inventario_producto'];	        
	        $inv_mary = $producto['inventario_mary'];

	        $inv_final=$inv_producto+$inv_mary;
	        
	       
	        $sql = "UPDATE `productos_marykay` SET `inventario_producto`=".$inv_final.",`inventario_tmp_producto`=".$inv_final." WHERE id_producto =".$id_producto;
         	if(mysqli_query($conexion,$sql)){
				echo '<script type="text/javascript">
	            console.log("Listones.");
	           </script>';
			}	
	        
	    }
	   	$delete="TRUNCATE TABLE `base_marykay`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_mary.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_mary.php";';
		echo '</script>';
	}
 ?>

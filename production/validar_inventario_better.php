<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_betterware` INNER JOIN productos_betterware ON base_betterware.id_betterware = productos_betterware.id_producto";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $id_producto  = $producto['id_producto'];
	        $cod  = $producto['codigo_producto'];
	        $nombre_prod = $producto['nombre_producto'];
	        $precio_cat = $producto['precio_catalogo'];
	        $precio_com = $producto['precio_compra'];
	        $inv_producto = $producto['inventario_producto'];	        
	        $inv_better = $producto['inventario_better'];

	        $inv_final=$inv_producto+$inv_better;
	        
	       
	        $sql = "UPDATE `productos_betterware` SET `inventario_producto`=".$inv_final.",`inventario_tmp_producto`=".$inv_final." WHERE id_producto =".$id_producto;
         	if(mysqli_query($conexion,$sql)){
				echo '<script type="text/javascript">
	            console.log("Listones.");
	           </script>';
			}	
	        
	    }
	   	$delete="TRUNCATE TABLE `base_betterware`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_better.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_better.php";';
		echo '</script>';
	}
 ?>

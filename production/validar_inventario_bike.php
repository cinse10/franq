<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_bike` INNER JOIN productos_bike ON base_bike.id_bike = productos_bike.id_producto";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['id_producto'];
	        
	       
	        $kueri = "Select * from `productos_bike` where id_producto = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos_bike` SET `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual." WHERE id_producto =".$id_producto;
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones.");
			           </script>';
					}	
		      	}
			}
	    }
	   	$delete="TRUNCATE TABLE `base_bike`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_bike.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_bike.php";';
		echo '</script>';
	}
 ?>

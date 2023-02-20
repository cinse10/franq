<?php 
	include("conexion.php");

	$inicio ="2022-05-02";
	$fin = "2022-05-31";

	$up1 = "UPDATE compras_cklass SET `monto_mensual`='0',`tipo_desc`=1 "; 
	$up2 = "UPDATE compras_terra SET `monto_mensual`='0',`tipo_desc`=1  ";
	$up3 = "UPDATE compras_vicky SET `monto_mensual`='0',`tipo_desc`=1";
	mysqli_query($conexion,$up1);
	mysqli_query($conexion,$up2);
	mysqli_query($conexion,$up3);

	$sql1 = "select id_socio, nombre_socio, SUM( total_ticket) AS ventas from tickets_vicky INNER JOIN socios_vicky ON tickets_vicky.id_cliente=socios_vicky.id_socio where fecha_ticket between' ".$inicio." 00:00:00' AND '".$fin." 23:59:59' && (id_socio!=1 && id_socio!=2 && id_socio!=4 && id_socio!=102 && id_socio!=175) GROUP BY (socios_vicky.id_socio)";
	$requi1 = mysqli_query($conexion,$sql1);
	while ($reg1=mysqli_fetch_array($requi1)) {
		$id_socio = $reg1['id_socio'];
		$ventas = $reg1['ventas'];
		
		if ($ventas < 1299) {
			$tipo_desc = 1;
		} 
		elseif ($ventas >= 1299 && $ventas <= 2499 ) {
			$tipo_desc = 2;
		}
		elseif ($ventas >= 2500 ) {
			$tipo_desc = 3;
		}
	  
		$update1 = "UPDATE compras_vicky SET `monto_mensual`='".$ventas."',`tipo_desc`=".$tipo_desc." where id_socio=".$id_socio."";
		mysqli_query($conexion,$update1);
	  }

	$sql2 = "select id_socio, nombre_socio, SUM(transacciones_cklass.precio_venta) AS ventas from tickets_cklass INNER JOIN socios_cklass ON tickets_cklass.id_cliente=socios_cklass.id_socio INNER JOIN transacciones_cklass ON tickets_cklass.id_ticket=transacciones_cklass.id_ticket INNER JOIN productos_cklass ON transacciones_cklass.id_producto = productos_cklass.id_producto where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' and catalogo_producto != 'Multimarcas' && (id_socio!=1 && id_socio!=2 && id_socio!=3 && id_socio!=21 && id_socio!=24  && id_socio!=31  && id_socio!=68  && id_socio!=79)   GROUP BY socios_cklass.id_socio";
	$requi2 = mysqli_query($conexion,$sql2);
	while ($reg2=mysqli_fetch_array($requi2)) {
		$id_socio = $reg2['id_socio'];
		$ventas = $reg2['ventas'];
		if ($ventas >= 0 && $ventas <= 600 ) {
			$tipo_desc = 1;
		}
		elseif ($ventas > 600 && $ventas <= 1200 ) {
			$tipo_desc = 2;
		}
		elseif ($ventas > 1200 && $ventas <= 2400 ) {
			$tipo_desc = 3;
		}
		elseif ($ventas > 2400 && $ventas <= 5500 ) {
			$tipo_desc = 4;
		}
		elseif ($ventas > 5500 && $ventas <= 11000 ) {
			$tipo_desc = 5;
		}
		elseif ($ventas > 11000 && $ventas <= 16000 ) {
			$tipo_desc = 6;
		}
		elseif ($ventas > 16000 && $ventas <= 40000 ) {
			$tipo_desc = 7;
		}
		elseif ($ventas > 40000) {
			$tipo_desc = 8;
		}
	  $update2 = "UPDATE compras_cklass SET `monto_mensual`='".$ventas."',`tipo_desc`=".$tipo_desc." where id_socio= ".$id_socio."" ;
	  mysqli_query($conexion,$update2);
	  
	  }


	$sql3 = "select id_socio, nombre_socio, SUM(transacciones_terra.precio_venta) AS ventas from tickets_terra INNER JOIN socios_terra ON tickets_terra.id_cliente=socios_terra.id_socio INNER JOIN transacciones_terra ON tickets_terra.id_ticket=transacciones_terra.id_ticket INNER JOIN productos_terra ON transacciones_terra.id_producto = productos_terra.id_producto where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' and marca_producto = 'MUNDO TERRA' && (id_socio!=1 && id_socio!=2 && id_socio!=3 && id_socio!=30 && id_socio!=36  && id_socio!=67 )   GROUP BY socios_terra.id_socio";
	$requi3 = mysqli_query($conexion,$sql3);
	while ($reg3=mysqli_fetch_array($requi3)) {
		$id_socio = $reg3['id_socio'];
		$ventas = $reg3['ventas'];
		if ($ventas == 0) {
			$tipo_desc = 1;
		} 
		if ($ventas >= 1 && $ventas <= 1000 ) {
			$tipo_desc = 2;
		}
		elseif ($ventas >= 1001 && $ventas <= 2200 ) {
			$tipo_desc = 3;
		}
		elseif ($ventas >= 2201 && $ventas <= 5200 ) {
			$tipo_desc = 4;
		}
		elseif ($ventas >= 5201 && $ventas <= 10800 ) {
			$tipo_desc = 5;
		}
	  $update3 = "UPDATE compras_terra SET `monto_mensual`='".$ventas."',`tipo_desc`=".$tipo_desc." where id_socio=".$id_socio."";
	  mysqli_query($conexion,$update3);
	  }
 ?>
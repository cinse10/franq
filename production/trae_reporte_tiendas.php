<?php 
	include("conexion_crm.php");
	include("conexion.php");
	if (isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])) {
		if (!isset($_POST['ticket'])) {
				echo '<table id="tabla_reporte2" class="table table-striped table-bordered">
	                            <thead>
	                              <tr>
	                                <th>Marca</th>
	                                <th></th>
	                                <th>Total</th>
	                              </tr>
	                            </thead>                            
	                            <tbody>';
				
			}
		$date_inicio = date_create($_POST['fecha_inicio']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha_fin']);
		$fin = date_format($date_fin, 'Y-m-d');
				
					
		$sql1 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_misentir INNER JOIN empleados ON tickets_misentir.id_empledo=empleados.id_empleado INNER JOIN socios ON tickets_misentir.id_cliente=socios.id_socio INNER JOIN marcas ON tickets_misentir.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!=137 UNION ALL SELECT apartado_misentir.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca  FROM apartado_misentir INNER JOIN abonos_misentir ON apartado_misentir.id_ticket = abonos_misentir.id_ticket INNER JOIN empleados ON apartado_misentir.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_misentir.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'"; 
	
		
		$sql2 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets INNER JOIN empleados ON tickets.id_empledo=empleados.id_empleado INNER JOIN socios ON tickets.id_cliente=socios.id_socio INNER JOIN marcas ON tickets.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!=137 UNION ALL SELECT apartado_bike.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_bike INNER JOIN abonos_bike ON apartado_bike.id_ticket = abonos_bike.id_ticket INNER JOIN empleados ON apartado_bike.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_bike.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
	
		
		$sql3 = "select  id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_intima INNER JOIN empleados ON tickets_intima.id_empledo=empleados.id_empleado INNER JOIN socios ON tickets_intima.id_cliente=socios.id_socio INNER JOIN marcas ON tickets_intima.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!=137 UNION ALL select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio,  nombre_marca from tickets_intima_bf INNER JOIN empleados ON tickets_intima_bf.id_empledo=empleados.id_empleado INNER JOIN socios ON tickets_intima_bf.id_cliente=socios.id_socio INNER JOIN marcas ON tickets_intima_bf.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!=137 UNION ALL SELECT apartado_intima.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_intima INNER JOIN abonos_intima ON apartado_intima.id_ticket = abonos_intima.id_ticket INNER JOIN empleados ON apartado_intima.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_intima.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' ";
	
		
		$sql4 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_vicky INNER JOIN empleados ON tickets_vicky.id_empledo=empleados.id_empleado INNER JOIN socios_vicky ON tickets_vicky.id_cliente=socios_vicky.id_socio INNER JOIN marcas ON tickets_vicky.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2  UNION ALL select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_desc_vicky INNER JOIN empleados ON tickets_desc_vicky.id_empledo=empleados.id_empleado INNER JOIN socios_vicky ON tickets_desc_vicky.id_cliente=socios_vicky.id_socio INNER JOIN marcas ON tickets_desc_vicky.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2  UNION ALL SELECT apartado_vicky.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_vicky INNER JOIN abonos_vicky ON apartado_vicky.id_ticket = abonos_vicky.id_ticket INNER JOIN empleados ON apartado_vicky.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_vicky.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' ";
	
		
		$sql5 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_terra INNER JOIN empleados ON tickets_terra.id_empledo=empleados.id_empleado INNER JOIN socios_terra ON tickets_terra.id_cliente=socios_terra.id_socio INNER JOIN marcas ON tickets_terra.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2 UNION ALL select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_terra_desc INNER JOIN empleados ON tickets_terra_desc.id_empledo=empleados.id_empleado INNER JOIN socios_terra ON tickets_terra_desc.id_cliente=socios_terra.id_socio INNER JOIN marcas ON tickets_terra_desc.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2 UNION ALL SELECT apartado_terra.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_terra INNER JOIN abonos_terra ON apartado_terra.id_ticket = abonos_terra.id_ticket INNER JOIN empleados ON apartado_terra.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_terra.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' ";
	
		
		$sql6 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_cklass INNER JOIN empleados ON tickets_cklass.id_empledo=empleados.id_empleado INNER JOIN socios_cklass ON tickets_cklass.id_cliente=socios_cklass.id_socio INNER JOIN marcas ON tickets_cklass.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2  UNION ALL select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_cklass_promo INNER JOIN empleados ON tickets_cklass_promo.id_empledo=empleados.id_empleado INNER JOIN socios_cklass ON tickets_cklass_promo.id_cliente=socios_cklass.id_socio INNER JOIN marcas ON tickets_cklass_promo.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2  UNION ALL select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_cklass_op INNER JOIN empleados ON tickets_cklass_op.id_empledo=empleados.id_empleado INNER JOIN socios_cklass ON tickets_cklass_op.id_cliente=socios_cklass.id_socio INNER JOIN marcas ON tickets_cklass_op.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2 UNION ALL SELECT apartado_cklass.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_cklass INNER JOIN abonos_cklass ON apartado_cklass.id_ticket = abonos_cklass.id_ticket INNER JOIN empleados ON apartado_cklass.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_cklass.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' ";
	
		
		$sql7 = "select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets_nice INNER JOIN empleados ON tickets_nice.id_empledo=empleados.id_empleado INNER JOIN socios_nice ON tickets_nice.id_cliente=socios_nice.id_socio INNER JOIN marcas ON tickets_nice.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2 UNION ALL SELECT apartado_nice.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_nice INNER JOIN abonos_nice ON apartado_nice.id_ticket = abonos_nice.id_ticket INNER JOIN empleados ON apartado_nice.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_nice.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
	
		
		$sql8 = "select * from tickets_marykay INNER JOIN empleados ON tickets_marykay.id_empledo=empleados.id_empleado INNER JOIN socios_mk ON tickets_marykay.id_cliente=socios_mk.id_socio INNER JOIN marcas ON tickets_marykay.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2";
	
		
		$sql9 = "select * from tickets_betterware INNER JOIN empleados ON tickets_betterware.id_empledo=empleados.id_empleado INNER JOIN socios_better ON tickets_betterware.id_cliente=socios_better.id_socio INNER JOIN marcas ON tickets_betterware.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'  &&  id_socio!=2";


		$sql10 = "select * from tickets_chiqui INNER JOIN empleados ON tickets_chiqui.id_empledo=empleados.id_empleado INNER JOIN socios_chiqui ON tickets_chiqui.id_cliente=socios_chiqui.id_socio INNER JOIN marcas ON tickets_chiqui.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";


		$sql11 = "select * from tickets_dankriz INNER JOIN empleados ON tickets_dankriz.id_empledo=empleados.id_empleado INNER JOIN socios_dankriz ON tickets_dankriz.id_cliente=socios_dankriz.id_socio INNER JOIN marcas ON tickets_dankriz.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!= 64 UNION ALL select * from tickets_importados INNER JOIN empleados ON tickets_importados.id_empledo=empleados.id_empleado INNER JOIN socios_dankriz ON tickets_importados.id_cliente=socios_dankriz.id_socio INNER JOIN marcas ON tickets_importados.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";


		$sql12 = "select * from tickets_cubrebocas INNER JOIN empleados ON tickets_cubrebocas.id_empledo=empleados.id_empleado INNER JOIN socios_vicky ON tickets_cubrebocas.id_cliente=socios_vicky.id_socio INNER JOIN marcas ON tickets_cubrebocas.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
			
		$sql13 = "select * from tickets_berlei INNER JOIN empleados ON tickets_berlei.id_empledo=empleados.id_empleado INNER JOIN socios_berlei ON tickets_berlei.id_cliente=socios_berlei.id_socio INNER JOIN marcas ON tickets_berlei.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
		
		$resp1 = mysqli_query($conexion,$sql1);
		$num1 = mysqli_num_rows($resp1);
		if ($num1==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Mi Sentir</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma1=0;
			$sumaEfe1=0;
			$sumaTDD1=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp1)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD1=$sumaTDD1+$forma_pago;
						$sobra1=$total_ticket-$forma_pago;
						$sumaEfe1=$sumaEfe1+$sobra1;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD1=$sumaTDD1+$total_ticket;
					}
				}else{
					$sumaEfe1=$sumaEfe1+$total_ticket;
				}
				$suma1+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Mi Sentir</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma1,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe1,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD1,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp2 = mysqli_query($conexion,$sql2);
		$num2 = mysqli_num_rows($resp2);
		if ($num2==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Bike Store</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma2=0;
			$sumaEfe2=0;
			$sumaTDD2=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp2)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD2=$sumaTDD2+$forma_pago;
						$sobra2=$total_ticket-$forma_pago;
						$sumaEfe2=$sumaEfe2+$sobra2;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD2=$sumaTDD2+$total_ticket;
					}
					
				}else{
					$sumaEfe2=$sumaEfe2+$total_ticket;
				}
				$suma2+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Bike Store</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma2,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe2,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD2,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp3 = mysqli_query($conexion,$sql3);
		$num3 = mysqli_num_rows($resp3);
		if ($num3==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Intima Hogar</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma3=0;
			$sumaEfe3=0;
			$sumaTDD3=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp3)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD3=$sumaTDD3+$forma_pago;
						$sobra3=$total_ticket-$forma_pago;
						$sumaEfe3=$sumaEfe3+$sobra3;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD3=$sumaTDD3+$total_ticket;
					}
				}else{
					$sumaEfe3=$sumaEfe3+$total_ticket;
				}
				$suma3+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Intima Hogar</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma3,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe3,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD3,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp4 = mysqli_query($conexion,$sql4);
		$num4 = mysqli_num_rows($resp4);
		if ($num4==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Vicky Form</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma4=0;
			$sumaEfe4=0;
			$sumaTDD4=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp4)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD4=$sumaTDD4+$forma_pago;
						$sobra4=$total_ticket-$forma_pago;
						$sumaEfe4=$sumaEfe4+$sobra4;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD4=$sumaTDD4+$total_ticket;
					}
				}else{
					$sumaEfe4=$sumaEfe4+$total_ticket;
				}
				$suma4+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Vicky Form</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma4,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe4,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD4,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp5 = mysqli_query($conexion,$sql5);
		$num5 = mysqli_num_rows($resp5);
		if ($num5==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Mundo Terra</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma5=0;
			$sumaEfe5=0;
			$sumaTDD5=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp5)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD5=$sumaTDD5+$forma_pago;
						$sobra5=$total_ticket-$forma_pago;
						$sumaEfe5=$sumaEfe5+$sobra5;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD5=$sumaTDD5+$total_ticket;
					}
				}else{
					$sumaEfe5=$sumaEfe5+$total_ticket;
				}
				$suma5+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Mundo Terra</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma5,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe5,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD5,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp6 = mysqli_query($conexion,$sql6);
		$num6 = mysqli_num_rows($resp6);
		if ($num6==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Cklass</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma6=0;
			$sumaEfe6=0;
			$sumaTDD6=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp6)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD6=$sumaTDD6+$forma_pago;
						$sobra6=$total_ticket-$forma_pago;
						$sumaEfe6=$sumaEfe6+$sobra6;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD6=$sumaTDD6+$total_ticket;
					}
				}else{
					$sumaEfe6=$sumaEfe6+$total_ticket;
				}
				$suma6+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Cklass</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma6,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe6,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD6,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp7 = mysqli_query($conexion,$sql7);
		$num7 = mysqli_num_rows($resp7);
		if ($num7==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Nice</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma7=0;
			$sumaEfe7=0;
			$sumaTDD7=0;
			 
                            
			while ($reporte = mysqli_fetch_array($resp7)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD7=$sumaTDD7+$forma_pago;
						$sobra7=$total_ticket-$forma_pago;
						$sumaEfe7=$sumaEfe7+$sobra7;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD7=$sumaTDD7+$total_ticket;
					}
				}else{
					$sumaEfe7=$sumaEfe7+$total_ticket;
				}
				$suma7+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Nice</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma7,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe7,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD7,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp8 = mysqli_query($conexion,$sql8);
		$num8 = mysqli_num_rows($resp8);
		if ($num8==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>Mary Kay</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma8=0;
			$sumaEfe8=0;
			$sumaTDD8=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp8)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD8=$sumaTDD8+$forma_pago;
						$sobra8=$total_ticket-$forma_pago;
						$sumaEfe8=$sumaEfe8+$sobra8;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD8=$sumaTDD8+$total_ticket;
					}
				}else{
					$sumaEfe8=$sumaEfe8+$total_ticket;
				}
				$suma8+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Mary Kay</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma8,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe8,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD8,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp9 = mysqli_query($conexion,$sql9);
		$num9 = mysqli_num_rows($resp9);
		if ($num9==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma9=0;
			$sumaEfe9=0;
			$sumaTDD9=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp9)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD9=$sumaTDD9+$forma_pago;
						$sobra9=$total_ticket-$forma_pago;
						$sumaEfe9=$sumaEfe9+$sobra9;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD9=$sumaTDD9+$total_ticket;
					}
				}else{
					$sumaEfe9=$sumaEfe9+$total_ticket;
				}
				$suma9+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma9,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe9,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD9,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
			
		}
		$resp10 = mysqli_query($conexion,$sql10);
		$num10 = mysqli_num_rows($resp10);
		if ($num10==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma10=0;
			$sumaEfe10=0;
			$sumaTDD10=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp10)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD10=$sumaTDD10+$forma_pago;
						$sobra10=$total_ticket-$forma_pago;
						$sumaEfe10=$sumaEfe10+$sobra10;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD10=$sumaTDD10+$total_ticket;
					}
				}else{
					$sumaEfe10=$sumaEfe10+$total_ticket;
				}
				$suma10+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Chiqui Mundo</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma10,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe10,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD10,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		$resp11 = mysqli_query($conexion,$sql11);
		$num11 = mysqli_num_rows($resp11);
		if ($num11==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma11=0;
			$sumaEfe11=0;
			$sumaTDD11=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp11)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD11=$sumaTDD11+$forma_pago;
						$sobra11=$total_ticket-$forma_pago;
						$sumaEfe11=$sumaEfe11+$sobra11;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD11=$sumaTDD11+$total_ticket;
					}
				}else{
					$sumaEfe11=$sumaEfe11+$total_ticket;
				}
				$suma11+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Dankriz Shoes</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma11,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe11,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD11,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}
		//CUBREBOCAS
		$resp12 = mysqli_query($conexion,$sql12);
		$num12 = mysqli_num_rows($resp12);
		if ($num12==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}
		else{
			$cont=0;
			$suma12=0;
			$sumaEfe12=0;
			$sumaTDD12=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp12)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD11=$sumaTDD11+$forma_pago;
						$sobra11=$total_ticket-$forma_pago;
						$sumaEfe11=$sumaEfe11+$sobra11;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD12=$sumaTDD12+$total_ticket;
					}
				}else{
					$sumaEfe12=$sumaEfe12+$total_ticket;
				}
				$suma12+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Cubrebocas</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma12,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe12,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD12,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}
		$resp13 = mysqli_query($conexion,$sql13);
		$num13 = mysqli_num_rows($resp13);
		if ($num13==0) {
			// echo "<tr><th style='font-weight: bold; font-size:20px;'>BetterWare</th><th></th><th></th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";
			// echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ 0</th></tr>";	
			// echo "<tr><th></th><th></th><th></th></tr>";	
		}else{
			$cont=0;
			$suma13=0;
			$sumaEfe13=0;
			$sumaTDD13=0;
			
                            
			while ($reporte = mysqli_fetch_array($resp13)) {
				$cont++;
				$total_ticket = $reporte['total_ticket'];

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					if ($total_ticket>$forma_pago) {
						$sumaTDD13=$sumaTDD13+$forma_pago;
						$sobra13=$total_ticket-$forma_pago;
						$sumaEfe13=$sumaEfe13+$sobra13;
						$forma_pago="FRACCIONADO";
					}else{
						$forma_pago="TARJETA";
						$sumaTDD13=$sumaTDD13+$total_ticket;
					}
				}else{
					$sumaEfe13=$sumaEfe13+$total_ticket;
				}
				$suma13+=$total_ticket;
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th style='font-weight: bold; font-size:20px;'>Berlei</th><th></th><th></th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($suma13,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfe13,2)."</th></tr>";
				echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDD13,2)."</th></tr>";
				echo "<tr><th></th><th></th><th></th></tr>";	
				
			}
		}

		
	}
	//MT4

		$sumaTotal = $suma1 + $suma2 + $suma3 + $suma4 + $suma5 + $suma6 + $suma7 + $suma8 + $suma9 + $suma10 + $suma11 + $suma12 + $suma13;
		$sumaEfeTotal = $sumaEfe1 + $sumaEfe2 + $sumaEfe3 + $sumaEfe4 + $sumaEfe5 + $sumaEfe6 + $sumaEfe7 + $sumaEfe8 + $sumaEfe9 + $sumaEfe10 + $sumaEfe11 + $sumaEfe12 + $sumaEfe13;
		$sumaTDDTotal = $sumaTDD1 + $sumaTDD2 + $sumaTDD3 + $sumaTDD4 + $sumaTDD5 + $sumaTDD6 + $sumaTDD7 + $sumaTDD8 + $sumaTDD9 + $sumaTDD10 + $sumaTDD11 + $sumaTDD12 + $sumaTDD13;
		echo "<tr><th style='font-weight: bold; font-size:20px;'>Total Ventas</th><th></th><th></th></tr>";
		echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTotal,2)."</th></tr>";
		echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaEfeTotal,2)."</th></tr>";
		echo "<tr><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($sumaTDDTotal,2)."</th></tr>";
		echo "<tr><th></th><th></th><th></th></tr>";
		echo '</tbody></table>';


	
    
	




	//función que regresa una fecha, ejemplo Lunes 10 de Marzo del 2019
	function dameFechaCorta($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 	//Salida: Vie 24 de Feb del 2012
		return $dias[date_format($date, 'w')].", ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y') ;
  	
  	}
	//función que regresa una fecha, ejemplo 10/Mar/2019
  	function dameIntervaloFecha($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
	 	//Salida: Vie 24 de Feb del 2012
		return date_format($date, 'd')."/".$meses[date_format($date, 'n')-1]. "/".date_format($date, 'Y') ;
  	
  	}

 ?>
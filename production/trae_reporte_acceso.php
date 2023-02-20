<?php 
	include("conexion.php");
	if (isset($_POST['fecha']) && !isset($_POST['action'])) {

		$date_inicio = date_create($_POST['fecha']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha']);
		$fin = date_format($date_fin, 'Y-m-d');

		$sql = "select * from acceso_socio INNER JOIN socios ON acceso_socio.id_socio=socios.id_socio where fecha between '".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
		$resp = mysqli_query($conexion,$sql);
		$num = mysqli_num_rows($resp);
		if ($num==0) {
			echo 0;
		}else{
			$cont=0;
			echo '<table id="tablita_chida" class="table table-striped table-bordered bulk_action">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Socio</th>
                                <th>Fecha y hora</th>
                              </tr>
                            </thead>                            
                            <tbody>';
			while ($reporte = mysqli_fetch_array($resp)) {
				$cont++;
				$id_acceso = $reporte['id_acceso'];
				$id_socio = $reporte['nombre_socio']." ".$reporte['ap_pat_socio'];
				$fecha = $reporte['fecha'];
				$date = date_create($fecha);
				$fecha = date_format($date, 'h:i a');
				echo "<tr>";
					echo "<th>";
						echo $cont;
					echo "</th>";
					echo "<th>";
						echo $id_socio;
					echo "</th>";
					echo "<th>";
						echo $fecha;
					echo "</th>";
				echo "</tr>";
			}
			echo '</tbody></table>';
		}
	}else if (isset($_POST['action'])) {
			$respuesta = array();
			$i=0;
			if ($_POST['action']=="porid") {
				$date_inicio = date_create($_POST['fecha']);
				$inicio = date_format($date_inicio, 'Y-m-d');

				$date_fin = date_create($_POST['fecha']);
				$fin = date_format($date_fin, 'Y-m-d');

				$sql = "select * from acceso_socio INNER JOIN socios ON acceso_socio.id_socio=socios.id_socio where fecha between '".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
				$resp = mysqli_query($conexion,$sql);
				$num = mysqli_num_rows($resp);
				if ($num==0) {
					echo 0;
				}else{
					$cont=0;
					while ($reporte = mysqli_fetch_array($resp)) {
						$cont++;
						$id_acceso_socio = $reporte['id_acceso_socio'];
						$id_acceso = $reporte['id_acceso'];
						$id_socio = $reporte['nombre_socio']." ".$reporte['ap_pat_socio'];
						$fecha = $reporte['fecha'];
						$date = date_create($fecha);
						$fecha = date_format($date, 'h:i a');
						

						$fotografia = $reporte['imagen_socio'];
						$respuesta[$i]['id_acceso_socio'] = $id_acceso_socio;
						$respuesta[$i]['id_acceso'] = $id_acceso;
						$respuesta[$i]['fotografia'] = $fotografia;
						$respuesta[$i]['nombre_socio'] = $id_socio;
						$respuesta[$i]['fecha'] = $fecha;
						$i++;

					}
					echo json_encode($respuesta);				
			}
		}
		
	}
 ?>
<?php 
	include("conexion.php");
	if (isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])) {

		$date_inicio = date_create($_POST['fecha_inicio']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha_fin']);
		$fin = date_format($date_fin, 'Y-m-d');

		$sql = "select * from acceso_socio INNER JOIN socios ON acceso_socio.id_socio=socios.id_socio where fecha between '".$inicio." 00:00:00' AND '".$fin." 23:59:59'";
		$resp = mysqli_query($conexion,$sql);
		$num = mysqli_num_rows($resp);
		if ($num==0) {
			//echo 0;
		}else{
			$cont=0;
			echo '<table id="tablita_reporte" class="table table-striped table-bordered bulk_action">
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
	}
 ?>
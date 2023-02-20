 <?php 
	include("conexion.php");
	if(isset($_POST['id_ticket'])){
		
		$total_pago=0;
		$id_ticket=$_POST['id_ticket'];
		$abono=$_POST['abono'];

		$fecha_ticket = date("Y-m-d H:i:s");
		$bandera = 0;
		
		
		$kuerito = "INSERT INTO `abonos_misentir`(`id_ticket`, `abono`, `fecha_abono`, `forma_pago`) VALUES (".$id_ticket.",'".$abono."', '".$fecha_ticket."','".$forma_pago."')";
		if(mysqli_query($conexion,$kuerito)){
			$kuerin =  "SELECT * FROM `apartado_misentir` WHERE id_ticket=".$id_ticket;
			$resp = mysqli_query($conexion,$kuerin);
	        while ($reg=mysqli_fetch_array($resp)) {			
				$total_abono =$reg['total_abono'];
				$total_abono = $total_abono + $abono;
				$kuerit = "UPDATE `apartado_misentir` SET `total_abono`= '".$total_abono."' WHERE id_ticket=".$id_ticket;
				if(mysqli_query($conexion,$kuerit)){
					$bandera = 1;
				}else{
					$bandera = 0;
				}
			}		
				
		}else{
			$bandera = 0;
		}
				
		echo $id_ticket;
	}
 ?>
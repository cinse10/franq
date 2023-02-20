

<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="alex";
			$password="101195alex";
			$bd="gimnasio";

			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			mysqli_set_charset($conexion,"utf8");
			return $conexion;
		}

 ?>
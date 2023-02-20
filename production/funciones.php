<?php 
	public function dameFecha($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 	//Salida: Viernes, 24 de Febrero del 2012
		return $dias[date_format($date, 'w')].", ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y') ;
  	
  	}

  	public function dameFechaCorta($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$dias = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
		$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
	 	//Salida: Vie 24 de Feb del 2012
		return $dias[date_format($date, 'w')].", ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y') ;
  	
  	}
 ?>
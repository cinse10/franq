

function agregardatos(horario,lunes,martes,miercoles,jueves,viernes,sabado,domingo){
		cadena="horario=" + horario + 
			"&lunes=" + lunes +
			"&martes=" + martes +
			"&miercoles=" + miercoles +
			"&jueves=" + jueves +
			"&viernes=" + viernes +
			"&sabado=" + sabado +
			"&domingo=" + domingo;

	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				$('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
	$('#horario').val('');
	$('#lunes').val('');
	$('#martes').val('');
	$('#miercoles').val('');
	$('#jueves').val('');
	$('#viernes').val('');
	$('#sabado').val('');
	$('#domingo').val('');

}

function agregaform(datos){

	d=datos.split('||');

	$('#id_clase').val(d[0]);
	$('#horariou').val(d[1]);
	$('#lunesu').val(d[2]);
	$('#martesu').val(d[3]);
	$('#miercolesu').val(d[4]);
	$('#juevesu').val(d[5]);
	$('#viernesu').val(d[6]);
	$('#sabadou').val(d[7]);
	$('#domingou').val(d[8]);
	
}

function actualizaDatos(){

	id=$('#id_clase').val();
	horario=$('#horariou').val();
	lunes=$('#lunesu').val();
	martes=$('#martesu').val();
	miercoles=$('#miercolesu').val();
	jueves=$('#juevesu').val();
	viernes=$('#viernesu').val();
	sabado=$('#sabadou').val();
	domingo=$('#domingou').val();



	cadena= "id=" + id +
			"&horario=" + horario + 
			"&lunes=" + lunes +
			"&martes=" + martes +
			"&miercoles=" + miercoles +
			"&jueves=" + jueves +
			"&viernes=" + viernes +
			"&sabado=" + sabado +
			"&domingo=" + domingo;
			console.log(cadena);

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor 2:(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
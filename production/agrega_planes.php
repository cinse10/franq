<?php 
include ("header.php");

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Planes</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar planes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_plan.php">
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del plan <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="nombre_plan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del plan">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio del plan<span class="required">*  $</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" name="precio_plan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Precio del plan">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción del plan.</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<textarea class="form-control col-md-7 col-xs-12" name="descripcion_plan" cols="30" rows="5" placeholder="Descripción del plan..."></textarea>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Duración del plan</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<input type="text" name="id_empleado" value="1" hidden="true">
	                          <select class="form-control" name="duracion_plan" id="myselect" onchange="mostrar_control()">	                          
	                            <option value="30">Mensual</option>
	                            <option value="61">Bimestral</option>
	                            <option value="90">Trimestral</option>
	                            <option value="181">Semestral</option>
	                            <option value="365">Anual</option>
	                            <option value="Nuevo">Otro</option>
	                          </select>
	                      	</div>
	                      </div>

	                      <div class="form-group">
	                        <label for="middle-name" id="etiqueta_otro" class="control-label col-md-3 col-sm-3 col-xs-12" style="visibility: hidden">Duración del plan (días) </label>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">	                         
	                          <input class="form-control col-md-7 col-xs-12" name="otra_duracion" id="Texto" type="number" onkeypress="return pulsar(event)" style="visibility: hidden" placeholder="Escribe la duración en días" >
	                        </div>
	                      </div>
	                      	<script>
							    function mostrar_control(){
							        var select = document.getElementById("myselect");
							        var inputText = document.getElementById("Texto");
							        var etiqueta = document.getElementById("etiqueta_otro")
							        if(select.options[select.selectedIndex].value == "Nuevo"){
							            inputText.style.visibility = "visible";
							            etiqueta.style.visibility = "visible";
							        }else{
							            inputText.style.visibility = "hidden";
							            etiqueta.style.visibility = "hidden";
							            inputText.value=""
							        }
							    }
							</script>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Vigencia del plan</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
		                        <div class="form-group">
								    <div class="input-group date" id="myDatepicker4">
								        <input type="text" class="form-control" id="fechita" name="vigencia_plan" readonly="readonly" required="required">
								        <span class="input-group-addon">
								           <span class="glyphicon glyphicon-calendar"></span>
								        </span>
								    </div>
								</div>                        
	                        </div>

	                      </div>                     
	                      <div class="ln_solid"></div>
	                      <div class="form-group">
	                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							  <button class="btn btn-primary" type="reset">Limpiar</button>
	                          <button type="submit" class="btn btn-success">Enviar</button>
	                        </div>
	                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
	
<?php 
include ("footer.php");
if ($planes==0 || $planes==1) {
      echo '<script type="text/javascript">
        swal("No tienes acceso a esta página", {
              buttons: false,
              icon: "warning",
              timer: 1000,
            });
            setTimeout(function(){
              window.location.href = "index.php";
              }, 700);
      </script>';      
    }
?>

<script>
    $('#myDatepicker4').datetimepicker({
    	format: 'DD-MM-YYYY',
        ignoreReadonly: true,
        allowInputToggle: true,
        minDate: new Date()
    });
    //al estar listo el documento, vamos a agregar 30 días
     $(document).ready(function(){
     	var fecha = new Date();
		var dias = 30; // Número de días a agregar
		fecha.setDate(fecha.getDate() + dias);
		console.log(fecha);
		
		$('#fechita').val(traeHoy(fecha));
		console.info(fecha);
    })
    function pulsar(e) { 
		tecla = (document.all) ? e.keyCode :e.which; 
		return (tecla!=101&&tecla!=43&&tecla!=45); 
	} 
	function traeHoy(fechita){
	    var hoy = fechita;
	    var dd = hoy.getDate();
	    var mm = hoy.getMonth()+1;
	    var yyyy = hoy.getFullYear();
	    var hh = hoy.getHours();
	    var min = hoy.getMinutes();
	    var ss = hoy.getSeconds();

	    dd=addZero(dd);
	    mm=addZero(mm);

	    return dd+"-"+mm+"-"+yyyy;
	  }
	  //Agrega ceros a la fecha ingresada
	  function addZero(i) {
	    if (i < 10) {
	        i = '0' + i;
	    }
	    return i;
	  } 
</script>
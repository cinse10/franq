<?php 
	if (isset($_GET['id_plan'])&& isset($_GET['action'])) {
		$id_plan = $_GET['id_plan'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from planes WHERE id_plan=".$id_plan;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_plan = $reg['id_plan'];
            	$nombre_plan = $reg['nombre_plan'];
            	$costo_plan = $reg['costo_plan'];
            	$descripcion_plan = $reg['descripcion_plan'];
            	$vigencia_plan = $reg['vigencia_plan'];
            	$duracion_plan = $reg['duracion_plan'];
            	$valorponido="";
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_plan.php">
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del plan <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<input type="text" name="id_plan" hidden="true" value="<?php echo $id_plan; ?>">
	                          <input type="text" name="nombre_plan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del plan" value="<?php echo $nombre_plan; ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio del plan<span class="required">*  $</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" name="precio_plan" required="required" class="form-control col-md-7 col-xs-12" placeholder="Precio del plan" value="<?php echo $costo_plan; ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción del plan.</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<textarea class="form-control col-md-7 col-xs-12" name="descripcion_plan" cols="30" rows="5" placeholder="Descripción del plan..."><?php echo $descripcion_plan; ?></textarea>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Duración del plan</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<input type="text" name="id_empleado" value="1" hidden="true">
	                          <select class="form-control" name="duracion_plan" id="myselect" onchange="mostrar_control()">
	                          <?php 
	                          	switch ($duracion_plan) {
	                          		case 30:
	                          			echo '<option value="30" selected>Mensual</option>';
			                            echo '<option value="61">Bimestral</option>';
			                            echo '<option value="90">Trimestral</option>';
			                            echo '<option value="181">Semestral</option>';
			                            echo '<option value="365">Anual</option>';
			                            echo '<option value="Nuevo">Otro</option>';
	                          			break;
	                          		case 61:
	                          			echo '<option value="30" >Mensual</option>';
			                            echo '<option value="61" selected>Bimestral</option>';
			                            echo '<option value="90">Trimestral</option>';
			                            echo '<option value="181">Semestral</option>';
			                            echo '<option value="365">Anual</option>';
			                            echo '<option value="Nuevo">Otro</option>';
	                          			break;
	                          		case 90:
	                          			echo '<option value="30">Mensual</option>';
			                            echo '<option value="61">Bimestral</option>';
			                            echo '<option value="90" selected>Trimestral</option>';
			                            echo '<option value="181">Semestral</option>';
			                            echo '<option value="365">Anual</option>';
			                            echo '<option value="Nuevo">Otro</option>';
	                          			break;
	                          		case 181:
	                          			echo '<option value="30" >Mensual</option>';
			                            echo '<option value="61">Bimestral</option>';
			                            echo '<option value="90">Trimestral</option>';
			                            echo '<option value="181" selected>Semestral</option>';
			                            echo '<option value="365">Anual</option>';
			                            echo '<option value="Nuevo">Otro</option>';
	                          			break;
	                          		case 365:
	                          			echo '<option value="30">Mensual</option>';
			                            echo '<option value="61">Bimestral</option>';
			                            echo '<option value="90">Trimestral</option>';
			                            echo '<option value="181">Semestral</option>';
			                            echo '<option value="365" selected>Anual</option>';
			                            echo '<option value="Nuevo">Otro</option>';
	                          			break;
	                          		
	                          		default:
	                          			echo '<option value="30">Mensual</option>';
			                            echo '<option value="61">Bimestral</option>';
			                            echo '<option value="90">Trimestral</option>';
			                            echo '<option value="181">Semestral</option>';
			                            echo '<option value="365">Anual</option>';
			                            echo '<option value="Nuevo" selected>Otro</option>';
			                            $valorponido = $duracion_plan;
	                          			break;
	                          	}
	                           ?>                          
	                          </select>
	                      	</div>
	                      </div>

	                      <div class="form-group">
	                        <label for="middle-name" id="etiqueta_otro" class="control-label col-md-3 col-sm-3 col-xs-12" style="visibility: hidden">Duración del plan (días) </label>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">	                         
	                          <input class="form-control col-md-7 col-xs-12" name="otra_duracion" id="Texto" type="number" onkeypress="return pulsar(event)" style="visibility: hidden" placeholder="Escribe la duración en días">
	                        </div>
	                      </div>
	                      	<script>
							    function mostrar_control(){
							        var select = document.getElementById("myselect");
							        var inputText = document.getElementById("Texto");
							        var etiqueta = document.getElementById("etiqueta_otro");
							        if(select.options[select.selectedIndex].value == "Nuevo"){
							            inputText.style.visibility = "visible";
							            etiqueta.style.visibility = "visible";
							        }else{
							            inputText.style.visibility = "hidden";
							            etiqueta.style.visibility = "hidden";							           
							            inputText.value="<?php echo $valorponido; ?>";							     
							        }
							    }
							</script>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Vigencia del plan</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
		                        <div class="form-group">
								    <div class="input-group date" id="myDatepicker4">
								    	<?php 
								    		$date = date_create($vigencia_plan);
								    		$vigencia_plan = date_format($date, 'd-m-Y');
								    	 ?>
								        <input type="text" class="form-control" name="vigencia_plan" value="<?php echo $vigencia_plan; ?>">
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
}//llave while
}//llave ifedita
}//llave isset
	 if (empty($valorponido)) {

    }else{
    	echo '<script type="text/javascript">
        var select = document.getElementById("myselect");
        var inputText = document.getElementById("Texto");
        var etiqueta = document.getElementById("etiqueta_otro");
        inputText.style.visibility = "visible";
        etiqueta.style.visibility = "visible";
        inputText.value='.$valorponido.';
    </script>';
    }

include ("footer.php"); 
?>
<script>
	function pulsar(e) { 
		tecla = (document.all) ? e.keyCode :e.which; 
		return (tecla!=101&&tecla!=43&&tecla!=45); 
	} 
    $('#myDatepicker4').datetimepicker({
    	format: 'DD-MM-YYYY',
        ignoreReadonly: true,
        allowInputToggle: true
    });
</script>
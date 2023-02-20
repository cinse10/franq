<?php 
include ("header.php");
include("conexion.php");
if(!isset($_GET['id_empleado'])){

}else{
	$id_empleado=$_GET['id_empleado'];
	$sql = "select * from empleados where id_empleado=".$id_empleado;
	$resp = mysqli_query($conexion,$sql);
	while($empleado = mysqli_fetch_array($resp)){
		$nombre_empleado = $empleado['nombre_empleado'];
		$ap_pat_empleado = $empleado['ap_pat_empleado'];
		$ap_mat_empleado = $empleado['ap_mat_empleado'];
		$telefono_empleado = $empleado['tel_empleado'];
		$id_acceso_empleado = $empleado['id_acceso_empleado'];
		//$nivel_acceso = $empleado['nivel_acceso'];
		$activo = $empleado['activo'];
		$socios = $empleado['socios'];
		$caja = $empleado['caja'];
		$productos = $empleado['productos'];
		$empleados = $empleado['empleados'];
		$reportes = $empleado['reportes'];
    $configuracion = $empleado['configuracion'];
	}
}

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Empleados</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar empleados</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_empleado.php">
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ID Tarjeta<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="id_tarjeta_empleado" id="id_tarjeta_empleado" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return pulsar(event)" value="<?php echo $id_acceso_empleado; ?>">
	                          <div id="info"></div>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Empleado <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                        	<input type="text" name="id_empleado" value="<?php echo $id_empleado; ?>" hidden="true|">
	                          <input type="text" name="nombre_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del empleado" value="<?php echo $nombre_empleado; ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellido paterno<span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="apellidoPat_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del producto" value="<?php echo $ap_pat_empleado; ?>">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellido Materno <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="apellidoMat_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del producto" value="<?php echo $ap_mat_empleado; ?>">
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="telefono_empleado" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $telefono_empleado; ?>" onkeypress="return pulsar2(event)">
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estatus<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="status" id="myselect" >
	                          <?php 
	                          	switch ($activo) {	                          		
	                          		case 0:
	                          			echo '<option value="0" selected>Desactivado</option>';
			                            echo '<option value="1">Activado</option>';
	                          			break;
	                          		
	                          		case 1:
	                          			echo '<option value="0">Desactivado</option>';
			                            echo '<option value="1" selected>Activado</option>';
	                          			break;
	                          	}
	                           ?>                          
	                          </select>
	                        </div>
	                      </div>	
	                       <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Permisos para el empleado
                            <br>
                            <small class="text-navy">Marca las casillas deseadas: </small>
                          </label>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Socios:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                              	<?php 
                              		switch ($socios) {
                              			case 0:
			                                echo '<input type="checkbox" class="flat" name="consultar_socio"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_socio"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 1:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_socio"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_socio"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 2:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_socio"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" checked="checked" name="modificar_socio"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              		}
                              	 ?>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Caja:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                              	<?php 
                              		switch ($caja) {
                              			case 0:
			                                echo '<input type="checkbox" class="flat" name="modificar_caja"> Venta / renovacion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="consultar_caja"> Reimpresión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 1:
                              				echo '<input type="checkbox" class="flat" name="modificar_caja"> Venta / renovacion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" checked="checked" name="consultar_caja">Reimpresión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 2:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="modificar_caja"> Venta / renovacion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" checked="checked" name="consultar_caja"> Reimpresión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              		}
                              	 ?>
                              </label>
                            </div>
                          </div>
                        </div>                       
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Productos:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                              	<?php 
                              		switch ($productos) {
                              			case 0:
			                                echo '<input type="checkbox" class="flat" name="consultar_producto"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_producto"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 1:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_producto"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_producto"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 2:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_producto"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" checked="checked" name="modificar_producto"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              		}
                              	 ?>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Empleados:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                              	<?php 
                              		switch ($empleados) {
                              			case 0:
			                                echo '<input type="checkbox" class="flat" name="consultar_empleado"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_empleado"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 1:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_empleado"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" name="modificar_empleado"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              			case 2:
                              				echo '<input type="checkbox" class="flat" checked="checked" name="consultar_empleado"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			                                echo '<input type="checkbox" class="flat" checked="checked" name="modificar_empleado"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              				break;
                              		}
                              	 ?>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Reportes:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                              	<?php 
                              		if($reportes==0){
                                		echo '<input type="checkbox" class="flat" name="consultar_reporte"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              		}else{
                              			echo '<input type="checkbox" class="flat" checked="checked" name="consultar_reporte"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                              		}
                              	 ?>
                              </label>
                            </div>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Configuración:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                                <?php 
                                  if($configuracion==0){
                                    echo '<input type="checkbox" class="flat" name="configuracion"> Modificar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                  }else{
                                    echo '<input type="checkbox" class="flat" checked="checked" name="configuracion"> Modificar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                  }
                                 ?>
                              </label>
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
  include ("footer.php");
  if ($empleados2==0 || $empleados2==1) {
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
	//función que evita el caracter 13 (enter)
function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  if(tecla==13){
    document.getElementById("nombre_empleado").focus();
  }
  return (tecla!=13); 
} 
//función que evita la e + - en un campo numérico
function pulsar2(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=101&&tecla!=43&&tecla!=45); 
} 

</script> 
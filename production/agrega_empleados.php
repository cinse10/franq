<?php 
include ("header.php");

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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_empleado.php">
                      	<div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">ID Acceso<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="id_tarjeta_empleado" id="id_tarjeta_empleado" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return pulsar(event)">
	                          <div id="info"></div>
	                        </div>
	                      </div>	
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Empleado <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="nombre_empleado" id="nombre_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del empleado">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellido paterno<span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="apellidoPat_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellido paterno">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Apellido Materno <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="apellidoMat_empleado" required="required" class="form-control col-md-7 col-xs-12" placeholder="Apellido materno">
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teléfono</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="telefono_empleado" id="telefono_empleado" onkeypress="return pulsar2(event)" class="form-control col-md-7 col-xs-12" type="number">
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
                                <input type="checkbox" class="flat" checked="checked"  name="consultar_socio"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" class="flat" checked="checked" name="modificar_socio"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-3 col-sm-3 col-xs-12 control-label">Ventas:
                            <br>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="flat" checked="checked" name="modificar_caja"> Venta / renovacion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" class="flat" checked="checked" name="consultar_caja"> Reimpresión &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <input type="checkbox" class="flat" checked="checked" name="consultar_producto"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" class="flat" checked="checked" name="modificar_producto"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <input type="checkbox" class="flat" checked="checked" name="consultar_empleado"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" class="flat" checked="checked" name="modificar_empleado"> Modificar / agregar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <input type="checkbox" class="flat" checked="checked" name="consultar_reporte"> Consultar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                <input type="checkbox" class="flat" checked="checked" name="configuracion"> Modificar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </label>
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
function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  if(tecla==13){
    document.getElementById("nombre_empleado").focus();
  }
  return (tecla!=13); 
} 
function pulsar2(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=101&&tecla!=43&&tecla!=45); 
} 
  $('#telefono_empleado').blur(function(){
    var tel = document.getElementById('telefono_empleado').value;
    if(tel.length!=10){
       alertify.error('Escribe correctamente el teléfono');
       document.getElementById('telefono_empleado').focus();
     }
  }); 

</script> 
<script>
  $(document).ready(function() {  
    document.getElementById("id_tarjeta_empleado").focus();  
      $('#id_tarjeta_empleado').blur(function(){
          var cedula = $(this).val();   
          if(cedula!=""){
             var dataString = 'tarjeta_socio='+cedula;
            $.ajax({
                type: "POST",
                url: "valida_tarjeta_empleado.php",
                data: dataString,
                success: function(data) {
                    $('#info').fadeIn(30).html(data);
                    if (data==0) {
                      $('#info').fadeIn(30).html('<span class="label label-danger">NO DISPONIBLE</span>');
                       document.getElementById("id_tarjeta_empleado").focus();
                    }if(data==1){
                      $('#info').fadeIn(30).html('<span class="label label-success">DISPONIBLE</span>');
                    }
                }
            });

          }else{
            console.log("vacío");
            $('#info').fadeIn(30).html('');
          }
         
      });              
  });    
</script>
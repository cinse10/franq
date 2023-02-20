<?php 
include("conexion.php");
include ("header.php");
if (isset($_GET['action']) && isset($_GET['id_socio'])) {
  $id_socio=$_GET['id_socio'];
  $sql = "select * from socios_chiqui where id_socio=".$id_socio;
  $consulta = mysqli_query($conexion,$sql);
  if(mysqli_num_rows($consulta)>0){
    $socio = mysqli_fetch_array($consulta);
    $nombre_socio     = $socio['nombre_socio']; 
    $ap_pat_socio     = $socio['ap_pat_socio']; 
    $ap_mat_socio   = $socio['ap_mat_socio']; 
    $whats_socio      = $socio['whats_socio'];  
    $nacimiento_socio   = $socio['nacimiento_socio'];
    $calle_socio    = $socio['calle_socio'];
    $colonia_socio    = $socio['colonia_socio'];
    $municipio_socio  = $socio['municipio_socio'];
    $cp_socio       = $socio['cp_socio'];
    $email_socio    = $socio['email_socio'];     
    $notas_socio    = $socio['notas_socio'];

  }
  $sql2 = "select * from compras_chiqui where id_socio=".$id_socio;
  $consulta2 = mysqli_query($conexion,$sql2);
  if(mysqli_num_rows($consulta2)>0){
    $venta = mysqli_fetch_array($consulta2);
    $ventas     = $venta['monto_mensual']; 
    
  }
  if ($_GET['action']=="elimina") {
    $nombre_elimina = $nombre_socio." ".$ap_pat_socio." ".$ap_mat_socio;
    echo '<script language="javascript">';
      echo 'if(confirm("¿Deseas eliminar a '.$nombre_elimina.' ?")){';
      if(mysqli_query($conexion,"delete from socios where id_socio=".$id_socio)){
        echo 'alert("Socio eliminado con éxito.");';
      }else{
        echo 'alert("Ocurrió un error al intentar borrar los datos.");';
      }
      echo 'window.location="consulta_socios.php";}else{';
      echo 'window.history.back();}';
    echo '</script>';
  }if($_GET['action']=="edita"){

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Socios Chiqui Mundo</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Socios</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4"></div>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_socio_chiqui.php" autocomplete="off">
                        <div class="form-group">
                          
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="id_socio" value="<?php echo $_GET['id_socio']; ?>" hidden>
                            
                            <div id="info"></div>
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Socio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del socio" value="<?php echo $nombre_socio; ?>">
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="ap_pat_socio" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Apellido paterno" value="<?php echo $ap_pat_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="ap_mat_socio" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Apellido materno" value="<?php echo $ap_mat_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono  <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="whats_socio" data-inputmask="'mask' : '(999) 999-9999'"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Telefono" value="<?php echo $whats_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email_socio" class="form-control col-md-7 col-xs-12" type="text"  placeholder="email" value="<?php echo $email_socio; ?>">
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <div class="input-group date" >
                                  <input type="date" class="form-control" id="nacimiento_socio" name="nacimiento_socio"  value="<?php echo $nacimiento_socio; ?>">
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>                        
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Calle <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="calle_socio" class="form-control col-md-7 col-xs-12" placeholder="Calle" onkeypress="return pulsar(event)"  value="<?php echo $calle_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Colonia <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="colonia_socio" class="form-control col-md-7 col-xs-12" placeholder="Colonia" onkeypress="return pulsar(event)"  value="<?php echo $colonia_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Municipio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="municipio_socio" class="form-control col-md-7 col-xs-12" placeholder="Municipio" onkeypress="return pulsar(event)"  value="<?php echo $municipio_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Codigo Postal <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" name="cp_socio"  class="form-control col-md-7 col-xs-12" placeholder="Codigo Postal" onkeypress="return pulsar(event)"  value="<?php echo $cp_socio; ?>">
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Notas: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="notas_socio" placeholder="Notas del socio"><?php echo $notas_socio; ?></textarea>
                          </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="consulta_socios.php" class="btn btn-Danger "> Cancelar </a>
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
  }//llave primer if
}//llave if edita
?>
<script> 
function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=13); 
} 
</script> 
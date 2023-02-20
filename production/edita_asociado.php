<?php 
include("conexion.php");
include ("header.php");
if (isset($_GET['action']) && isset($_GET['id_socio'])) {
  $id_socio=$_GET['id_socio'];
  $sql = "select * from dist_hijo where id_dist_hijo=".$id_socio;
  $consulta = mysqli_query($conexion,$sql);
  if(mysqli_num_rows($consulta)>0){
    $socio = mysqli_fetch_array($consulta);
    $nombre_socio     = $socio['nombre_dist_hijo']; 
    $cod_distribuidor    = $socio['num_asociado'];
    $whats_socio      = $socio['tel_dist_hijo'];  
    $calle_socio    = $socio['domicilio_dist_hijo'];
    $email_socio    = $socio['email_dist_hijo'];    
    $tipo_asociado    = $socio['tipo_asociado'];

  }
  if ($_GET['action']=="elimina") {
    $nombre_elimina = $nombre_socio." ".$ap_pat_socio." ".$ap_mat_socio;
    echo '<script language="javascript">';
      echo 'if(confirm("¿Deseas eliminar a '.$nombre_elimina.' ?")){';
      if(mysqli_query($conexion,"delete from dist_hijo where id_socio=".$id_socio)){
        echo 'alert("Socio eliminado con éxito.");';
      }else{
        echo 'alert("Ocurrió un error al intentar borrar los datos.");';
      }
      echo 'window.location="consulta_dist_hijo.php";}else{';
      echo 'window.history.back();}';
    echo '</script>';
  }if($_GET['action']=="edita"){

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Asociados</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Asociados</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4"></div>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_distribuidor.php" autocomplete="off">
                        <div class="form-group">
                          
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="id_socio" value="<?php echo $_GET['id_socio']; ?>" hidden>
                            <input type="text" name="bandera" value="2" hidden>
                            
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
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No. de Asociado <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="cod_distribuidor" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $cod_distribuidor; ?>" disabled="disabled">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono  <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="whats_socio" data-inputmask="'mask' : '(999) 999-9999'" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Telefono" value="<?php echo $whats_socio; ?>">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Domicilio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="calle_socio" class="form-control col-md-7 col-xs-12" placeholder="Calle" onkeypress="return pulsar(event)"  value="<?php echo $calle_socio; ?>">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email_socio" class="form-control col-md-7 col-xs-12" type="text"  placeholder="email" value="<?php echo $email_socio; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tipo de Asociado: <span class="required">*</span>
                          </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="form-control" name="tip_usuario" id="tip_usuario" required>
                                  <?php 
                                    switch ($tipo_asociado) {
                                      case 'TIENDA':
                                        echo "<option value='TIENDA' selected>Tienda</option>";
                                        echo "<option value='RUTA'>Ruta</option>" ;
                                        break;

                                      case 'RUTA':
                                        echo "<option value='TIENDA'>Tienda</option>";
                                        echo "<option value='RUTA' selected>Ruta</option>" ;
                                        break;
                                      
                                      default:
                                        echo "<option value=''>Selecciona un tipo de usuario</option>";
                                        echo "<option value='TIENDA'>Tienda</option>";
                                        echo "<option value='RUTA'>Ruta</option>" ;
                                        break;
                                    }
                                   ?>
                                   
                                  </select>
                                </div>
                        </div><br><br>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="consulta_distribuciones.php" class="btn btn-Danger "> Cancelar </a>
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
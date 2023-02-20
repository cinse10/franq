<?php 
include("conexion.php");
include ("header.php");

  $id_socio=$_GET['id_socio'];
  $sql = "select * from dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre=dist_padre.id_dist_padre where id_dist_hijo=".$id_socio;
  $consulta = mysqli_query($conexion,$sql);
  if(mysqli_num_rows($consulta)>0){
    $socio = mysqli_fetch_array($consulta);
    $nombre_socio     = $socio['nombre_dist_hijo'];
    $cod_distribuidor    = $socio['num_asociado'];
    $whats_socio      = $socio['tel_dist_hijo'];  
    $calle_socio    = $socio['domicilio_dist_hijo'];
    $email_socio    = $socio['email_dist_hijo']; 
    $dist_padre    = $socio['dist_padre']; 
    $nombre_padre     = $socio['nombre_dist_padre']; 
  }

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
                    <h2>Ver Asociados</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4"></div>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_padre.php" autocomplete="off">
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
                            <input type="text" name="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del socio" value="<?php echo $nombre_socio; ?>" disabled>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No. de Asociado <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="cod_distribuidor" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $cod_distribuidor; ?>" disabled="disabled">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Distribuidor Padre Actual <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="nombre_padre" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $nombre_padre; ?>" disabled="disabled">
                          </div>
                        </div>
                        <hr>
                        <label for="middle-name" >Distribuidores Padre (Historico) </label><br>
                        <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>Nombre</th>
                                    <th>No. de asociado</th>
                                    <th>Fecha</th>
                                  </tr>
                                </thead>                            
                                <tbody>
                                  <?php 
                                    include("conexion.php");

                                      $sql = "Select * from dist_hijo INNER JOIN herencia_hijos ON dist_hijo.id_dist_hijo=herencia_hijos.id_dist_hijo INNER JOIN dist_padre ON herencia_hijos.id_dist_padre = dist_padre.id_dist_padre where dist_hijo.id_dist_hijo = ".$id_socio." ORDER BY `herencia_hijos`.`fecha_herencia` DESC";
                                      $requi = mysqli_query($conexion,$sql);
                                      while ($reg=mysqli_fetch_array($requi)) {
                                      
                                          echo "<tr>";
                                            echo "<th>".$reg['nombre_dist_padre']."</th>";
                                            echo "<th>".$reg['cod_dist_padre']."</th>";
                                            echo "<th>".$reg['fecha_herencia']."</th>";
                                          echo "</tr>";
                                      }
                                    
                                   ?>                              
                                </tbody>
                              </table>
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Actualizar distribuidor padre<span class="required">   *  </span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <select class="form-control" name="nuevo_pa" id="nuevo_pa" required>
                                  <option value="">-- Selecciona nuevo distruibuidor padre --</option>
                                  <?php 
                                  include("conexion.php");
                                  $productos = mysqli_query($conexion,"SELECT * FROM `dist_padre`");
                                  while ($producto=mysqli_fetch_array($productos)) {
                                      $id_dist_padre=$producto["id_dist_padre"];
                                      $nombre_dist_padre=$producto["nombre_dist_padre"];

                                      echo '<option value="'.$id_dist_padre.'" id="'.$id_dist_padre.'">'.$nombre_dist_padre.'</option>';
                                  }
                              ?>                 
                                  </select>
                                </div>
                              </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="consulta_distribuciones.php" class="btn btn-Danger "> Volver </a>
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
?>
<script> 
function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=13); 
} 
</script> 
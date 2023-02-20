<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cobro de cajas</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Asociados Betterware</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>Nombre Asociado</th>
                                    <th>No. de Asociado</th>
                                    <th>Distribuidor</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>                            
                                <tbody>
                                  <?php 
                                    include("conexion.php");

                                      $sql = "Select * from dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre = dist_padre.id_dist_padre";
                                      $requi = mysqli_query($conexion,$sql);
                                      while ($reg=mysqli_fetch_array($requi)) {
                                      
                                          echo "<tr>";
                                            echo "<th>".$reg['nombre_dist_hijo']."</th>";
                                            echo "<th>".$reg['num_asociado']."</th>";
                                            echo "<th>".$reg['nombre_dist_padre']." ".$reg['ape_p_dist_padre']."</th>";
                                            
                                            if($socios==2){                                    
                                              echo "<th><a href='cobro_caja.php?id_socio=".$reg['id_dist_hijo']."'><i class='glyphicon glyphicon-shopping-cart'></i></a>&nbsp&nbsp&nbsp";
                                              echo "</th>";
                                 
                                          echo "</tr>";
                                          }
                                      }
                                    
                                   ?>                              
                                </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        
<?php 
  include("footer.php");
?>
 
<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de planes</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Planes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Nombre plan</th>
                                <th>Costo</th>
                                <th>Descripción</th>
                                <th>Empleado</th>
                                <th>Vigencia</th>
                                <th>Duración (Días)</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $sql = "SELECT * FROM `planes` INNER JOIN empleados ON planes.id_empleado = empleados.id_empleado";
                                $requi = mysqli_query($conexion,$sql);
                                while ($reg=mysqli_fetch_array($requi)) {
                                  echo "<tr>";
                                    echo "<th>".$reg['id_plan']."</th>";
                                    echo "<th>".$reg['nombre_plan']."</th>";
                                    echo "<th>$ ".$reg['costo_plan']."</th>";
                                    echo "<th>".$reg['descripcion_plan']."</th>";
                                    echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                    echo "<th>".$reg['vigencia_plan']."</th>";
                                    echo "<th>".$reg['duracion_plan']."</th>";
                                    if($planes==2){                                     
                                      echo "<th><a href='edita_plan.php?action=edita&id_plan=".$reg['id_plan']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp
                                      </th>";
                                    }else{
                                      echo "<th></th>";
                                    }
                                  echo "</tr>";
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
  <?php 
    if ($planes==0) {
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
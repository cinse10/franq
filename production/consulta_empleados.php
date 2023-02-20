<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de empleados</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empleados</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Teléfono</th>
                                <th>Usuario</th>
                                <th>ID acceso</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $sql = "SELECT * FROM `empleados`";
                                $requi = mysqli_query($conexion,$sql);
                                while ($reg=mysqli_fetch_array($requi)) {
                                  echo "<tr>";
                                    echo "<th>".$reg['nombre_empleado']."</th>";
                                    echo "<th>".$reg['ap_pat_empleado']."</th>";
                                    echo "<th>".$reg['ap_mat_empleado']."</th>";
                                    echo "<th>".$reg['tel_empleado']."</th>";
                                    echo "<th>".$reg['usuario_empleado']."</th>";
                                    echo "<th>".$reg['id_acceso_empleado']."</th>";
                                    if ($reg['activo']==0) {
                                      echo "<th>Desactivado</th>";  
                                    }else{
                                      echo "<th>Activado</th>";  
                                    } 
                                    if($empleados2==2){
                                      echo "<th><a href='edita_empleado.php?action=edita&id_empleado=".$reg['id_empleado']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp
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
if ($empleados2==0) {
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
<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de socios NICE</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Socios</h2>
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
                                <th>Telefono</th>
                                <th>Codigo Afiliado</th>                                
                                <th>Marca</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                if ($iddelempleadito != 1 && $iddelempleadito != 7) {
                                  $sql = "Select * from socios_nice where socios.id_empleado = $iddelempleadito or socios.id_empleado = 1";
                                  $requi = mysqli_query($conexion,$sql);
                                  while ($reg=mysqli_fetch_array($requi)) {
                                  
                                      echo "<tr>";
                                        echo "<th>".$reg['nombre_socio']."</th>";
                                        echo "<th>".$reg['ap_pat_socio']."</th>";
                                        echo "<th>".$reg['ap_mat_socio']."</th>";
                                        echo "<th>".$reg['whats_socio']."</th>";
                                        echo "<th>".$reg['codigo']."</th>";
                                        
                                        
                                        if ($reg['id_empleado']==1) 
                                          echo "<th>General</th>";  
                                        if ($reg['id_empleado']==2) 
                                          echo "<th>Mi sentir</th>";
                                        if ($reg['id_empleado']==3) 
                                          echo "<th>Intima Hogar</th>";
                                        if ($reg['id_empleado']==4) 
                                          echo "<th>Vicky Form</th>";
                                          
                                        if($socios==2){                                    
                                          echo "<th><a href='edita_socios_nice.php?action=edita&id_socio=".$reg['id_socio']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp";
                                          echo "</th>";
                             
                                      echo "</tr>";
                                      }
                                  }
                                }else{
                                  $sql = "Select * from socios_nice";
                                  $requi = mysqli_query($conexion,$sql);
                                  while ($reg=mysqli_fetch_array($requi)) {
                                  
                                      echo "<tr>";
                                        echo "<th>".$reg['nombre_socio']."</th>";
                                        echo "<th>".$reg['ap_pat_socio']."</th>";
                                        echo "<th>".$reg['ap_mat_socio']."</th>";
                                        echo "<th>".$reg['whats_socio']."</th>";
                                        echo "<th>".$reg['codigo']."</th>";
                                        if ($reg['id_empleado']==1) 
                                          echo "<th>General</th>";  
                                        if ($reg['id_empleado']==2) 
                                          echo "<th>Mi sentir</th>";
                                        if ($reg['id_empleado']==3) 
                                          echo "<th>Intima Hogar</th>";
                                        if ($reg['id_empleado']==4) 
                                          echo "<th>Vicky Form</th>";

                                        if($socios==2){                                    
                                          echo "<th><a href='edita_socios_nice.php?action=edita&id_socio=".$reg['id_socio']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp";
                                          echo "</th>";
                             
                                      echo "</tr>";
                                      }
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
  <?php 
    if ($socios==0) {
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
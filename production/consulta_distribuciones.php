<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de socios</h3>
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
                  <button onclick="exportTableToExcel('tabla_tickets')" class="btn btn-primary"  >Excel</button>
                  <div class="x_content">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                      <li class="active"><a href="#ventas" aria-controls="home" role="tab" data-toggle="tab">Asociados</a></li>
                      <li><a href="#consignaciones" aria-controls="home" role="tab" data-toggle="tab">Distribuidores</a></li>
                    </ul>
                    <div class="tab-content">

                      <div role="tabpanel" class="tab-pane active" id="ventas">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel" >
                            <div class="x_content">
                              <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>No. de asociado</th>
                                    <th>Nombre</th>
                                    <th>Distribuidor</th>
                                    <th>Referido</th>
                                    <th>Tipo</th>
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
                                            echo "<th>".$reg['num_asociado']."</th>";
                                            echo "<th>".$reg['nombre_dist_hijo']."</th>";
                                            echo "<th>".$reg['nombre_dist_padre']."</th>";
                                            echo "<th>".$reg['cod_referido']."</th>";
                                            echo "<th>".$reg['tipo_asociado']."</th>";
                                            
                                            if($socios==2){                                    
                                              echo "<th><a href='edita_asociado.php?action=edita&id_socio=".$reg['id_dist_hijo']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp<a href='ver_padre.php?id_socio=".$reg['id_dist_hijo']."'><i class='glyphicon glyphicon-object-align-vertical'></i></a>";
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
                      <div role="tabpanel" class="tab-pane" id="consignaciones">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel" >
                            <div class="x_content">
                              <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>Nombre</th>
                                    <th>No. Distribución</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>                            
                                <tbody>
                                  <?php 
                                    include("conexion.php");

                                      $sql = "Select * from dist_padre ";
                                      $requi = mysqli_query($conexion,$sql);
                                      while ($reg=mysqli_fetch_array($requi)) {
                                      
                                          echo "<tr>";
                                            echo "<th>".$reg['nombre_dist_padre']."</th>";
                                            echo "<th>".$reg['cod_dist_padre']."</th>";
                                            
                                            if($socios==2){                                    
                                              echo "<th><a href='edita_distribuidor.php?action=edita&id_socio=".$reg['id_dist_padre']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp";
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

<script type="text/javascript">
  function exportTableToExcel(tabla, filename = ''){
      var f = new Date();
      var fechita = (f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tabla);
      console.log(tableSelect);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
      
      // Specify file name
      filename = filename?filename+'.xls':'Betterware_'+fechita+'.xls';
      
      // Create download link element
      downloadLink = document.createElement("a");
      
      document.body.appendChild(downloadLink);
      
      if(navigator.msSaveOrOpenBlob){
          var blob = new Blob(['ufeff', tableHTML], {
              type: dataType
          });
          navigator.msSaveOrOpenBlob( blob, filename);
      }else{
          // Create a link to the file
          downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
      
          // Setting the file name
          downloadLink.download = filename;
          
          //triggering the function
          downloadLink.click();
      }
  }
</script>
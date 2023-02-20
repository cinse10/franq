<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de socios Mundo Terra</h3>
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
                      <button onclick="exportTableToExcel('datatable-checkbox')" class="btn btn-primary"  >Excel</button>
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
                                <th>Compras Mes anterior</th>
                                <th>Descuento</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                
                                  $sql = "Select * from socios_terra";
                                  $requi = mysqli_query($conexion,$sql);
                                  while ($reg=mysqli_fetch_array($requi)) {
                                    $id_socio = $reg['id_socio'];
                                  
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
                                          echo "<th>Mundo Terra</th>";
                                        $sql2 = "Select * from compras_terra where compras_terra.id_socio = $id_socio";
                                        $requi2 = mysqli_query($conexion,$sql2);
                                        while ($reg2=mysqli_fetch_array($requi2)) {
                                          echo "<th>$".$reg2['monto_mensual']."</th>";
                                          if ($reg2['tipo_desc']==1) 
                                            echo "<th>SIN DESCUENTO</th>"; 
                                          if ($reg2['tipo_desc']==2) 
                                            echo "<th>4% DE DESCUENTO</th>"; 
                                          if ($reg2['tipo_desc']==3) 
                                            echo "<th>7% DE DESCUENTO</th>";
                                          if ($reg2['tipo_desc']==4) 
                                            echo "<th>13% DE DESCUENTO</th>"; 
                                          if ($reg2['tipo_desc']==5) 
                                            echo "<th>18% DE DESCUENTO</th>";
                                        }

                                        if($socios==2){                                    
                                          echo "<th><a href='edita_socios_terra.php?action=edita&id_socio=".$reg['id_socio']."'><i class='glyphicon glyphicon-pencil'></i></a>&nbsp&nbsp&nbsp";
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
      filename = filename?filename+'.xls':'SociosTerra_'+fechita+'.xls';
      
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
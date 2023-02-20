<?php 
  include("header.php");
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Intima Hogar</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos</h2>
                    <a href="reset_inventario.php?marca=3"  style="float: right;" class="btn btn-warning">Reset inventario</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      
                      <div class="x_panel">
                        <div class="x_content">
                          <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="active"><a href="#subido" aria-controls="home" role="tab" data-toggle="tab">Subido a Inventario</a></li>
                            <li><a href="#faltantes" aria-controls="home" role="tab" data-toggle="tab">Faltantes en Sistema</a></li>
                            <li><a href="#sobrantes" aria-controls="home" role="tab" data-toggle="tab">Sobrantes en Sistema</a></li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="subido">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel" >
                                  <div class="x_content">
                                    <button onclick="exportTableToExcel('tablin')" class="btn btn-primary"  >Excel</button>
                                      <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                    include("conexion.php");
                                                    $kueri = "SELECT * FROM `inventario_intima` INNER JOIN productos ON inventario_intima.cod_barras = productos.codigo_barras_producto";
                                                    $respuesta = mysqli_query($conexion,$kueri);
                                                    while($producto = mysqli_fetch_array($respuesta)){
                                                        echo "<tr>";
                                                            echo "<td>".$producto['nombre_producto']."</td>";
                                                            echo "<td>".$producto['precio_producto']."</td>";
                                                            echo "<td>".$producto['precio_afi_producto']."</td>";
                                                            echo "<td>".$producto['codigo_barras_producto']."</td>";
                                                            echo "<td>".$producto['inventario']."</td>";
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
                            <div role="tabpanel" class="tab-pane" id="faltantes">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel" >
                                  <div class="x_content">
                                    <button onclick="exportTableToExcel('tablin2')" class="btn btn-primary"  >Excel</button>
                                      <div class="table-responsive">
                                        <table id="tablin2" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                    include("conexion.php");
                                                    $kueri = "SELECT A.id_producto,A.inventario_producto, A.nombre_producto, A.precio_producto, A.precio_afi_producto,  B.inventario, A.codigo_barras_producto, B.cod_barras from productos A right join inventario_intima B  ON A.codigo_barras_producto=B.cod_barras";
                                                    $respuesta = mysqli_query($conexion,$kueri);
                                                    while($producto = mysqli_fetch_array($respuesta)){
                                                        $invp = $producto['inventario_producto'];
                                                        $inv = $producto['inventario'];                      
                                                        if ($invp == NULL) {
                                                          $cod_barras = $producto['cod_barras'];
                                                           $kueri2 = "SELECT * FROM producto WHERE codigo_barras_producto='".$cod_barras."'";
                                                            $respuesta2 = mysqli_query($conexion,$kueri2);
                                                            while($producto2 = mysqli_fetch_array($respuesta2)){
                                                                echo "<tr>";
                                                                  echo "<td>".$producto2['nombre_producto']."</td>";
                                                                  echo "<td>".$producto2['precio_producto']."</td>";
                                                                  echo "<td>".$producto2['precio_afi_producto']."</td>";
                                                                  echo "<td>".$producto2['codigo_barras_producto']."</td>";
                                                                  echo "<td>".$producto['inventario']."</td>";                     
                                                                echo "</tr>";
                                                            }
                                                        }else{
                                                          if ($inv > $invp) {
                                                            $invf = $inv - $invp;
                                                            echo "<tr>";
                                                                echo "<td>".$producto['nombre_producto']."</td>";
                                                                echo "<td>".$producto['precio_producto']."</td>";
                                                                echo "<td>".$producto['precio_afi_producto']."</td>";
                                                                echo "<td>".$producto['codigo_barras_producto']."</td>";
                                                                echo "<td>".$invf."</td>";                                                                
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
                            <div role="tabpanel" class="tab-pane" id="sobrantes">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel" >
                                  <div class="x_content">
                                    <button onclick="exportTableToExcel('tablin3')" class="btn btn-primary"  >Excel</button>
                                      <div class="table-responsive">
                                        <table id="tablin3" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre producto</th>
                                                    <th>Precio producto</th>
                                                    <th>Precio afiliado</th>
                                                    <th>Codigo de barras</th>
                                                    <th>Inventario</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 
                                                    include("conexion.php");
                                                    $kueri = "SELECT A.id_producto,A.inventario_producto, A.nombre_producto, A.precio_producto, A.precio_afi_producto,  B.inventario, A.codigo_barras_producto, B.cod_barras from productos A left join inventario_intima B  ON A.codigo_barras_producto=B.cod_barras";
                                                    $respuesta = mysqli_query($conexion,$kueri);
                                                    while($producto = mysqli_fetch_array($respuesta)){
                                                        $invp = $producto['inventario_producto'];
                                                        $inv = $producto['inventario'];                      
                                                        if ($invp == NULL) {
                                                          echo "<tr>";
                                                            echo "<td>".$producto['nombre_producto']."</td>";
                                                            echo "<td>".$producto['precio_producto']."</td>";
                                                            echo "<td>".$producto['precio_afi_producto']."</td>";
                                                            echo "<td>".$producto['codigo_barras_producto']."</td>";
                                                            echo "<td>".$producto['inventario']."</td>";                     
                                                          echo "</tr>";                                            
                                                        }else{
                                                          if ($inv < $invp) {
                                                            $invf = $invp - $inv;
                                                            if ($invf > 0) {
                                                              echo "<tr>";
                                                                  echo "<td>".$producto['nombre_producto']."</td>";
                                                                  echo "<td>".$producto['precio_producto']."</td>";
                                                                  echo "<td>".$producto['precio_afi_producto']."</td>";
                                                                  echo "<td>".$producto['codigo_barras_producto']."</td>";
                                                                  echo "<td>".$invf."</td>";                                                                
                                                              echo "</tr>";
                                                            }
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
    if ($productos==0) {
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
      filename = filename?filename+'.xls':'InventarioIntima_'+fechita+'.xls';
      
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
<?php 
  include("header.php");
  include("conexion.php");
  $sql = "SELECT count(*) AS contador FROM base_terra";
  $resp = mysqli_query($conexion,$sql);
   while($total = mysqli_fetch_array($resp)){
      $prod = $total['contador'];
   }
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Mundo Terra</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      
                      <div class="x_panel">
                        <div class="x_content">
                          <button onclick="exportTableToExcel('tablin')" class="btn btn-primary"  >Excel</button>
                          <div class="table-responsive">
                        <table  id="tablin" class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Catalogo</th>
                                    <th>Lista</th>
                                    <th>Pagina</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Color</th>
                                    <th>Codigo de barras</th>
                                    <th>Talla</th>
                                    <th>Corrida</th>
                                    <th>Precio Clave</th>
                                    <th>Precio Contado</th>
                                    <th>Precio Pagos</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                    include("conexion.php");
                                    $kueri = "SELECT * FROM `base_terra` INNER JOIN terra ON base_terra.id_terra = terra.id_terra";
                                    $respuesta = mysqli_query($conexion,$kueri);
                                    while($producto = mysqli_fetch_array($respuesta)){
                                        echo "<tr>";
                                            echo "<td>".$producto['libro']."</td>";
                                            echo "<td>".$producto['lista']."</td>";
                                            echo "<td>".$producto['pagina']."</td>";
                                            echo "<td>".$producto['modelo']."</td>";
                                            echo "<td>".$producto['marca']."</td>";
                                            echo "<td>".$producto['color']."</td>";
                                            echo "<td>".$producto['cod_barras']."</td>";
                                            echo "<td>".$producto['talla_cod_barras']."</td>";
                                            echo "<td>".$producto['corrida_MX']."</td>";
                                            echo "<td>".$producto['clave2_MX']."</td>";
                                            echo "<td>".$producto['contado_MX']."</td>";
                                            echo "<td>".$producto['pagos_MX']."</td>";
                                            
                                        echo "</tr>";
                                    }
                                 ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h5>Total productos:</h5></th>
                                    <th><h5><strong><?php echo $prod; ?></strong></h5></th>
                                </tr>
                            </tfoot>
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
      filename = filename?filename+'.xls':'InventarioMundoTerra_'+fechita+'.xls';
      
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
                


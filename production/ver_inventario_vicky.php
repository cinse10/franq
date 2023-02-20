<?php 
  include("header.php");
  include("conexion.php");
  $sql = "SELECT count(*) AS contador FROM base_vicky";
  $resp = mysqli_query($conexion,$sql);
   while($total = mysqli_fetch_array($resp)){
      $prod = $total['contador'];
   }
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Vicky Form</h3>
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
                              <table id="tablin" class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Cod. Barras</th>
                                    <th>Pagina</th>
                                    <th>PVP1</th>
                                    <th>PVP4</th>
                                    <th>Modelo</th>
                                    <th>Descripcion</th>
                                    <th>Talla</th>
                                    <th>Color</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $kueri = "SELECT * FROM `base_vicky` INNER JOIN vicky_form ON base_vicky.id_biky = vicky_form.id_biky";
                                $respuesta = mysqli_query($conexion,$kueri);
                                while($producto = mysqli_fetch_array($respuesta)){
                                    echo "<tr>";
                                      echo "<td>".$producto['cod_barras_vf']."</td>";
                                      echo "<td>".$producto['pagina_vf']."</td>";
                                      echo "<td>".$producto['pvp1_vf']."</td>";
                                      echo "<td>".$producto['pvp4_vf']."</td>";
                                      echo "<td>".$producto['modelo_vf']."</td>";
                                            echo "<td>".$producto['descripcion_vf']."</td>";
                                            echo "<td>".$producto['talla_vf']."</td>";
                                            echo "<td>".$producto['color_vf']."</td>";
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
      filename = filename?filename+'.xls':'InventarioVickyForm_'+fechita+'.xls';
      
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
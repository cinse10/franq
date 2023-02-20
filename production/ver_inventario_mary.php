<?php 
  include("header.php");
  include("conexion.php");
  $sql = "SELECT count(*) AS contador FROM base_marykay";
  $resp = mysqli_query($conexion,$sql);
   while($total = mysqli_fetch_array($resp)){
      $prod = $total['contador'];
   }
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Mary Kay</h3>
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
                            <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Nombre producto</th>
                                    <th>Precio catalogo</th>
                                    <th>Precio compra</th>
                                    <th>Inventario</th>
                                    <th>Codigo de barras</th>                                    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h5>Total productos:</h5></th> 
                                    <th><h5><strong><?php echo $prod; ?></strong></h5></th> 
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    include("conexion.php");
                                    $kueri = "SELECT * FROM `base_marykay` INNER JOIN productos_marykay ON base_marykay.id_marykay = productos_marykay.id_producto";
                                    $respuesta = mysqli_query($conexion,$kueri);
                                    while($producto = mysqli_fetch_array($respuesta)){
                                        echo "<tr>";
                                            echo "<td>".$producto['nombre_producto']."</td>";
                                            echo "<td>".$producto['precio_catalogo']."</td>";
                                            echo "<td>".$producto['precio_compra']."</td>";
                                            echo "<td>".$producto['inventario_mary']."</td>";
                                            echo "<td>".$producto['codigo_producto']."</td>";
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

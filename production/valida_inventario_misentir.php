<?php 
  include("header.php");
  include("conexion.php");
  $sql = "SELECT count(*) AS contador FROM base_misentir";
  $resp = mysqli_query($conexion,$sql);
   while($total = mysqli_fetch_array($resp)){
      $prod = $total['contador'];
   }
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Validar inventario Mi sentir</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos</h2>
                    <a href="validar_inventario_misentir.php"  style="float: right;" class="btn btn-warning">Subir Inventario</a>
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
                                    <th>Cantidad</th>
                                    <th>Precio producto</th>
                                    <th>Precio afiliado</th> 
                                    <th>Cod. Barras</th>                                  
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
                                    $kueri = "SELECT * FROM `base_misentir` INNER JOIN productos_misentir ON base_misentir.id_misentir = productos_misentir.id_producto";
                                    $respuesta = mysqli_query($conexion,$kueri);
                                    while($producto = mysqli_fetch_array($respuesta)){
                                        echo "<tr>";
                                            echo "<td>".$producto['nombre_producto']."</td>";
                                            echo "<td>".$producto['cantidad']."</td>";
                                            echo "<td>$ ".$producto['precio_producto']."</td>";
                                            echo "<td>$ ".$producto['precio_afi_producto']."</td>";
                                            echo "<td>".$producto['codigo_barras_producto']."</td>";
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

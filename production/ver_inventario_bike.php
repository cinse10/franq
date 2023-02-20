<?php 
  include("header.php");
  include("conexion.php");
  $sql = "SELECT count(*) AS contador FROM base_bike";
  $resp = mysqli_query($conexion,$sql);
   while($total = mysqli_fetch_array($resp)){
      $prod = $total['contador'];
   }
?>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Bike</h3>
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
                        <table id="tablita" class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre producto</th>
                                    <th>Rodada producto</th>
                                    <th>Color producto</th>
                                    <th>Precio compra</th>
                                    <th>Precio producto</th>
                                    <th>Precio afiliado</th>
                                    <th>Código Barras</th>
                                    <th>Código Generico</th>
                                    <th>Acciones</th>                                   
                                </tr>
                            </thead>
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
                                    <th><h5>Total productos:</h5></th>
                                    <th><h5><strong><?php echo $prod; ?></strong></h5></th> 
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    include("conexion.php");
                                    $kueri = "SELECT * FROM `base_bike` INNER JOIN productos_bike ON base_bike.id_bike = productos_bike.id_producto";
                                    $respuesta = mysqli_query($conexion,$kueri);
                                    while($producto = mysqli_fetch_array($respuesta)){
                                        echo "<tr id='id_".$producto['id_producto']."'>";
                                            echo "<td>".$producto['id_producto']."</td>";
                                            echo "<td><input type='text' class='nombre' value='".$producto['nombre_producto']."'></td>";
                                            echo "<td><input type='text' class='rodada' value='".$producto['rodada_producto']."'></td>";
                                            echo "<td><input type='text' class='color' value='".$producto['color_producto']."'></td>";
                                            echo "<td><input type='text' class='compra' value='".$producto['precio_compra']."'></td>";
                                            echo "<td><input type='text' class='publico' value='".$producto['precio_publico']."'></td>";
                                            echo "<td><input type='text' class='descuento' value='".$producto['precio_publico_desc']."'></td>";
                                            echo "<td><input type='text' class='cod_barras' value='".$producto['cod_barras_bike']."'></td>";
                                            echo "<td><input type='text' class='cod_gen' value='".$producto['co_generico']."'></td>";
                                            echo "<td><button class='modificar' data-id='".$producto['id_producto']."'>Modificar</button></td>";
                                            // echo "<td><a id='botonEditando'  onclick='modifica(".$producto['id_producto'].")'>Modificar</a></td>";
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

<script type="text/javascript">
    // $('#tablita').editableTableWidget().numericInputExample().find('td:first').focus();
    // $('#tablita').editableTableWidget({editor: $('<input type="text">')});

$(document).ready(function(){
    $(".modificar").click(function(e){
      var nombre=$(this).parent('td').parent('tr').find('.nombre').val();
      var rodada=$(this).parent('td').parent('tr').find('.rodada').val();
      var color=$(this).parent('td').parent('tr').find('.color').val();
      var compra=$(this).parent('td').parent('tr').find('.compra').val();
      var publico=$(this).parent('td').parent('tr').find('.publico').val();
      var descuento=$(this).parent('td').parent('tr').find('.descuento').val();
      var cod_barras=$(this).parent('td').parent('tr').find('.cod_barras').val();
      var co_generico=$(this).parent('td').parent('tr').find('.cod_gen').val();
      $.post('./ejecuta.php',{
        Caso:'1',
        Id:$(this).attr('data-id'),
        Nombre:nombre,
        Rodada:rodada,
        Color:color,
        Compra:compra,
        Publico:publico,
        Descuento:descuento,
        Barras:cod_barras,
        Generico:co_generico
      },function(e){
        alert(e);
        window.location="ver_inventario_bike.php";
        console.log("Holi"+e);
      });

    });
});
 
//  $(document).ready(function() {
//   console.log("Listo");

// var elementos_array  = new Array();
//       var datos_usuario=[];
//       $(".modifica").click(function(){ 
//             var valores=""; 
//             // Obtenemos todos los valores contenidos en los <td> de la fila
//             // seleccionada
//             $(this).parents("tr").find("td").each(function(){
//                 elementos_array.push($(this).html());
//             });
//             console.log("elemenots: "+elementos_array);

//  });
//       });


// function modifica(id){

//       console.log("entre "+id);
//        var elementos_array  = new Array();
//        var customerId = $("#id_"+id).html(); 
//        console.log(customerId);
//        console.log("#id_"+id);
      // var nombre=$(this).parent('td').parent('tr').find('.nombre').val();
      // var rodada=$(this).parent('td').parent('tr').find('.rodada').val();
      // var color=$(this).parent('td').parent('tr').find('.color').val();
      // var compra=$(this).parent('td').parent('tr').find('.compra').val();
      // var publico=$(this).parent('td').parent('tr').find('.publico').val();
      // var descuento=$(this).parent('td').parent('tr').find('.descuento').val();

      // console.log(nombre);
      // console.log(rodada);
      // console.log(color);
      // console.log(compra);
      // console.log(publico);
      // console.log(descuento);


    //   $.ajax({
    //   type: "POST",
    //   dataType: 'html',
    //   url: "ejecuta.php",
    //   data: { "Id":id,"Nombre":nombre,  "Rodada":rodada,  "Color":color,  "Compra":compra,  "Publico":publico,  "Descuento":descuento, "Caso":1},
    //   success: function(resp){
    //     console.log(resp)
    //   }
    // }); 
// }
</script>

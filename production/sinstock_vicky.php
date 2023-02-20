<?php 
  include("header.php");
 ?> 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Productos Sin Stock Vicky Form</h3>
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
                      <button onclick="exportTableToExcel('tablin')" class="btn btn-primary"  >Excel</button>
                      <button onclick="HazCotizacion(5);" class="btn btn-primary">PDF</button>
                      <div class="x_panel">
                        <div class="x_content">
                          <div class="table-responsive" id="tablin">
                            <table id="tablin" class="table table-striped table-bordered bulk_action">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Modelo</th>
                                  <th>Descripción producto</th>
                                  <th>Página</th>
                                  <th>Precio catalogo</th>
                                  <th>Precio afiliado</th>
                                  <th>Talla</th>
                                  <th>Color</th>
                                  <th>Inventario Inicial</th>
                                  <th>Inventario</th>
                                  <th>Codigo de barras</th>
                                </tr>
                              </thead>                            
                              <tbody>
                                <?php 
                                  include("conexion.php");
                                  
                                  $sql = "select * from productos_vicky where inventario_producto = '0' ";
                                  $requi = mysqli_query($conexion,$sql);
                                  while ($reg=mysqli_fetch_array($requi)) {
                                    echo "<tr>";
                                      echo "<th>".$reg['id_producto']."</th>";
                                      echo "<th>".$reg['modelo_vf']."</th>";
                                      echo "<th>".$reg['descripcion_vf']."</th>";
                                      echo "<th>".$reg['pagina_vf']."</th>";
                                      echo "<th>$ ".$reg['precio_catalogo']."</th>";
                                      echo "<th>$ ".$reg['precio_afiliado']."</th>";
                                      echo "<th> ".$reg['talla_vf']."</th>";
                                      echo "<th> ".$reg['color_vf']."</th>";
                                      echo "<th>".$reg['inventario_inicial_producto']."</th>";
                                      echo "<th>".$reg['inventario_producto']."</th>";
                                      echo "<th>".$reg['codigo_barras_producto']."</th>";

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
<script src="js/jspdf.min.js"></script>
<script src="js/html2canvas.js"></script>
<script src="js/jspdf.plugin.autotable.js"></script>
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
      filename = filename?filename+'.xls':'SinStockVickyForm_'+fechita+'.xls';
      
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
function HazCotizacion(id_cotizacion) {
        var f = new Date();
        var fechita = (f.getDate() + "-" + (f.getMonth() +1) + "-" + f.getFullYear());
        var X = 30;
        var Y = 35;
        var salto_linea = 70;
            var doc = new jsPDF('landscape', 'pt', 'letter');
            var logo = new Image();
            var num_cot=id_cotizacion;
            logo.src = 'images/vicky.png';
            doc.addImage(logo, 'JPG', X, Y, 140, 62);
            Y+=salto_linea+10;
            doc.setFontSize(10);
            doc.text("Fecha: "+fechita,X+495,Y-70);
            doc.text("Sin Stock",X+307,Y-20);
            doc.text("Vicky Form",X+300,Y-50);
            doc.setTextColor(255,0,0);//ROJO            
            doc.setTextColor(0,0,0);//negro
            doc.setFontSize(9);
           
            
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#tablin')[0];

            // we support special element handlers. Register them with jQuery-style 
            // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            // There is no support for any other type of selectors 
            // (class, of compound) at this time.
            specialElementHandlers = {
                // element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    // true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: Y,//Y coord
                bottom: 80,
                left: X+25,//X coord
                width: 590
            };
            source.style.fontSize = '8px';

            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            doc.fromHTML(
                    source, // HTML string or DOM elem ref.
                    margins.left, // x coord
                    margins.top, {// y coord
                        'width': margins.width, // max width of content on PDF
                        'elementHandlers': specialElementHandlers
                    },
            function(dispose) {
                
                    Y+=salto_linea+250;
                    doc.setFontSize(11);
                    Y+=salto_linea+120;
                    
                    //doc.textWithLink('Click here', X+250, Y, { url: 'http://www.google.com' });
                    var nombre_cotizacion= "SinStockVickyForm_"+fechita+".pdf"
                doc.save(nombre_cotizacion);
            }
            , margins);
  }

</script>
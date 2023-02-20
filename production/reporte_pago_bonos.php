<?php 
  include("header.php");
 ?> 
 <link href="dist/css/tableexport.css" rel="stylesheet" type="text/css">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte ventas Total para bonos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reportes bonos</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marcas:  <span class="required">*</span>
                      </label>
                       <select class="form control selectpicker" data-show-subtext="true" data-live-search="true" name="socio" id="socio" onchange="funsiona()">      
                       <option value="0"> Todas </option>          
                          <?php 
                            include("conexion.php");
                          $marcas = mysqli_query($conexion,"Select * from marcas");
                          while ($marca=mysqli_fetch_array($marcas)) {
                              $id_marca=$marca["id_marca"];
                              $nombre_marca=$marca["nombre_marca"];

                              echo '<option value="'.$id_marca.'" >'.$nombre_marca.' </option>';
                          }
                            
                            
                           ?>
                        </select>   
                     
                        <br>    
                    </div>
                        <div><br><br>

                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha:  <span class="required">*</span>
                          </label>
                            <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span id="funsiona" onchange="funsiona()"></span> <b class="caret"></b>
                      </div>                       
                        </div>
                     
                      <br><hr>
                          <button onclick="checa();" class="btn btn-warning">Calcular</button>
                      <!--<button onclick="checa();" class="btn btn-primary">Calcular</button>-->
                      <input type="text" id="fecha1" hidden="true">
                      <input type="text" id="fecha2" hidden="true">
                      <div class="table-responsive" id="tabla_reporte">
                        
                      </div> 
                      <button onclick="imprime();" class="btn btn-primary" style="float: right;">Imprimir</button>
                                            
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button onclick="exportTableToExcel('tabla_reporte')" class="btn btn-primary" >Excel</button>
          <!-- <button onclick="HazCotizacion2(5);">PDF</button>-->
        </div>

        <!-- Modal para seleccionar el cliente -->
        <div class="modal fade" id="modalImprime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ticket</h4>
              </div>
              <div class="modal-body">
                <div id="impresion"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo" onclick="imprimeTicket()">Imprimir</button>                                   
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->
<?php 
  include("footer.php");      
?>
<script src="js/jspdf.min.js"></script>
    <!-- <script src="plugins/rasterizeHTML/src/rasterize.js"></script> -->
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
    filename = filename?filename+'.xls':'reporte'+fechita+'.xls';
    
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
function HazCotizacion2(id_cotizacion) {
        var X = 30;
        var Y = 35;
        var salto_linea = 60;
            var doc = new jsPDF('landscape', 'pt', 'letter');
            var logo = new Image();
            var num_cot=id_cotizacion;
            logo.src = 'images/mm5.jpg';
            doc.addImage(logo, 'JPG', X, Y, 140, 62);
            Y+=salto_linea+50;
            doc.setFontSize(8);
            doc.text("Multimarcas",X,Y-40);
            doc.setTextColor(255,0,0);//ROJO            
            doc.text("Cotización #"+num_cot,X+495,Y-90);
            doc.setTextColor(0,0,0);//negro
            doc.text("Especialistas en Redes y Relojes Checadores",X+387,Y-70);
            doc.setFontSize(9);
            doc.text("10-10-10",X+410,Y-20);
            Y+=salto_linea-45;
            doc.setFontSize(12);
            var nombre = "alejandro";
            nombre = nombre.toString().toUpperCase();
            doc.text("Atención: "+nombre,X,Y);
            Y+=salto_linea-30;
            doc.setFontSize(11);
            var textito = "Sirva la presente para hacerle llegar un saludo y así mismo para poner a su atención la siguiente: Propuesta económica en referencia a los productos aquí citados.\n\nPara cualquier duda o aclaración al respecto de la presente propuesta, me reitero a sus apreciables órdenes: ";
            var splitTitle = doc.splitTextToSize(textito, 550);
            doc.text(splitTitle,X,Y);
            Y+=salto_linea;
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#tabla_reporte')[0];

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
            source.style.fontSize = '10px';

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
                    doc.setFontSize(8);
                    doc.setTextColor(44,122,246);//azul
                    doc.text("https://www.cinse.com.mx",X,Y);
                    Y+=salto_linea-45;
                    doc.setTextColor(0,0,0);//negro
                    doc.text("Tel: 5549849345",X,Y);
                    //doc.textWithLink('Click here', X+250, Y, { url: 'http://www.google.com' });
                    var nombre_cotizacion= "cotizacion cinse"+num_cot+".pdf"
                doc.save(nombre_cotizacion);
            }
            , margins);
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
            logo.src = 'images/mm5.jpg';
            doc.addImage(logo, 'JPG', X, Y, 140, 62);
            Y+=salto_linea+10;
            doc.setFontSize(10);
            doc.text("Fecha: "+fechita,X+495,Y-70);
            doc.text("Ventas",X+307,Y-20);
            doc.text("Tiendas",X+300,Y-50);
            doc.setTextColor(255,0,0);//ROJO            
            doc.setTextColor(0,0,0);//negro
            doc.setFontSize(9);
           
            
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#tabla_reporte')[0];

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
                    var nombre_cotizacion= "ReporteVentas_"+fechita+".pdf"
                doc.save(nombre_cotizacion);
            }
            , margins);
  }


  function checa() {
     funsiona(document.getElementById("fecha1").value,document.getElementById("fecha2").value)
  }

    function imprimeTicket(){
     var inicio = document.getElementById("fecha1").value
   var fin = document.getElementById("fecha2").value
    var tik ="TICKET";
    $.ajax({
      type: "POST",
      url: "trae_reporte_sin.php",
      data: {'fecha_inicio': inicio, 'fecha_fin': fin,'id_empleado':empleado,'ticket':tik},  
      success: function(data){        
        if (data==0) {
          $('#tabla_reporte').empty();
          $('#tabla_reporte').append('No hay información');
        }else{
          var myWindow=window.open('','','width=200,height=100');
          myWindow.document.write("<style type='text/css'>@media print {  @page { margin: 0; }  body { margin: 1cm; }}</style>");
           myWindow.document.write(data);
           myWindow.document.close();
           myWindow.focus();
           setTimeout(function() {
              myWindow.print();
              myWindow.close();
            }, 100);
        }        
      }
    });  
  }

  function validaVacio(){
    var ke = document.getElementById("tabla_reporte").innerHTML;
    if (ke=="No hay información") {
      return true;
    }else{
      return false;
    }

  }

  function imprime() {
    validaVacio();
    console.log("vacio: "+validaVacio());
    if (!validaVacio()) {
        var inicio = document.getElementById("fecha1").value
        var fin = document.getElementById("fecha2").value
        var tik ="TICKET";
        $.ajax({
          type: "POST",
          url: "trae_reporte_sin.php",
          data: {'fecha_inicio': inicio, 'fecha_fin': fin,'id_empleado':empleado,'ticket':tik},  
          success: function(data){   
           console.log("respuesta: "+data);
            if (data==0) {
              $('#tabla_reporte').empty();
              $('#tabla_reporte').append('No hay información');
            }else{
              $("#modalImprime").modal();
              $('#impresion').empty();
              $('#impresion').append(data);
            }        
          }
        });
    }else{
      alertify.error("No hay datos para imprimir");
    }
   
  }

  function funsiona(inicio,fin) {
    
    var select = document.getElementById("socio"); //El <select>
    var value = select.value; //El valor seleccionado
    empleado=value;
    console.log("Fecha inicio: "+ inicio+" Fecha fin: "+fin);
     $.ajax({
      type: "POST",
      url: "trae_reporte_sin.php",
      data: {'fecha_inicio': inicio, 'fecha_fin': fin,'id_empleado':empleado},  
      success: function(data){ 
      console.log("data: "+data);
        if (data==0) {
          $('#tabla_reporte').empty();
          $('#tabla_reporte').append('No hay información');
        }else{
          $('#tabla_reporte').empty();
          $('#tabla_reporte').append(data);
        }
        
      }
    });
  }
  var idempleado;
  var fechaini;
  var fechafin;
$(function() {

    var start = moment().subtract(0, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        var select = document.getElementById("socio"); //El <select>
        var value = select.value; //El valor seleccionado
        var text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
        fechaini = start.format('YYYY-MM-DD');
        fechafin = end.format('YYYY-MM-DD');
        console.log("select: "+select+" value: "+value+" Text: "+text);
        document.getElementById("fecha1").value =start.format('YYYY-MM-DD') ;
        document.getElementById("fecha2").value =end.format('YYYY-MM-DD') ;
        funsiona(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'))
    }
    $('#reportrange').daterangepicker({

       "locale": {
            "format": "YYYY-MM-DD",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "opens": "center"
    },cb);

    cb(start, end);

});


</script>
        

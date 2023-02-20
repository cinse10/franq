<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte Apartado General (Productos) Bike Store</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reportes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Empleado:  <span class="required">*</span>
                      </label>
                       <select class="form control selectpicker" data-show-subtext="true" data-live-search="true" name="socio" id="socio" onchange="funsiona()">                
                          <?php 
                            include("conexion.php");
                            $sql = "Select * from empleados";
                            $respuesta = mysqli_query($conexion,$sql);
                            echo '<option value="todos">Mario Hernandez</option>';
                            
                           ?>
                        </select>                          
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
                      <button onclick="checa();" class="btn btn-primary">Calcular</button>
                      <input type="text" id="fecha1" hidden="true">
                      <input type="text" id="fecha2" hidden="true">
                      <div id=tabla_reporte>
                        
                      </div> 
                      <button onclick="imprime();" class="btn btn-primary" style="float: right;">Imprimir</button>                       
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button onclick="exportTableToExcel('tabla_reporte')" class="btn btn-primary" >Excel</button>
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
    filename = filename?filename+'.xls':'reporte_Bicicletas'+fechita+'.xls';
    
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


  function checa() {
     funsiona(document.getElementById("fecha1").value,document.getElementById("fecha2").value)
  }

    function imprimeTicket(){
     var inicio = document.getElementById("fecha1").value
   var fin = document.getElementById("fecha2").value
    var tik ="TICKET";
    $.ajax({
      type: "POST",
      url: "trae_reporte_apartados_productos.php",
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
          url: "trae_reporte_apartados_productos.php",
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
      url: "trae_reporte_apartados_productos.php",
      data: {'fecha_inicio': inicio, 'fecha_fin': fin,'id_empleado':empleado},  
      success: function(data){        
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
        
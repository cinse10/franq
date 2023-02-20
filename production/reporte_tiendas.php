<?php 
  include("header.php");
 ?> 
 <link href="dist/css/tableexport.css" rel="stylesheet" type="text/css">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte ventas Total Tiendas</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reportes Totales</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button onclick="exportTableToExcel('tabla_reporte')" class="btn btn-primary" >Excel</button>
          <!-- <button onclick="HazCotizacion2(5);">PDF</button>-->
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
   // console.log(tableSelect);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'reporte_Totales'+fechita+'.xls';
    
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



  function validaVacio(){
    var ke = document.getElementById("tabla_reporte").innerHTML;
    if (ke=="No hay información") {
      return true;
    }else{
      return false;
    }

  }


  function funsiona(inicio,fin) {
    
    
    
    console.log("Fecha inicio: "+ inicio+" Fecha fin: "+fin);
     $.ajax({
      type: "POST",
      url: "trae_reporte_tiendas.php",
      data: {'fecha_inicio': inicio, 'fecha_fin': fin,'id_empleado':0},  
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
        // var select = document.getElementById("socio"); //El <select>
        // var value = select.value; //El valor seleccionado
        // var text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
        fechaini = start.format('YYYY-MM-DD');
        fechafin = end.format('YYYY-MM-DD');
        // console.log("select: "+select+" value: "+value+" Text: "+text);
        document.getElementById("fecha1").value =start.format('YYYY-MM-DD') ;
        document.getElementById("fecha2").value =end.format('YYYY-MM-DD') ;
        funsiona(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'))
    }
    const cook = document.cookie.includes('id_empleado_gym=10');
   console.log(cook);
    if(cook === true){
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
    }else{
      $('#reportrange').daterangepicker({
     
  "maxDate": "2023-02-28+",
  "minDate":"2023-02-01+",
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
    }
    
    cb(start, end);

});


</script>
        

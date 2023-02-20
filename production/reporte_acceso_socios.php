<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte</h3>
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
                      <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span id="funsiona" onchange="funsiona()"></span> <b class="caret"></b>
                      </div>
                      <br><hr>
                      <div id=tabla_reporte>
                        
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
<script type="text/javascript">
  function funsiona(inicio,fin) {
    console.log("inicio: "+inicio+" fin: "+fin);
    console.log("Fecha inicio: "+ inicio+" Fecha fin: "+fin);
     $.ajax({
      type: "POST",
      url: "trae_reporte_fecha.php",
      data: {'fecha_inicio': inicio, 'fecha_fin': fin},  
      success: function(data){        
        $('#tabla_reporte').empty();
        $('#tabla_reporte').append(data);
        $('#tablita_reporte').DataTable( {
          "order": [[ 2, 'desc' ]]
        });
      }
    });
  }
$(function() {

    var start = moment().subtract(7, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
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
        
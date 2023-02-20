<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte del día</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <hr>
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
 function traeFecha(){
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();
    var hh = hoy.getHours();
    var min = hoy.getMinutes();
    var ss = hoy.getSeconds();
    //hh =addZero(hh);
    //min =addZero(min);
    //ss =addZero(ss);

    //var cad=hh+":"+min+":"+ss; 
    dd=addZero(dd);
    mm=addZero(mm);

    //return dd+"/"+mm+"/"+yyyy;
    return yyyy+"/"+mm+"/"+dd;
  }
  function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
  } 

 $(function(){
    var actualizaReporte = function(){
      $.ajax({
      type: "POST",
        url: "trae_reporte_acceso.php",
        data: {'fecha': traeFecha},  
        success: function(data){        
          console.log("el ID del ticket es: "+data);
          if (data==0) {
            $('#tabla_reporte').empty();
            $('#tabla_reporte').append('No hay información');
          }else{
            $('#tabla_reporte').empty();
            $('#tabla_reporte').append(data);
          }
          
        }
      });
      };      
      actualizaReporte();     
      var clase = setInterval(actualizaReporte,1000);
    });
</script>
        
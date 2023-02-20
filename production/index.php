<?php 
  
  $IP = $_SERVER['REMOTE_ADDR'];
  //echo $IP;
 /* if($IP != "177.241.178.206" && $IP != "187.189.246.105" && $IP != '189.203.102.249' && $IP != '177.247.113.226' && $ip != '187.190.154.141')
{
    header('Location:404.php');
  }*/
  
  //$salida = shell_exec('ifconfig');
  /*echo "<pre>$salida</pre>"; 
  $mac= '2C-33-7A-25-23-B9';
if(strpos($salida, $mac)){

  echo 'Con acceso';
}else{
  echo "Sin acceso";
}*/

  include("header.php");
  

 ?> 
     <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/themes/default.css">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte del día:
                <?php
                  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                  echo $dias[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                ?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
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
<script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>
<script src="../../sweetalert.min.js"></script>
<script type="text/javascript">
  //Funcion que devuelve la fecha en formato año / mes /día
 function traeFecha(){
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();
    var hh = hoy.getHours();
    var min = hoy.getMinutes();
    var ss = hoy.getSeconds();

    dd=addZero(dd);
    mm=addZero(mm);

    //return dd+"/"+mm+"/"+yyyy;
    return yyyy+"/"+mm+"/"+dd;
  }
  //Agrega ceros a la fecha ingresada
  function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
  } 
  var socios_aux=[];
  var jsonObj=[];
 //Función que compara un arreglo auxiliar, con el de tiempo real, para detectar nuevos registros.
function BuscaNuevo2() {
  //if(socios_aux.length!=0){ 
    if (jsonObj.length!=socios_aux.length) {
      var dif = jsonObj.length-socios_aux.length;
      if (dif==1) {
        alertify.success(jsonObj[socios_aux.length].nombre_socio);
        swal({
          title: jsonObj[socios_aux.length].nombre_socio,
          text: jsonObj[socios_aux.length].fecha,
          icon: jsonObj[socios_aux.length].fotografia,
        });
      }
    }    
  //}
}
/**
//cuando la página está lista, trae los reportes de acceso por fecha y nos imprime un JSON
 $(document).ready(function(){
  socios_aux=[];
  jsonObj=[];
   $.ajax({
      type: "POST",
        url: "trae_reporte_pago.php",
        data: {'fecha': traeFecha,'action': "porid"},  
        success: function(data){  
          if (data==0) {
            socios_aux=[];
          }else{
            jsonObj = JSON.parse(data);
            socios_aux=jsonObj;
          }          
        }
      });
   });
//Funcion que trae un JSON con el listado de socios ingresados
function traeAcceso() {
   $.ajax({
      type: "POST",
        url: "trae_reporte_pago.php",
        data: {'fecha': traeFecha,'action': "porid"},  
        success: function(data){ 
          jsonObj = JSON.parse(data);
          BuscaNuevo2();    
          if (data==0) {
            socios_aux=[];
          }else{
            socios_aux=jsonObj;
          }
        }
      });
}
//Función que se ejecuta cada segundo, para mostrar el listado de socios ingresados en el día
 $(function(){
    var actualizaReporte = function(){
      $.ajax({
      type: "POST",
        url: "trae_reporte_pago.php",
        data: {'fecha': traeFecha},  
        success: function(data){        
          if (data==0) {
            $('#tabla_reporte').empty();
            $('#tabla_reporte').append('No hay accesos');
          }else{
            $('#tabla_reporte').empty();
            $('#tabla_reporte').append(data);
            $('#tablita_chida').DataTable( {
              "order": [[ 0, 'desc' ]]
            });
          }
          traeAcceso();
        }
      });
      
      };      
      actualizaReporte();     
      var clase = setInterval(actualizaReporte,1000);
    });
*/



</script>


  
<!-- footer content -->
        <footer>
          <div class="pull-right">
            Franquicias | <a href="https://mt8.com.mx">MM5</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
        
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Editable Table Plugin Js -->
    <script src="../vendors/editable-table/mindmup-editabletable.js"></script> 
    
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../sweetalert.min.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        setTimeout(refrescar, 6000000);
        if(!validaSiHayCookie()){
             $("#modalLoginForm").modal();
                setTimeout(function(){
                document.getElementById("id_acceso").focus();
            }, 1000);
        }
          function refrescar(){
            //Actualiza la página
            location.reload();

          }
        var id_de_empleado=0;
      });       
    </script>
    <script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript">

        function eliminaCookie(){
            createCookie("empleado_gym", "", -5);
            createCookie("id_empleado_gym", "", -5);
            location.reload();
        }
        function validaSiHayCookie(){
            var valido = false;
            var lasCookies = document.cookie;
            if (lasCookies=="") {
                return false;
            }else{
                let ca = document.cookie.split(";");
                for (var i = 0; i < ca.length; i++) {
                    var kukie = ca[i].split("=");
                    switch(kukie[0]){
                        case "PHPSESSID":
                        break;
                        case " id_empleado_gym":
                            id_de_empleado=kukie[1];                                                        
                            createCookie("id_empleado_gym", id_de_empleado, 25);
                        break;
                        case "id_empleado_gym":
                            id_de_empleado=kukie[1];                            
                            createCookie("id_empleado_gym", id_de_empleado, 25);
                        break;
                        case  " empleado_gym":
                            var nombre_kukie=kukie[0];
                            var nombre=kukie[1].split(";");
                            var nombre_empleado = nombre[0];

                            document.getElementById("id_nombre_empleado1").append(nombre_empleado);
                            createCookie("empleado_gym", nombre_empleado, 25);
                            valido = true;
                        break;
                        case  "empleado_gym":
                            var nombre_kukie=kukie[0];
                            var nombre=kukie[1].split(";");
                            var nombre_empleado = nombre[0];
                            document.getElementById("id_nombre_empleado1").append(nombre_empleado);
                            createCookie("empleado_gym", nombre_empleado, 25);
                            valido = true;
                            document.cookie = "empleado_gym=nombre_empleado;max-age=0;path=/franq/production"
                        break;
                    }                     
                }                             
            }
            return valido;
        }

        function createCookie(name,value,minutes) {
            if (minutes) {
                var date = new Date();
                date.setTime(date.getTime()+(minutes*60*1000));
                var expires = "; expires="+date.toGMTString();
            } else {
                var expires = "";
            }
            document.cookie = name+"="+value+expires+"; path=/";
        }
    </script>
    <script type="text/javascript">
      var socios_aux;
      var jsonObj;
      function validarLogin(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==13){
          RegistrarLogin();
        }else{
        }
      }
      function RegistrarLogin(){
        var id_acceso = $("#id_acceso").val();   
        var user = $("#user").val(); 
        console.log(id_acceso);   
        $.ajax({
          type: "POST",
          dataType: 'html',
          url: "valida_usuario.php",
          data: {"id_acceso": id_acceso, "user":user},
          success: function(resp){
            console.log("Respuesta: "+resp);
           if (resp==0 ) {
            //No encontrado
            document.getElementById("id_acceso").value = "";
            document.getElementById("id_acceso").focus();
            swal("Empleado no encontrado, intenta de nuevo", {
              buttons: false,
              icon: "warning",
              timer: 1500,
            });

           }else{
            //encontrado
            var datos = resp.split("|");
            id_de_empleado=datos[0];
            document.getElementById("id_acceso").value = "";
            document.getElementById("id_acceso").focus();
            swal("Bienvenido: "+datos[1], {
              buttons: false,
              icon: "success",
              timer: 1000,
            });
            setTimeout(function(){
                $("#modalLoginForm").modal("hide"); 
                location.reload();
            }, 1000);
            createCookie("empleado_gym", datos[1], 5);
            createCookie("id_empleado_gym", datos[0], 5);
            document.getElementById("id_nombre_empleado1").append(datos[1]);

            
           }
          }
        });      
      }   
    </script>
    <script type="text/javascript">

         $( document ).ready(function() {
            var pathname = window.location.pathname;
            var rutilla = pathname.split("/");
            if (rutilla[3]=="index.php") {
            }else{
                 $(function(){
                    var actualizaReporte = function(){
                        // traeAcceso();                      
                      };      
                      actualizaReporte();     
                      var clase = setInterval(actualizaReporte,1000);
                    });  
            }
          });  
        //Funcion que trae un JSON con el listado de socios ingresados
        var socios_aux=[];
        function traeAcceso() {
          // console.log("voy a traer");
           $.ajax({
              type: "POST",
                url: "trae_reporte_acceso.php",
                data: {'fecha': obtenFecha,'action': "porid"},  
                success: function(data){ 
                  jsonObj = JSON.parse(data);
                   // console.log("data: "+data);
                   // console.log("\n");
                  BuscaNuevo();    
                  if (data!=0) {
                    console.log("iguale");
                    socios_aux=jsonObj;
                  }else{
                    console.log("no iguale");
                    socios_aux=[];
                  }
                }
              });
        }
         //Función que compara un arreglo auxiliar, con el de tiempo real, para detectar nuevos registros.
        function BuscaNuevo() {
          if(socios_aux.length!=0){ 
            if (jsonObj.length!=socios_aux.length) {
              var dif = jsonObj.length-socios_aux.length;
              console.log("json: "+jsonObj.length);
              console.log("socios_aux: "+socios_aux.length);
              console.log("dif: "+dif);
              if (dif==1) {
                alertify.set('notifier','position', 'top-right');
                alertify.set('notifier','delay', 10);
                var not = alertify.success(jsonObj[socios_aux.length].nombre_socio);
                var nombre = jsonObj[socios_aux.length].nombre_socio;
                var fechilla = jsonObj[socios_aux.length].fecha;
                var fotillo = jsonObj[socios_aux.length].fotografia;
                not.callback = function (isClicked) {
                    if(isClicked){
                        swal({
                          title: nombre,
                          text: fechilla,
                          icon: fotillo,
                        });
                    }
                 };
              }
            }    
          }
        }
        //Funcion que devuelve la fecha en formato año / mes /día
         function obtenFecha(){
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
    </script>
  </body>
</html>


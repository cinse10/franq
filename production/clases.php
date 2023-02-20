<?php 
  include("header.php");
 ?> 


  <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/select2/css/select2.css">

  <script src="tabladinamica/librerias/jquery-3.2.1.min.js"></script>
  <script src="tabladinamica/js/funciones.js"></script>
  <script src="tabladinamica/librerias/bootstrap/js/bootstrap.js"></script>
  <script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>
  <script src="tabladinamica/librerias/select2/js/select2.js"></script>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de clases</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clases</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                          <div class="table-content">
                            <div id="tabla"></div> 
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
        <!-- Modal para registros nuevos -->
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agrega nuevo horario</h4>
              </div>
              <div class="modal-body">
                  <label>Horario</label>
                  <input type="text" name="" id="horario" class="form-control input-sm">
                  <label>lunes</label>
                  <input type="text" name="" id="lunes" class="form-control input-sm">
                  <label>martes</label>
                  <input type="text" name="" id="martes" class="form-control input-sm">
                  <label>miercoles</label>
                  <input type="text" name="" id="miercoles" class="form-control input-sm">
                  <label>jueves</label>
                  <input type="text" name="" id="jueves" class="form-control input-sm">
                  <label>viernes</label>
                  <input type="text" name="" id="viernes" class="form-control input-sm">
                  <label>sabado</label>
                  <input type="text" name="" id="sabado" class="form-control input-sm">
                  <label>domingo</label>
                  <input type="text" name="" id="domingo" class="form-control input-sm">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                Agregar
                </button>                                   
              </div>
            </div>
          </div>
        </div>

        <!-- Modal para edicion de datos -->

        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
              </div>
              <div class="modal-body">
                  <input type="text" hidden="" id="id_clase" name="">
                  <label>Horario</label>
                  <input type="text" name="" id="horariou" class="form-control input-sm">
                  <label>lunes</label>
                  <input type="text" name="" id="lunesu" class="form-control input-sm">
                  <label>martes</label>
                  <input type="text" name="" id="martesu" class="form-control input-sm">
                  <label>miercoles</label>
                  <input type="text" name="" id="miercolesu" class="form-control input-sm">
                  <label>jueves</label>
                  <input type="text" name="" id="juevesu" class="form-control input-sm">
                  <label>viernes</label>
                  <input type="text" name="" id="viernesu" class="form-control input-sm">
                  <label>sabado</label>
                  <input type="text" name="" id="sabadou" class="form-control input-sm">
                  <label>domingo</label>
                  <input type="text" name="" id="domingou" class="form-control input-sm">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
                
              </div>
            </div>
          </div>
        </div> 

       
        
<?php 
  include("footer.php");
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          horario=$('#horario').val();
          lunes=$('#lunes').val();
          martes=$('#martes').val();
          miercoles=$('#miercoles').val();
          jueves=$('#jueves').val();
          viernes=$('#viernes').val();
          sabado=$('#sabado').val();
          domingo=$('#domingo').val();
            agregardatos(horario,lunes,martes,miercoles,jueves,viernes,sabado,domingo);
        });




        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>

  <?php 
    if ($clases==0) {
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

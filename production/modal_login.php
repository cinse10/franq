<style type="text/css">
  .modal{
        text-align:center;
        padding:0!important; 
        background-color: rgba(0,0,0,0.9);        
    }
    .modal:before{
        content:'';
        display:inline-block;
        height:100%;
        vertical-align:middle;
        margin-right: -4px;
    }
    .modal-dialog{
        display:inline-block;
        text-align:left;
        vertical-align:middle;
    }
</style>
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Digita tus credenciales de acceso</h4>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Usuario: </label>
          <input type="text" id="user" class="form-control validate" autofocus="autofocus" >
          <label data-error="wrong" data-success="right" for="defaultForm-email">Contraseña: </label>
          <input type="password" id="id_acceso" class="form-control validate" onkeypress="validarLogin(event)">
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
//let user = document.querySelector('#user');
  //let cokie1 =  document.cookie = "id_empleado_gym= user; expires=Fri, 28 may 9999 23:59:59 GMT";
  //let cokie2 =  document.cookie = "empleado_gym=user; expires=Fri, 28 may 9999 23:59:59 GMT";
</script>


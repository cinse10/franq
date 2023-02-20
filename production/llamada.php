<?php 
    include("header.php");
    if (isset($_GET['nombre'])&isset($_GET['tel_cliente'])) {
        $nombre=$_GET['nombre'];
        $tel_cliente=$_GET['tel_cliente'];
        $email=$_GET['email'];
        $otra_info=$_GET['otra_info'];
        $fecha_seguimiento=$_GET['fecha_seguimiento'];
    }else{
        $nombre="";
        $tel_cliente="";
        $email="";
        $otra_info="";
        //obtenemos de sistema la fecha de hoy
        $fecha_actual = date("d-m-Y");
        $fecha_seguimiento = date("d-m-Y",strtotime($fecha_actual."+ 3 days"));
        

    }
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Registro de llamada</h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line ">
                                    <input type="text" class="form-control" name="tel_cliente" id="tel_cliente" required="" aria-required="true" wtx-context="8650AAEE-4AFB-46D9-8348-5BA697EC62DB" value="<?php echo $tel_cliente; ?>">
                                    <label class="form-label">Número de teléfono</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nombre" id="nombre" id="nombre" required="" aria-required="true" wtx-context="B184D92C-7989-4EAD-9FF4-ACC478EBE946" value="<?php echo $nombre; ?>">
                                    <label class="form-label">Nombre</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" id="email" required="" aria-required="true" wtx-context="3D63CBB1-0B31-4A03-A2AE-C38914B7CE33" value="<?php echo $email; ?>">
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <label class="form-label">Interés</label> 
                            <br><hr>
                            <div class="form-group">                                    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                   <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="producto" name="producto">
                                        <option value=""> Selecciona una producto </option>
                                        <?php 
                                            include("conexion.php");
                                            $productos = mysqli_query($conexion,"SELECT * FROM `productos` INNER JOIN categorias ON productos.id_categoria=categorias.id_categoria WHERE id_empleado=".$id_empleado."");
                                            while ($producto=mysqli_fetch_array($productos)) {
                                                $id_producto=$producto["id_producto"];
                                                $nombre_producto=$producto["nombre_producto"];
                                                $precio_producto=$producto["precio_producto"];

                                                echo '<option value="'.$id_producto.'" id="'.$id_producto.'" data-subtext="$'.$precio_producto.'">'.$nombre_producto.'</option>';
                                            }
                                        ?>
                                    </select>
                                   <button class="btn btn-primary" onclick="AgregaLista();">Agregar</button>
                                </div>
                            </div>
                            <div id="productos">
                                <table id="tablita" class="table table-striped">
                                    <thead>
                                        <th>Nombre producto</th>
                                        <th>Cant.</th>
                                        <th>P. <br>Unitario</th>
                                        <th id="borrar">Eliminar</th>
                                    </thead>
                                    <tbody>
                                        <div id="respuesta"></div>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="uneditable" style=" border:0;"></td>
                                            <td  class="uneditable" style=" border:0;"><p style="font-weight: bold; font-size:20px;">Sub total: </p></td>
                                            <td id="tdsubtotal" style="font-weight: bold; font-size:20px;"></td>
                                            <td class="uneditable"></td>
                                        </tr>
                                        <tr>
                                            <td class="uneditable" style=" border:0;"></td>
                                            <td  class="uneditable"><p style="font-weight: bold; font-size:20px;">IVA: </p></td>
                                            <td id="iva" style="font-weight: bold; font-size:20px;"></td>
                                            <td class="uneditable"></td>
                                        </tr>
                                        <tr>
                                            <td class="uneditable" style=" border:0;"></td>
                                            <td  class="uneditable"><p style="font-weight: bold; font-size:20px;">Total: </p></td>
                                            <td id="tdtotal" style="font-weight: bold; font-size:20px;"></td>
                                            <td class="uneditable"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <hr>
                            <br>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="otra_info" id="otra_info" cols="30" rows="2" class="form-control no-resize" required="" aria-required="true"><?php echo $otra_info; ?></textarea>
                                    <label class="form-label">Notas</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="estatus" id="estatus">
                                        <option value="">-- Estatus --</option>
                                        <option value="Abierta">Abierta</option>
                                        <option value="Cerrada">Cerrada</option>
                                        <option value="Despues">Llamar después</option>
                                        <option value="Facturado">Facturado</option>
                                        <option value="Pagado">Pagado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <div class="input-group date" id="fecha">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="fecha_seguimiento" id="fecha_seguimiento" placeholder="Selecciona una fecha de siguiente llamada" autocomplete="off" value="<?php echo $fecha_seguimiento;   ?>">
                                        </div>
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="text" id="id_empleado" name="id_empleado" value="<?php echo $id_empleado; ?>" hidden>
                            <button class="btn btn-primary waves-effect" type="submit" onclick="guardaCotizacion();">Guardar</button>                            
                        </div>
                    </div>
                </div>
    </section>

<?php 
    include("footer.php");
?>

<script type="text/javascript">
    function eliminaColumna() {
         $("#tablita tr").find("th:eq(3), td:eq(3)").remove();

    }
</script>
<script type="text/javascript">
    function traeID(){  
        $('#tablita tbody').find('tr').each(function(i, el){ 
            val = $(this).find('td').eq(0).text();
            console.log("Val: "+val);
        });
    }
</script>
<script type="text/javascript">
    function HazCotizacion(id_cotizacion) {
        ponNumeros();
        eliminaColumna();
        traeID();
        var X = 30;
        var Y = 35;
        var salto_linea = 60;
            var doc = new jsPDF('p', 'pt', 'letter');
            var logo = new Image();
            var fondo = new Image();
            fondo.src = 'images/fondo.jpg';
            doc.addImage(fondo, 'JPG', 0, 0, 0, 0);
            var num_cot=id_cotizacion;
            logo.src = 'images/login.jpeg'; 
            doc.addImage(logo, 'JPG', X, Y, 160, 68);
            Y+=salto_linea+58;
            doc.setFontSize(8);
            doc.text("Consultora Integral en Sistemas Electrónicos",X,Y-40);
            doc.setTextColor(255,0,0);//ROJO            
            doc.text("Cotización #"+num_cot,X+470,Y-90);
            doc.setTextColor(0,0,0);//negro
            doc.text("Especialistas en Redes y Relojes Checadores",X+365,Y-70);
            doc.setFontSize(9);
            doc.text(traeFecha(),X+408,Y-50);
            doc.setFontSize(10);
            var ventas = "Ventas: David A. Garcia Reyes\nTel: 55 4984 9345\nCorreo: ventas@cinse.com.mx"
            doc.text(ventas,418,130);
            Y+=salto_linea-45;
            doc.setFontSize(12);
            var nombre = document.getElementById("nombre").value;
            nombre = nombre.toString().toUpperCase();
            doc.text("Atención: "+nombre,X,Y+3);
            Y+=salto_linea-28;
            doc.setFontSize(11);
            var textito = "Sirva la presente para hacerle llegar un saludo y así mismo para poner a su atención la siguiente: Propuesta económica en referencia a los productos aquí citados.\n\nPara cualquier duda o aclaración al respecto de la presente propuesta, me reitero a sus apreciables órdenes: ";
            var splitTitle = doc.splitTextToSize(textito, 550);
            doc.text(splitTitle,X,Y);
            Y+=salto_linea;
            // source can be HTML-formatted string, or a reference
            // to an actual DOM element from which the text will be scraped.
            source = $('#productos')[0];

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
                var info = "Para consultar nuestros productos, visita nuestra página: ";
                    Y+=salto_linea+200;
                    doc.setFontSize(10);
                    doc.text(info,X+75,Y);
                    doc.setTextColor(44,122,246);//azul
                    doc.setFontSize(11);
                    var sitio = "www.cinse.com.mx";
                    doc.text(sitio,360,Y);
                    doc.setTextColor(0,0,0);//negro
                var cuentas = "Cuentas Bancarias:\n\nBBVA Sucursal 1013\nCuenta Bancomer 2706165117\nClabe interbancaria Bancomer 012 180 027061651172\n\nHSBC Sucursal 00099\nCuenta HSBC 6252726221\nClabe Interbancaria HSBC 021180062527262213\n\nA nombre de:\nJose Eduardo  Mercado Salgado";
                    Y+=40;
                    doc.setFontSize(11);
                    doc.text(cuentas,X,Y);
                    Y+=salto_linea+120;
                    doc.setFontSize(8);
                    doc.setTextColor(44,122,246);//azul
                    doc.text("https://www.cinse.com.mx",X,Y);
                    Y+=salto_linea-45;
                    doc.setTextColor(0,0,0);//negro
                    doc.text("Tel: 722 489 9488",X,Y);
                    //doc.textWithLink('Click here', X+250, Y, { url: 'http://www.google.com' });
                    var nombre_cotizacion= "cotizacion cinse"+id_cotizacion+".pdf"
                doc.save(nombre_cotizacion);
            }
            , margins);
        }
</script>
<script type="text/javascript">
      function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
      }
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

        var weekday = new Array(7);
        weekday[0] =  "Domingo";
        weekday[1] = "Lunes";
        weekday[2] = "Martes";
        weekday[3] = "Miércoles";
        weekday[4] = "Jueves";
        weekday[5] = "Viernes";
        weekday[6] = "Sábado";

        var dia = weekday[hoy.getDay()];

        var month = new Array();
        month[0] = "Enero";
        month[1] = "Febrero";
        month[2] = "Marzo";
        month[3] = "Abril";
        month[4] = "Mayo";
        month[5] = "Junio";
        month[6] = "Julio";
        month[7] = "Agosto";
        month[8] = "Septiembre";
        month[9] = "Octubre";
        month[10] = "Noviembre";
        month[11] = "Diciembre";
        var mes = month[hoy.getMonth()];


        var ampm = hh >= 12 ? 'pm' : 'am';
        hh = hh % 12;
        hh = hh ? hh : 12; // the hour '0' should be '12'
        min = min < 10 ? '0'+min : min;
        hh=addZero(hh);
        var strTime = hh + ':' + min + ' ' + ampm;

       // return dia+"  "+dd+" de "+mes+" de "+yyyy+"\n"+strTime;
        return dia+",  "+dd+" de "+mes+" de "+yyyy;
      }
    $( document ).ready(function() {
        console.log( "ready!" );
        $('#tablita').editableTableWidget({editor: $('<input type="text">')});
    });

    $('#tablita td.uneditable').on('change', function(evt, newValue) {
        console.log("cambió");
        return false;
    });

    $('.precio').on('change', function(evt, newValue) {
        console.log("cambió");
    });
    $('#tablita').on('change', function(evt, newValue) {
        newValue = newValue.replace("$ ","");
        newValue = newValue.replace("$","");
        if (isNaN(newValue)) {
            return false;
        }else{
            if (newValue>0) {
                if (parseInt(newValue)) {
                    Limpiar();
                    Cargar();
                    Suma();
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    });
    function ponNumeros() {
        $('#tablita tbody').find('tr').each(function(i, el){ 
            val = $(this).find('td').eq(2).text();
            var numero = parseFloat(val.replace("$ ",""));
            console.log("num: "+val);
            $(this).find('td').eq(2).text(formatNumber.new(numero.toFixed(2), "$"));
            numero=0;
        });
    }

    $('#fecha').datepicker({
        autoclose: true,
        container: '#fecha',
        language: 'es',
        format: 'dd-mm-yyyy',
        startDate: new Date()
    });

    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        alertify.warning("Producto eliminado.");
        Limpiar();
        Cargar();
        Suma();
      });

    function AgregaLista() {
        var select = document.getElementById("producto"); //El <select>
        var value = select.value; //El valor seleccionado
        $.ajax({
          type: "POST",
          dataType: 'html',
          url: "trae_productos.php",
          data: "id_producto="+value,
          success: function(resp){
            $('#tablita').append(resp);
            Limpiar();
            Cargar();
            Suma();
            $('#tablita').editableTableWidget({editor: $('<input type="text">')});
          }
        });      
    }
    function guardaCotizacion(){
        var nombre = document.getElementById("nombre").value;
        nombre = nombre.toString().toUpperCase();
        $.ajax({
          type: "POST",
          dataType: 'html',
          url: "guarda_cotizacion.php",
          data: "nombre="+nombre,
          success: function(resp){
            if (isNaN(resp)) {
                $('#tablita').append(resp);
            }else{
                var id_cotizacion = resp;
                guarda_productos(id_cotizacion);
            }
          }
        });
    }
    function guarda_productos(id_cotizacion) {
        var error=0;
        $('#tablita tbody').find('tr').each(function(i, el){ 
            nombre_producto = $(this).find('td').eq(0).text();
            cantidad = $(this).find('td').eq(1).text();
            costo_producto = $(this).find('td').eq(2).text();
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "guarda_productos_cotizacion.php",
                data: {"id_cotizacion":id_cotizacion,
                "nombre_producto":nombre_producto,
                "cantidad":cantidad,
                "costo_producto":costo_producto},
                success: function(resp){
                    if (resp!=1) {
                        $('#tablita').append(resp);
                        error=1;    
                    }else{
                        
                    }
                    
                }
            });

        });
        if (error==0) {
            HazCotizacion(id_cotizacion);
            guarda_llamada(id_cotizacion);
        }
    }
    function guarda_llamada(id_cotizacion) {
        var nombre = document.getElementById("nombre").value;
        nombre = nombre.toString().toUpperCase();
        var tel_cliente = document.getElementById("tel_cliente").value;
        var email = document.getElementById("email").value;
        var otra_info = document.getElementById("otra_info").value;
        var estatus = document.getElementById("estatus").value;
        var fecha_seguimiento = document.getElementById("fecha_seguimiento").value;
        var id_empleado=document.getElementById("id_empleado").value;
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "guarda_llamada.php",
            data: {
            "id_cotizacion":id_cotizacion,
            "nombre":nombre,
            "tel_cliente":tel_cliente,
            "email":email,
            "otra_info":otra_info,
            "estatus":estatus,
            "fecha_seguimiento":fecha_seguimiento,
            "id_empleado":id_empleado},
            success: function(resp){
                if (resp!=1) {
                    $('#tablita').append(resp);
                }else{
                    alert("Guardado con exito.");

                    if (confirm("¿Deseas agregar otra cotización?")) {
                        window.location.href = "llamada.php?nombre="+nombre+"&tel_cliente="+tel_cliente+"&email="+email+"&otra_info="+otra_info+"&fecha_seguimiento="+fecha_seguimiento;
                    }else{
                        window.location.href = "llamada.php";
                    }
                }
                
            }
        });
    }
    var formatNumber = {
     separador: ",", // separador para los miles
     sepDecimal: '.', // separador para los decimales
     formatear:function (num){
     num +='';
     var splitStr = num.split('.');
     var splitLeft = splitStr[0];
     var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
     var regx = /(\d+)(\d{3})/;
     while (regx.test(splitLeft)) {
     splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
     }
     return this.simbol + splitLeft +splitRight;
     },
     new:function(num, simbol){
     this.simbol = simbol ||'';
     return this.formatear(num);
     }
    }
    function Suma(){  
        suma=0; 
        cantidad=0;
        iva=0;
        $('#tablita tbody').find('tr').each(function(i, el){ 
            val = $(this).find('td').eq(2).text();
            cantidad = $(this).find('td').eq(1).text();
            suma += parseFloat(val.replace("$ ","")*cantidad);
        });
        $('#tdsubtotal').text(formatNumber.new(suma.toFixed(2), "$"));
        iva = suma*0.16;
        $('#iva').text(formatNumber.new(iva.toFixed(2), "$"));
        total = suma + iva;
        $('#tdtotal').text(formatNumber.new(total.toFixed(2), "$"));

    }

    function Cargar(){
        $('#datagrid').load('trae_productos.php');    
    }
    function Limpiar(){
        $("#codigo_barras").val("");
    }

</script>
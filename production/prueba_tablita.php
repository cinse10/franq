<?php include("header.php"); ?>
<table id="tblReporte" onclick="exportTableToExcel();">
	<thead>
	      <tr>
	        <th>ID ticket</th>
	        <th>Cliente</th>
	        <th>Empleado</th>
	        <th>Marca</th>
	        <th>Forma de pago</th>
	        <th>Fecha</th>
	        <th>Total</th>
	      </tr>
	  </thead>
	  <tbody>
	    <tr>
	    	<td>6</td>
	    	<td>CLIENTE PREFERENCIAL </td>
	    	<td>Mario Hernandez</td>
	    	<td>Mi Sentir</td>
	    	<td>EFECTIVO</td>
	    	<td>2020-04-29 14:32:01</td>
	    	<td>100</td>
	    </tr>
	    <tr>
	    	<td>34</td>
	    	<td>PUBLICO EN GENERAL </td>
	    	<td>Mario Hernandez</td>
	    	<td>Bike Store</td>
	    	<td>TARJETA</td>
	    	<td>2020-04-29 16:14:12</td>
	    	<td>854</td>
	    </tr>
	    <tr>
	    	<td>21</td>
	    	<td>GABRIELA  MARTINEZ</td>
	    	<td>Virginia Padua</td>
	    	<td>Intima Hogar</td>
	    	<td>EFECTIVO</td>
	    	<td>2020-04-29 11:10:23</td>
	    	<td>1454</td>
	    </tr>
	    <tr>
	    	<td>22</td>
	    	<td>MAGDALENA  VELAZQUEZ</td>
	    	<td>Virginia Padua</td>
	    	<td>Intima Hogar</td>
	    	<td>EFECTIVO</td>
	    	<td>2020-04-29 11:26:58</td>
	    	<td>12</td>
	    </tr>
	    <tr>
	    	<td>23</td>
	    	<td>MA. CARMEN VEGA</td>
	    	<td>Virginia Padua</td>
	    	<td>Intima Hogar</td>
	    	<td>TARJETA</td>
	    	<td>2020-04-29 13:39:15</td>
	    	<td>1159</td>
	    </tr>
	    <tr>
	    	<td>24</td>
	    	<td>CLIENTE PREFERENCIAL </td>
	    	<td>Virginia Padua</td>
	    	<td>Intima Hogar</td>
	    	<td>EFECTIVO</td>
	    	<td>2020-04-29 14:22:54</td>
	    	<td>24</td>
	    </tr>
	    <tr>
	    	<td>25</td>
	    	<td>CLIENTE PREFERENCIAL </td>
	    	<td>Virginia Padua</td>
	    	<td>Intima Hogar</td>
	    	<td>EFECTIVO</td>
	    	<td>2020-04-29 18:49:54</td>
	    	<td>12</td>
	    </tr>
	    <tr>
			<td></td>					
			<td></td>					
			<td></td>					
			<td></td>					
			<td></td>					
			<td style='font-weight: bold; font-size:20px;'>Total</td>					
			<td style='font-weight: bold; font-size:20px;'>3615</td>					
		</tr>
	</tbody>
</table>
<?php include("footer.php"); ?>

<script type="text/javascript">
  function exportTableToExcel(){
    //Creamos un Elemento Temporal en forma de enlace
        var tmpElemento = document.createElement('a');
        // obtenemos la información desde el div que lo contiene en el html
        // Obtenemos la información de la tabla
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('tblReporte');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        tmpElemento.href = data_type + ', ' + tabla_html;
        //Asignamos el nombre a nuestro EXCEL
        tmpElemento.download = 'Nombre_De_Mi_Excel.xls';
        // Simulamos el click al elemento creado para descargarlo
        tmpElemento.click();
	}
</script>
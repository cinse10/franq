<?php  
    $html = "<p><strong>DESCRIPCION </strong></p>
<p>BICICLETA EXECUTOR SD, COLOR AZUL, RODADA 29 </p>
<p>INCREIBLE BICICLETA PARA CABALLERO </p>
<p><br />Marca: BR <br />Modelo: DEFENDER SD<br />G&eacute;nero: Masculino <br />Rodada: &ldquo;29&rdquo; <br />Cantidad de velocidades: &ldquo;21&rdquo;<br />Tipo de freno delantero: V-brake<br />Tipo de freno trasero: V-brake<br />Edad: Adultos<br />Tipo de bicicleta: Bicicleta de monta&ntilde;a<br />Materiales del cuadro: acero<br />Tres capas de pintura en polvo<br />Calcomania bajo barniz</p>";  
    
    $res = str_replace( '<br />',"\n",  $html );
    $txt = strip_tags($res);  
    // El resultado será:  
    // $txt = "Este es un parrafo con etiquetas html que queremos eliminar";  
    echo $res;
echo "<hr>";
echo $txt;

?> 
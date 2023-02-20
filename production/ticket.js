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
    

    var ampm = hh >= 12 ? 'pm' : 'am';
    hh = hh % 12;
    hh = hh ? hh : 12; // the hour '0' should be '12'
    min = min < 10 ? '0'+min : min;
    var strTime = hh + ':' + min + ' ' + ampm;

    return dd+"/"+mm+"/"+yyyy+"<br>"+strTime;
  }
  function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
  }
  function traeDireccion(){
    return "Av Morelos Ote 704 <br>Barrio de la Veracruz<br>Zinacantepec, Estado de México<br>CP:51350";
  }
  function separador(){
    return "--------------------------------------------------";
  }
  function traeIDTicket(){
    return 9;
  }
  function traeLogo(){
    return "images/logo.jpeg";
  }
  function traeCajero(){
    return "Alejandro Gallardo";
  }
  function traeCliente(){
    return "#2530 Perla Cuesta";
  }

  function openWin(){
    var myWindow=window.open('','','width=200,height=100');
    myWindow.document.write('<link rel="stylesheet" href="style_ticket.css">');
    myWindow.document.write("<div class='ticket centrado'>");
      myWindow.document.write("<img src='"+traeLogo()+"' width='150' height='170'>");
      myWindow.document.write("<p class='centrado'>Gimnasio MT8!</p>");
      myWindow.document.write("<p class='centrado'>"+traeFecha()+"</p>");
      myWindow.document.write("<p class='centrado'>"+traeDireccion()+"</p>");
      myWindow.document.write("<p class='centrado'>Ticket: #"+traeIDTicket()+"</p>");
      myWindow.document.write("<p class='centrado'>Cajero: "+traeCajero()+"</p>");
      myWindow.document.write("<p class='centrado'>Cliente: "+traeCliente()+"</p>");
      myWindow.document.write("<p>"+separador()+"</p>");
      myWindow.document.write("<table><thead><tr><th class='producto'>PRODUCTO</th><th class='precio'>$</th></tr></thead>");
        myWindow.document.write("<tbody>");
          myWindow.document.write("<tr><td class='producto'>DULCE CHIDO</td><td class='precio centrado'>$100</td></tr>");
          myWindow.document.write("<tr><td class='producto'>DULCE CHIDO</td><td class='precio centrado'>$100</td></tr>");
          myWindow.document.write("<tr><td class='producto'>DULCE CHIDO</td><td class='precio centrado'>$100</td></tr>");
          myWindow.document.write("<tr><td class='producto'>DULCE CHIDO</td><td class='precio centrado'>$100</td></tr>");
          myWindow.document.write("<tr><td class='total'>Total: </td><td class='precio centrado'>$300</td></tr>");
        myWindow.document.write("</tbody>");
      myWindow.document.write("</table>");
      myWindow.document.write("<p>"+separador()+"</p>"); 
    myWindow.document.write("<p class='centrado'>¡Gracias por tu compra!</p>");


    myWindow.document.write("</div>");
    
    myWindow.document.close();
   
    myWindow.focus();
    myWindow.print();
    myWindow.close();
  }
function loadXMLDoc() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
      }
    };
    xmlhttp.open("GET", "/kontakt.xml", true);
    xmlhttp.send();
  }
  function myFunction(xml) {
    var i;
    var xmlDoc = xml.responseXML;
    var table="<tr><th></th><th></th><th></th></tr>";
    var x = xmlDoc.getElementsByTagName("ISIK");
    for (i = 0; i <x.length; i++) { 
      table += "<tr><td>" +
      x[i].getElementsByTagName("NIMI")[0].childNodes[0].nodeValue +
      "</td><td>" +
      x[i].getElementsByTagName("TELEFON")[0].childNodes[0].nodeValue +
      "</td><td>" +
      x[i].getElementsByTagName("EMAIL")[0].childNodes[0].nodeValue +
      "</td></tr>";
    }
    document.getElementById("demo").innerHTML = table;
}
function catalogCall()
	{
	var xhttp, xmlDoc, txt, i, user, email, name;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		xmlDoc = this.responseXML;
		txt = "";
		user = xmlDoc.getElementsByTagName("USER");
		email = xmlDoc.getElementsByTagName("EMAIL");
		name = xmlDoc.getElementsByTagName("NAME");
		for (i = 0; i < user.length || i < email.length; i++) {
		  txt = txt + user[i].childNodes[0].nodeValue + " " +  
		  email[i].childNodes[0].nodeValue + " " + 
		  name[i].childNodes[0].nodeValue + "<br>";
		}
		document.getElementById("demo").innerHTML = txt;
	  }
	};
	xhttp.open("GET", "cd_catalog.xml", true);
	xhttp.send();
	}
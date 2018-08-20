function anketa()
{
	var broj = document.getElementById("tbBroj").value;
	var tag = "";

	for (var i = 0; i < broj; i++) {
		tag += "<input type='text' required name='tbOdgovor[ "+ i +" ]'/><br/>";
	}

	document.getElementById('odgovori').innerHTML = tag;
}

function registracija()
{
	var greske = new Array();
	
	var username = document.getElementById('tbKorisnickoIme').value;
	var imePrezime = document.getElementById('tbImePrezime').value;
	var email = document.getElementById('tbEmail').value;
	var lozinka = document.getElementById('tbLozinka').value;
	var adresa = document.getElementById('tbAdresa').value;
	var grad = document.getElementById('ddlGrad').options[document.getElementById('ddlGrad').selectedIndex].value;



	var regUsername = /^[A-z]{2,20}([0-9])*$/;
	var regImePrezime = /^[A-Z][a-z]{2,10}\s[A-Z][a-z]{4,10}$/;
	var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var regLozinka = /^[a-zA-Z\d]{6,}$/;
	var regAdresa = /^[A-Z][a-z]{2,}\s[A-Z][a-z]{3,}\s(\d){1,3}$/;

	if (!regUsername.test(username)) {
		greske.push("Korisnicko ime nije u dobrom formatu");
	}
	if (!regImePrezime.test(imePrezime)) {
		greske.push("Ime i prezime nije u dobrom formatu");
	}
	if (!regEmail.test(email)) {
		greske.push("Email nije u dobrom formatu");
	}
	if (!regLozinka.test(lozinka)) {
		greske.push("Lozinka nije u dobrom formatu");
	}
	if (grad == 0) {
		greske.push("Niste izabrali grad");
	}


	if (greske.length == 0) {
		return true;
	}
	else
	{
		var html = "";
		for(var i=0;i<greske.length;i++)
		{
			html += greske[i] + "<br/>";
		}
		document.getElementById('greske').innerHTML = html;
		document.getElementById('greske').style.color = "white";
		document.getElementById('greske').style.background = "red";

		return false;
	}

}
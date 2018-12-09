var arrayNombresProyectos = arrayNombreProyectos;

function login(){

	if(resultUser==1 && resultPass==1){
		loginCorrecto();
		
	}
	else if (resultUser==1 && resultPass!=1){
		errorPassword();
	
	}
	else if (resultUser!=1 && resultPass==1) {
		errorUser();

	}
	else if(resultUser==0 && resultPass==0){
		errorLogin();

	}
}


function errorLogin() {
	document.getElementById('p1').innerText="Error Login";
}

function errorUser(){
	document.getElementById('p1').innerText="Error Usuario";
}

function errorPassword(){
	document.getElementById('p1').innerText="Error Password";

}

function loginCorrecto(){
	window.location="pantallaprojectes.php";
}

function insertAfter(e,i){
	if(e.nextSibling){
		e.parentNode.insertBefore(i,e.nextSibling);
	}
	else{
		e.parentNode.appendChild(i);
	}
}






function nombreProyectos(){
	var body = document.getElementsByTagName("body")[0];

	var tableBody = document.createElement("tbody");

	var tabla = document.createElement("table");
	var tableBody = document.createElement("tbody");

	var tbtr = document.createElement("tr");
	var tbtd = document.createElement("td");

	var ullista = document.createElement("ul");
	var lilista = document.createElement("li");
	for (var i = 0; i < length.arrayNombresProyectos; i++){
		var textoLi = document.createTextNode(arrayNombresProyectos[i]);
		lilista.appendChild(textoLi);
		
	}
	ullista.appendChild(lilista);


	tbtd.appendChild(ullista);
	tbtr.appendChild(tbtd);

	tableBody.appendChild(tbtr);

	tabla.appendChild(tableBody);

	body.appendChild(tabla);

	tabla.setAttribute("border","2");


}


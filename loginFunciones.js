function mensajeError(texto) {
	//Guardo en una variable el div especial para los errores
	var zonaError = document.getElementById("mensajeError");

	
	//Creo un div para meter el icono y el texto dentro
	var divError = document.createElement("div");
	//Anado id al div que tiene el error 
	divError.setAttribute("id","contenedorError")
	//Anado el divError como hijo del zonaError
	zonaError.appendChild(divError)

	//Creo una variable iconoError que sera img
	var iconoError = document.createElement("img");
	//Indico cual sera el src de la imagen
	iconoError.src = "assets/error.png";
	//Anado el atributo de id y le digo que sea errorImg
	iconoError.setAttribute("id","errorImg");
	//Anado la variable que he creado como hijo
	divError.appendChild(iconoError);

	//Creo una p para guardar el texto
	var pTextoError = document.createElement("p");
	//Creo una variable donde meto el texto
	var texto = document.createTextNode(texto);
	//Anado a la p el texto
	pTextoError.appendChild(texto)

	//Le anado al divError la p
	divError.appendChild(pTextoError);

	errorImg.setAttribute("class","animated flash");

}

function buttonCrearNouProjecte() {
	//Guardo en una variable el div center
	var center = document.getElementById("center");

	//Creo el boton
	var button = document.createElement("button");

	button.type = "button";
	button.innerText = "Crear nou projecte";

	//Anado el boton como hijo al div center
	center.appendChild(button);

	button.setAttribute("id","b");




}

var arrayNombresProyectos = [];

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


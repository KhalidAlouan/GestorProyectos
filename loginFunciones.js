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

	var idNomberProyectos = document.getElementById("idNombreProyectos");

	//Creo el boton
	var button = document.createElement("button");

	button.type = "button";
	button.innerText = "Crear nou projecte";

	/*//Anado el boton como hijo al div center
	center.appendChild(button);*/

	button.setAttribute("id","buttonCrearNouProjecte");

	insertAfter(button,center);

	button.setAttribute("onclick","formulario()");


}

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
	mensajeError("Contraseña y usuario incorrectos !");
}

function errorUser(){
	mensajeError("Usuario incorrecto !");
}

function errorPassword(){
	mensajeError("Contraseña incorrecta !");

}

function loginCorrecto(){
	window.location="pantallaprojectes.php";
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function saberRolUsuario() {
	if (rol=="SM") {
		buttonCrearNouProjecte();
	}
}




//La siguiente funcion crea un formulario
function formulario(){
	
	var center = document.getElementById("center");
	//Creo una variable del div idNombreProyectos
	var divProyectos = document.getElementById("idNombreProyectos");

	//Creo un div nuevo
	var divForm = document.createElement("div");
	divForm.setAttribute("id","idForm");
	//Creo el formulario
	var form = document.createElement("form");

	

	//Creo el label del nombre del proyecto
	var nomProjecte_label = document.createElement("label");
	//Le meto texto al nomProjecte_label
	nomProjecte_label.innerText="Nom del Projecte:";
	//Creo el input del nomProjecte
	var nomProjecte_input = document.createElement("input");
	nomProjecte_input.setAttribute("type","text");
	nomProjecte_input.required=true;

	//Añado el label y el input al formulario
	form.appendChild(nomProjecte_label);
	form.appendChild(nomProjecte_input);



	//Creo el label de la descripción
	var descripcion_label = document.createElement("label");
	//Le meto texto al label descripcion_label
	descripcion_label.innerText="Descripció:";
	//Creo el input de la descripcion
	var descripcion_input = document.createElement("input");
	descripcion_input.setAttribute("type","text");

	//Añado el label y el input al formulario
	form.appendChild(descripcion_label);
	form.appendChild(descripcion_input);

	//Creo el label selectScrum
	var selectScrum_label = document.createElement("label");
	//Le meto texto al selectScrum_label
	selectScrum_label.innerText="ScrumMaster:";
	//Añado el label selectScrum_label al formulario
	

	//Creo el select de scrumMaster
	var selectScrum = document.createElement("select");
	//Creao la opcion scrumMaster
	
	
	for (var i = 0; i < arraySM.length; i++) {
		var scrumMaster=document.createElement("option");
	 	var scrumMasterNode = document.createTextNode(arraySM[i]);
	 	scrumMaster.appendChild(scrumMasterNode);
	 	selectScrum.appendChild(scrumMaster);
	}
	// var scrumMasterNode = document.createTextNode("$arrarySM");
	// scrumMaster.appendChild(scrumMasterNode);
	//Añado la opcion scrumMaster al select scrumMaster
	
	

	
	//Creo el label selectOwner
	var selectOwner_label = document.createElement("label");
	//Le meto texto al selectScrum_label
	selectOwner_label.innerText="Product Owner:";
	//Añado el label selectOwner_label al formulario
	

	
	//Creo el select de selectOwner
	var selectOwner = document.createElement("select");
	//Creo la opcion productOwner
	var productOwner=document.createElement("option");
	productOwner.setAttribute("value","productOwner");
	// for (var i = 0; i < $arrayPO.length; i++) {
	// 	var productOwnerNode = document.createTextNode($arraryPO[i]);
	
	// }
	// productOwner.appendChild(productOwnerNode);
	//Añado la opcion productOwner al select tipo_usuario
	selectOwner.appendChild(productOwner);
	selectOwner.required=true;

	//Creo el label selectGrup
	var selectGrup_label = document.createElement("label");
	//Le meto texto al selectGrup_label
	selectGrup_label.innerText="Grup de Desenvolupadors:";
	//Añado el label selectGrup_label al formulario
	

	//Creo el select de grupDesenvol
	var selectGrup = document.createElement("select");
	//Creo la opcion Grup de desenvolupadors
	var grupDesenvol=document.createElement("option");
	// grupDesenvolNode.setAttribute("value","grupDesenvol");
	// for (var i = 0; i < $arrayDE.length; i++) {
	// 	var grupDesenvolNode = document.createTextNode($arrayDE[i]);

	// }
	// grupDesenvol.appendChild(grupDesenvolNode);
	//Añado la opcion grupDesenvol al select tipo_usuario
	selectGrup.appendChild(grupDesenvol);
	selectGrup.required=true;


	form.appendChild(selectScrum_label);
	form.appendChild(selectScrum);
	form.appendChild(selectOwner_label);
	form.appendChild(selectOwner);
	form.appendChild(selectGrup_label);
	form.appendChild(selectGrup);
	
	

	divForm.appendChild(form);
	center.appendChild(divForm);
	
}
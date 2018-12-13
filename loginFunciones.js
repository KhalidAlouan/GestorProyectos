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

	insertAfter(button,idNombreProyectos);

	button.setAttribute("onclick","formulario()");


}
//Funcion de condiciones de usuario y password del Login
function login(){
	//Si el usuario y la password son correctos llamamos a la funcion loginCorrecto()
	if(resultUser==1 && resultPass==1){
		loginCorrecto();
		
	}
	//Si el Password es erroneo llamamos a la funcion errorPassword()
	else if (resultUser==1 && resultPass!=1){
		errorPassword();
	
	}
	//Si el Usuario es erroneo llamamos a la funcion errorUser()
	else if (resultUser!=1 && resultPass==1) {
		errorUser();

	}
	//Si el Usuario y el Password son erroneos llamamos a la funcion errorLogin()
	else if(resultUser==0 && resultPass==0){
		errorLogin();

	}
}


function errorLogin() {
	//Llamamos a la funcion de mensajeError pasando el tipo de error
	mensajeError("Contraseña y usuario incorrectos !");
}

function errorUser(){
	//Llamamos a la funcion de mensajeError pasando el tipo de error
	mensajeError("Usuario incorrecto !");
}

function errorPassword(){
	//Llamamos a la funcion de mensajeError pasando el tipo de error
	mensajeError("Contraseña incorrecta !");

}

function loginCorrecto(){
	//Abrimos la pantallaprojectes.php si el usuario y el password son correctos
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
	form.setAttribute("action","pantallaprojectes.php");
	form.setAttribute("method","POST");

	

	//Creo el label del nombre del proyecto
	var nomProjecte_label = document.createElement("label");
	//Le meto texto al nomProjecte_label
	nomProjecte_label.innerText="Nom del Projecte:";
	//Creo el input del nomProjecte
	var nomProjecte_input = document.createElement("input");
	//Ponemos el tipo del input
	nomProjecte_input.setAttribute("type","text");
	//Ponemos un name al input de nombre de proyecto
	nomProjecte_input.setAttribute("name","inputNombreprojecte");

	//Añado el label y el input al formulario
	form.appendChild(nomProjecte_label);
	form.appendChild(nomProjecte_input);



	//Creo el label de la descripción
	var descripcion_label = document.createElement("label");
	//Le meto texto al label descripcion_label
	descripcion_label.innerText="Descripció:";
	//Creo el input de la descripcion
	var descripcion_input = document.createElement("input");
	//Ponemos el tipo del input
	descripcion_input.setAttribute("type","text");
	//Ponemos un name al input de Descripcion 
	descripcion_input.setAttribute("name","inputDescrion");

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
	selectScrum.setAttribute("name","selectSM");
	//Creamos un option para el select Scrum
	var scrumMaster=document.createElement("option");
	//Ponemos un atributo de tipo value en el option
	scrumMaster.setAttribute("value","opcion0");
	var scrumMasterNode = document.createTextNode("Seleccionar");
	scrumMaster.appendChild(scrumMasterNode);
	selectScrum.appendChild(scrumMaster);

	//Hacemos un for del arraySM donde estan todos los Scrum Master 
	for (var i = 0; i < arraySM.length; i++) {
		var scrumMaster=document.createElement("option");
	 	var scrumMasterNode = document.createTextNode(arraySM[i]);
	 	scrumMaster.appendChild(scrumMasterNode);
	 	selectScrum.appendChild(scrumMaster);
	}
	
	//Creo el label selectOwner
	var selectOwner_label = document.createElement("label");
	//Le meto texto al selectScrum_label
	selectOwner_label.innerText="Product Owner:";
	//Creo el select de selectOwner
	var selectOwner = document.createElement("select");
	selectOwner.setAttribute("name","selectPO");
	//Creamos un option para el select Owner
	var productOwner=document.createElement("option");
	//Ponemos un atributo de tipo value en el option
	productOwner.setAttribute("value","option0");
	var productOwnerNode = document.createTextNode("Seleccionar");
	productOwner.appendChild(productOwnerNode);
	selectOwner.appendChild(productOwner);

	//Hacemos un for del arraySM donde estan todos los  Product Owner
	for (var i = 0; i < arrayPO.length; i++) {
		var productOwner=document.createElement("option");
		//productOwner.setAttribute("value","po"+i);
	 	var productOwnerNode = document.createTextNode(arrayPO[i]);
	 	productOwner.appendChild(productOwnerNode);
	 	selectOwner.appendChild(productOwner);
	}
	
	//Añado la opcion productOwner 
	selectOwner.appendChild(productOwner);
	selectOwner.required=true;

	//Creo el label selectGrup
	var selectGrup_label = document.createElement("label");
	//Le meto texto al selectGrup_label
	selectGrup_label.innerText="Grup de Desenvolupadors:";
	
	//Creamos el elemento Select de grupos
	var selectGrup = document.createElement("select");
	selectGrup.setAttribute("name","selectGP");
	//Creamos un option para el select Grupo
	var grupDesenvol=document.createElement("option");
	//Ponemos un atributo de tipo value en el option
	grupDesenvol.setAttribute("value","opcion0");
	var grupDesenvolNode = document.createTextNode("Seleccionar");
	grupDesenvol.appendChild(grupDesenvolNode);
	selectGrup.appendChild(grupDesenvol);
	//Hacemos un for del arraySM donde estan todos los  nombre de los Grupos
	for (var i = 0; i < arrayDE.length; i++) {
		var grupDesenvol=document.createElement("option");
	 	var grupDesenvolNode = document.createTextNode(arrayDE[i]);
	 	grupDesenvol.appendChild(grupDesenvolNode);
	 	selectGrup.appendChild(grupDesenvol);
	}

	//Craecion boton submit para insertar nuevo proyecto en la base de datos
	var botonInsertar = document.createElement("input");
	botonInsertar.type="submit";
	botonInsertar.setAttribute("name","insertarDatos");
	botonInsertar.setAttribute("onclick","comprobarErroresInsertar()");


	selectGrup.appendChild(grupDesenvol);
	selectGrup.required=true;


	form.appendChild(selectScrum_label);
	form.appendChild(selectScrum);
	form.appendChild(selectOwner_label);
	form.appendChild(selectOwner);
	form.appendChild(selectGrup_label);
	form.appendChild(selectGrup);

	form.appendChild(botonInsertar);

	

	divForm.appendChild(form);

	var idButtonCrearProyecto = document.getElementById("buttonCrearNouProjecte");

	insertAfter(divForm,idButtonCrearProyecto);

	idButtonCrearProyecto.hidden = true;
	
}

function comprobarErroresInsertar(){
	var DescripcionProyecto = document.getElementsByName("inputDescrion")[0].value;
	var NombreProyecto =  document.getElementsByName("inputNombreprojecte")[0].value;
	
	
}




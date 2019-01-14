arrayNombre=['ID PROJECTE: ','NOMBRE PROJECTE: ','DESCRIPCIÓN: ','SCRUM MASTER: ','PRODUCT OWNER: ','ID GRUPO: '];

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
	form.setAttribute("id","idFormulario");
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
	productOwner.setAttribute("value","opcion0");
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

	nomProjecte_input.setAttribute("change",comprobarErroresInsertar);
	scrumMaster.setAttribute("change",comprobarErroresInsertar);
	selectOwner.setAttribute("change",comprobarErroresInsertar);
	selectGrup.setAttribute("change",comprobarErroresInsertar);

	//Craecion boton submit para insertar nuevo proyecto en la base de datos
	var botonInsertar = document.createElement("input");
	botonInsertar.setAttribute("name","insertarDatos");
	botonInsertar.setAttribute("value","Enviar");
	botonInsertar.setAttribute("type", "button");
	botonInsertar.setAttribute("id","botoninsert");
	botonInsertar.setAttribute("onclick","comprobarErroresInsertar()");
	botonInsertar.type="submit";

	

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

function inforGeneral(arrayJS) {
	var div = document.createElement("div");
	div.setAttribute("id","marcoInfoProyectos");

	var center = document.getElementById("center");
	center.appendChild(div);

	for(var i=0;i<arrayJS.length;i++) {
		var p = document.createElement("p");
		div.appendChild(p);
		p.innerText = arrayNombre[i]+" "+arrayJS[i]

	}
    

}

function divEspecificacionesPB(array_especificaciones) {
	var div = document.createElement("div");
	div.setAttribute("class","divPB");

	var marcoInfoProyectos = document.getElementById("marcoInfoProyectos");
	
	insertAfter(div,marcoInfoProyectos);

	var input = document.createElement("input");
	input.setAttribute("type","text");

	var button = document.createElement("button");
	button.type="submit";
	button.innerText="+";
	button.setAttribute("onclick","formulario()");

	var nuevoArray = array_especificaciones.map(function(o) {
	    return Object.keys(o).reduce(function(array, key) {
    		return array.concat([key, o[key]]);
    	}, []);
	});

	var n = nuevoArray.length;
	for(var i = 0;i<n;i++){
		var p = document.createElement("p");
		div.appendChild(p);
		p.innerText = nuevoArray[i]; 
	}

	insertAfter(input,p);
	insertAfter(button,input);




}

function comprobarErroresInsertar(){

	var NombreProyecto =  document.getElementsByName("inputNombreprojecte")[0].value;

	var SMselect = document.getElementsByName("selectSM")[0].value;
	var POselect = document.getElementsByName("selectPO")[0].value;
	var GPselect = document.getElementsByName("selectGP")[0].value;
	
	if (NombreProyecto == ""){
		mensajeError("El camp Nom del Projecte no pot estar buit");
	}
	else if(SMselect == "opcion0"){
		mensajeError("El camp ScrumMaster no pot estar buit");
	}
	else if(POselect == "opcion0"){
		mensajeError("El camp ProductOwner no pot estar buit");
	}
	else if(GPselect == "opcion0"){
		mensajeError("El camp Grup de Desenvolupadors no pot estar buit");
	}
	else{
		document.getElementById('idFormulario').submit();

		
	}
		
}


//Funcion del estado acabado de un sprint
function estadoAcabado(id){
	document.getElementById(id).className='sprintAcabado';
	
}

//Funcion del estado Activo de un sprint
function estadoActivo(id){
	document.getElementById(id).className='sprintActivo';
	
}
//Funcion del estado Sin iniciar un Sprint
function estadoSinIniciar(id){
	document.getElementById(id).className='sprintSinIniciar';
	
}

//**Nuevo Sprint 3

function formularioSprint(){

	
	//Creo el formulario
	var formSprint = document.createElement("form");
	formSprint.setAttribute("id","idFormularioSprint");
	formSprint.setAttribute("action","administracionProyectos.php");
	formSprint.setAttribute("method","POST");


	//Array con los Id de los Sprint
	arrayIdSprint.sort();
	var longitudArrayIdSprint=arrayIdSprint.length;
	var idSprint=arrayIdSprint[longitudArrayIdSprint-1];

	

	//Creo el label del numero del Sprint
	var numSprint_label = document.createElement("label");
	//Le meto texto al numSprint_label
	numSprint_label.innerText="Número de  Sprint: ";
	//Creo el label para mostrar el numero de la especificacion
	var numSprint_label2 = document.createElement("label");
	numSprint_label2.innerText=parseInt(idSprint)+1;
	numSprint_label2.setAttribute("name","IdSprintInt");

	//Creamos un label para la fecha de inicio del sprint
	var dataIniciSprint_label = document.createElement("label");
	//Añadimos texto dentro del label
	dataIniciSprint_label.innerText="Data de Inici: ";
	//Creamos un input para poder poner la fecha de inicio del sprint
	var dataIniciSprint_input = document.createElement("input");	
	//ponemos que el input sera de tipo texto
	dataIniciSprint_input.setAttribute("type","date");
	//ponemos un name para el input
	dataIniciSprint_input.setAttribute("name","inputDataInici");


	//Creamos un label para la fecha final del sprint
	var dataFiSprint_label = document.createElement("label");
	//Añadimos texto dentro del label
	dataFiSprint_label.innerText="Data de Final: ";
	//Creamos un input para poder poner la fecha final del sprint
	var dataFiSprint_input = document.createElement("input");	
	//ponemos que el input sera de tipo texto
	dataFiSprint_input.setAttribute("type","date");
	//ponemos un name para el input
	dataFiSprint_input.setAttribute("name","inputDataFi");


	//Creamos un label para las horas del sprint
	var horasSprint_label = document.createElement("label");
	//Añadimos texto dentro del label
	horasSprint_label.innerText="Horas del Sprint: ";
	//Creamos un input para poder poner las horas del sprint
	var horasSprint_input = document.createElement("input");	
	//ponemos que el input sera de tipo texto
	horasSprint_input.setAttribute("type","text");
	//ponemos un name para el input
	horasSprint_input.setAttribute("name","inputHoras");

	//Creamos una variable con el id de un div para ponerlo dentro
	var divsprint=document.getElementById('sprintFormulario');

	//Creamos el boton para insertar
	var buttonSprint=document.createElement("input");
	buttonSprint.setAttribute("type","button");
	buttonSprint.setAttribute("value","Crear")
	buttonSprint.setAttribute("id","buttonInsertarSprint");
	buttonSprint.setAttribute("name","InsertarSprint");
	buttonSprint.setAttribute("onclick","comprobarInsertarSprint()");
	//buttonSprint.type="submit";

	


	var saltoDelinea1=document.createElement("br");
	var saltoDelinea2=document.createElement("br");
	var saltoDelinea3=document.createElement("br");
	var saltoDelinea4=document.createElement("br");


	dataIniciSprint_input.setAttribute("change",comprobarInsertarSprint);
	dataFiSprint_input.setAttribute("change",comprobarInsertarSprint);
	horasSprint_input.setAttribute("change",comprobarInsertarSprint);
	



	
	//Añadimos todas la variables dentro del form
	formSprint.appendChild(numSprint_label);
	formSprint.appendChild(numSprint_label2);
	formSprint.appendChild(saltoDelinea1);


	formSprint.appendChild(dataIniciSprint_label);
	formSprint.appendChild(dataIniciSprint_input);
	formSprint.appendChild(saltoDelinea2);

	formSprint.appendChild(dataFiSprint_label);
	formSprint.appendChild(dataFiSprint_input);
	formSprint.appendChild(saltoDelinea3);

	formSprint.appendChild(horasSprint_label);
	formSprint.appendChild(horasSprint_input);
	formSprint.appendChild(saltoDelinea4);

	formSprint.appendChild(buttonSprint);
	
	//añadimos el form dentro del div
	divsprint.appendChild(formSprint);


	//Ocultamos el boton de crear Sprint
	var botonCrearSprint= document.getElementById("CrearSprint").hidden=true;

}





function comprobarInsertarSprint(){
	var FechaInicio=document.getElementsByName("inputDataInici")[0].value;
	var FechaFinal=document.getElementsByName("inputDataFi")[0].value;
	var horas=document.getElementsByName("inputHoras")[0].value;



	//Obtenemos la fecha actual
	var fecha = new Date();
	var dd=fecha.getDate();
	var mm=""+fecha.getMonth()+1;
	var yyyy=fecha.getFullYear();
	var hoy =yyyy+"-"+mm+"-"+dd;
	
	

	if (FechaInicio == ""){
		mensajeError("El camp FechaInicio no pot estar buit");
	}
	else if(FechaFinal == ""){
		mensajeError("El camp FechaFinal no pot estar buit");
	}
	else if(horas == ""){
		mensajeError("El camp horas no pot estar buit");
	}
	else if(FechaInicio<=hoy){
		mensajeError("La Data de inici te que ser posterior a la Data actual");
	}
	else if(FechaFinal<=FechaInicio){
		mensajeError("La Data Final te que ser posterior a la Data de inici");
	}
	else if(horas<1){
		mensajeError("Les hores del sprint te que ser 1 o superior");
	}
	else{
		document.getElementById('idFormularioSprint').submit();

		
	}

}

function crearCandados(){
	//var divDeSprint = document.getElementById("divSprint");
	var padre=document.getElementById("divSprint");


	var imagenCandado = document.createElement("img");
	imagenCandado.setAttribute("src","assets/candado-cerrado.png");
	imagenCandado.setAttribute("width","25");
	imagenCandado.setAttribute("height","25");

	padre.appendChild(imagenCandado);

}



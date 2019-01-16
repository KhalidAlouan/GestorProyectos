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

	var titulo = document.createElement("p");
	titulo.style.fontWeight = "bold";
	div.appendChild(titulo);
	titulo.textContent = 'Información Sprint';
	titulo.setAttribute("class","titulos");

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
	input.setAttribute("id","especificacion");


	var button = document.createElement("button");
	button.type="submit";
	button.innerText="+";
	button.setAttribute("onclick","anadirEspecifiacion()");

	var nuevoArray = array_especificaciones.map(function(o) {
	    return Object.keys(o).reduce(function(array, key) {
    		return array.concat([key, o[key]]);
    	}, []);
	});

	var titulo = document.createElement("p");
	div.appendChild(titulo);
	titulo.style.fontWeight = "bold";
	titulo.textContent = 'Product Backlog';
	titulo.setAttribute("class","titulos");

	var n = nuevoArray.length;
	var idP = 1;
	for(var i = 0;i<n;i++){
		var p = document.createElement("p");
		div.appendChild(p)
		p.innerText = nuevoArray[i][1];
		p.setAttribute("draggable","true");
		p.setAttribute("class","dragable");
		p.setAttribute("id",idP);
		p.setAttribute("ondragstart","start(event)");
		p.setAttribute("ondragend","end(event)");
		idP++;
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

function anadirEspecifiacion() {
	var divPB = document.getElementsByClassName("divPB")[0];

	var nuevaESP = document.getElementById("especificacion").value;

	var p = document.createElement("p");

	p.innerText=nuevaESP;

	var center = document.getElementById("center");

	var primerHijo = divPB.firstElementChild;

	divPB.insertBefore(p,primerHijo);
}

function eliminarSprint(idBoton,idBotonEliminar) {
	var botonAcordeon = document.getElementById(idBoton);

	botonAcordeon.parentNode.removeChild(botonAcordeon);

	var fecha = new Date();
	var dd=fecha.getDate();
	var mm=""+fecha.getMonth()+1;
	var yyyy=fecha.getFullYear();
	var hoy =yyyy+"-"+mm+"-"+dd;

	var botonEliminar = document.getElementById(idBotonEliminar).hidden = true;
	botonEliminar.hidden = true;

}

//Funcion que elimina el elemento
function borrarElemento(element){
	var elementoPadre = element.parentNode;
	elementoPadre.parentNode.removeChild(elementoPadre);
}

function start(e) {
    e.dataTransfer.effecAllowed = 'move'; // Define el efecto como mover
    e.dataTransfer.setData("Data", e.target.id); // Coje el elemento que se va a mover
    e.dataTransfer.setDragImage(e.target, 0, 0); // Define la imagen que se vera al ser arrastrado el elemento y por donde se coje el elemento que se va a mover (el raton aparece en la esquina sup_izq con 0,0)
    e.target.style.opacity = '0.4'; // Establece la opacidad del elemento que se va arrastrar
}

function end(e) {
    e.target.style.opacity = ''; // Restaura la opacidad del elemento   
    e.dataTransfer.clearData("Data");
}

function enter(e) {
    e.target.style.border = '3px dotted #555'; 
}

function leave(e) {
    e.target.style.border = ''; 
}


function over(e) {
    var elemArrastrable = e.dataTransfer.getData("Data"); // Elemento arrastrado
    var id = e.target.id; // Elemento sobre el que se arrastra
    alert(id);
 
    // return false para que se pueda soltar
    if (id.className == "accordion") {
    	alert("aa");
        return false;
    }
}

function eliminar(e) {
    var elementoArrastrado = document.getElementById(e.dataTransfer.getData("Data")); // Elemento arrastrado
    elementoArrastrado.parentNode.removeChild(elementoArrastrado); // Elimina el elemento
    e.target.style.border = '';   // Quita el borde
}

function modificarSprint() {
	var pInfoSprint = document.getElementsByClassName("paragrafoInfoSprint");
	controlador = 0;
	var longitud = pInfoSprint.length;
	alert(longitud);

}
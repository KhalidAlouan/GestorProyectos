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
	button.setAttribute("onclick","formulario()");
	

}
//La siguiente funcion crea un formulario
function formulario(){
	alert("Hola");
	var center = document.getElementById("center");
	//Creo una variable del div idNombreProyectos
	var divProyectos = document.getElementById("idNombreProyectos");

	//Creo un div nuevo
	var divForm = document.createElement("div");
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
	form.appendChild(selectScrum_label);

	//Creo el select de scrumMaster
	var selectScrum = document.createElement("select");
	//Creao la opcion scrumMaster
	var scrumMaster=document.createElement("option");
	scrumMaster.setAttribute("value","scrumMaster");
	var scrumMasterNode = document.createTextNode("ScrumMaster");
	scrumMaster.appendChild(scrumMasterNode);
	//Añado la opcion scrumMaster al select scrumMaster
	selectScrum.appendChild(scrumMaster);
	selectScrum.required=true;

	
	//Creo el label selectOwner
	var selectOwner_label = document.createElement("label");
	//Le meto texto al selectScrum_label
	selectOwner_label.innerText="Product Owner:";
	//Añado el label selectOwner_label al formulario
	form.appendChild(selectOwner_label);

	
	//Creo el select de selectOwner
	var selectOwner = document.createElement("select");
	//Creo la opcion productOwner
	var productOwner=document.createElement("option");
	productOwner.setAttribute("value","productOwner");
	var productOwnerNode = document.createTextNode("Product Owner");
	scrumMaster.appendChild(scrumMasterNode);
	//Añado la opcion productOwner al select tipo_usuario
	selectOwner.appendChild(productOwner);
	selectOwner.required=true;

	//Creo el label selectGrup
	var selectGrup_label = document.createElement("label");
	//Le meto texto al selectGrup_label
	selectGrup_label.innerText="Grup de Desenvolupadors:";
	//Añado el label selectGrup_label al formulario
	form.appendChild(selectGrup_label);

	//Creo el select de grupDesenvol
	var selectGrup = document.createElement("select");
	//Creo la opcion Grup de desenvolupadors
	var grupDesenvol=document.createElement("option");
	grupDesenvol.setAttribute("value","grupDesenvol");
	grupDesenvol.setAttribute("label","Grup de desenvolupadors");
	//Añado la opcion grupDesenvol al select tipo_usuario
	selectGrup.appendChild(grupDesenvol);
	selectGrup.required=true;

	form.appendChild(selectScrum);
	form.appendChild(selectOwner);
	form.appendChild(selectGrup);

	divForm.appendChild(form);
	center.appendChild(divForm);

	
}


function insertAfterForm(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
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


function error() {
	var zonaError = document.getElementById("mensajeError");

	//Creo una variable donde guardar el mensaje de error
	var contenido = document.createTextNode("ERROR");

	//Creo una variable iconoError que sera img
	var iconoError = document.createElement("img");
	iconoError.src = "assets/error.png";

	//Anado la variable que he creado como hijo del child
	zonaError.appendChild(iconoError);
	
}
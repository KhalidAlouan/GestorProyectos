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
	document.getElementById('p1').innerText="Login correcto";
}
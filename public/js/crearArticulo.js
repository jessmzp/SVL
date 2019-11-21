function habilitar2(value){
	if (value !== "0") {
		document.getElementById("campo2").disabled=false;
	}else{
		document.getElementById("campo2").disabled=true;
		document.getElementById("campo3").disabled=true;
	}
}

function habilitar3(value){
	if (value !== "0") {
		document.getElementById("campo3").disabled=false;
	}else{
		document.getElementById("campo3").disabled=true;
	}
}
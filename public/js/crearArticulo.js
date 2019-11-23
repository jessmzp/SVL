function habilitar2(value){
	if (value !== "0") {
		document.getElementById("campo2").disabled=false;
	}else{
		document.getElementById("campo2").disabled=true;
		document.getElementById("campo3").disabled=true;
	}

	var valor;

	valor=document.getElementById("campo1").valor[document.getElementById("campo1").valor.selectedIndex].value;
	
	if (valor!=0) {
		misOpc=eval(getElementById("campo2") + valor);

		numOpc=misOpc.length;

		document.getElementById("campo1").getElementById("campo2").length = numOpc;

		for (i = 0; i < numOpc; i++) {
			document.getElementById("campo1").getElementById("campo2").options[i].value=misOpc[i];
			document.getElementById("campo1").getElementById("campo2").text[i].value=misOpc[i];
		}
	}
		else{
			document.getElementById("campo1").getElementById("campo2").length=1;

			document.getElementById("campo1").getElementById("campo2").options[0].value="-"
			document.getElementById("campo1").getElementById("campo2").options[0].text="-"
		}

		document.getElementById("campo1").getElementById("campo2").options[0].selected=true;
}

function habilitar3(value){
	if (value !== "0") {
		document.getElementById("campo3").disabled=false;
	}else{
		document.getElementById("campo3").disabled=true;
	}
}


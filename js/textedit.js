function commande(nom, argument) {
	if (typeof argument === 'undefined') {
    	argument = '';
  	}

  	switch(nom) {
		case "createLink":
			argument = prompt("Quelle est l'adresse du lien ?");
		break;
	}
  // Exécuter la commande
  document.execCommand(nom, false, argument);
}

function resultat2(){
	document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
	document.getElementById("edit").submit();
}
<!--Verifie si les parametres entres dans le formulaire login correspondent a un utilisateur et cree une session associee-->

<?php 
session_start();
//on essaye de recuperer les parametres pour acceder a la base de donnee 

include('../../ConnectToDB.php');

//on essaye de creer l utilisateur admin

try{
	
	$req = $bdd->prepare('SELECT * FROM users WHERE username = ?'); //on prepare la requete pour le serveur
	
	if($req->execute(array($_POST['username']) ) ){
		$data = $req->fetch();
		if(password_verify($_POST['password'], $data['password'])){
			$_SESSION['username'] = $data['username'];
			$_SESSION['type'] = $data['type'];
			$_SESSION['mail'] = $data['mail'];
			
			echo "connexion réussie! ";
		}
		else{
			echo "Nom d'utilisateur ou mot de passe incorrect.";
		}

	}
	else{
		echo "error";
	}

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>



</br>
<a href="../../">accueil</a>
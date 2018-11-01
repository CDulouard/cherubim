<!--Verifie si les parametres entres dans le formulaire login correspondent a un utilisateur et cree une session associee-->

<?php 
session_start();
//on essaye de recuperer les parametres pour acceder a la base de donnee 

try{
	$setting = fopen('../../setting', 'r'); //on ouvre setting en lecture seule

	$host = fgets($setting); //on recupere la ligne de host et on enleve les caracteres indesirables
	$host = str_replace ( "host=" , '' , $host);
	$host = rtrim($host);

	$dbname = fgets($setting);//on recupere la ligne de dbname et on enleve les caracteres indesirables
	$dbname = str_replace ( "dbname=" , '' , $dbname);
	$dbname = rtrim($dbname);

	$charset = fgets($setting); //on recupere la ligne de charset et on enleve les caracteres indesirables
	$charset = str_replace ( "charset=" , '' , $charset);
	$charset = rtrim($charset);

	$db_User = fgets($setting);//on recupere la ligne de user et on enleve les caracteres indesirables
	$db_User = str_replace ( "user=" , '' , $db_User);
	$db_User = rtrim($db_User);

	$db_Password = fgets($setting); //on recupere la ligne de password et on enleve les caracteres indesirables
	$db_Password = str_replace ( "password=" , '' , $db_Password);
	$db_Password = rtrim($db_Password);

	fclose($setting); //on ferme setting
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//on essaye de se connecter a la bdd en utilisant les parametres recuperes
try 
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset='.$charset, $db_User, $db_Password); 

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//on essaye de creer l utilisateur admin

try{
	
	$req = $bdd->prepare('SELECT * FROM users WHERE username = ?'); //on prepare la requette pour le serveur
	
	if($req->execute(array($_POST['username']) ) ){
		$data = $req->fetch();
		if($data && password_verify($_POST['password'], $data['password'])){
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
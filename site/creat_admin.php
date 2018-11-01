<!--Crée automatiquement un admin avec un password et username = admin-->

<?php 
//on essaye de recuperer les parametres pour acceder a la base de donnee 
try{
	$setting = fopen('setting', 'r'); //on ouvre setting en lecture seule

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
	
	$reponse = $bdd->query('SELECT * FROM users WHERE username = "admin"'); //on recupere les users dont le nom est admin

	$data = $reponse->fetch();

	if(!$data){ //si il n y en a pas
		
		$req = $bdd->prepare('INSERT INTO users(username, password, mail, type) VALUES(:user, :password, :mail, :type)'); //on prepare la requette pour le serveur

		$req->execute(array(  //et on cree l admin
			'user' => "admin",
			'password' => password_hash("admin", PASSWORD_DEFAULT),
			'mail' => "admin@test.com",
			'type' => 'admin'
		));
	}
	else{
		echo "Il y a deja un compte admin";
	}
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>


<!--Crée automatiquement un admin avec un password et username = admin-->

<?php 

include('ConnectToDB.php');

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


<!--Liste tout les personnage disponible dans la base de donnee-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Personnages</title>
    </head>

    <body>
    	<h1>Personnages :</h1>

    	<section id = 'list_chars'>
    		<ul id = 'list_chars'>
<?php
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

//on recupere tout les personnages dans la table charactere
try{
	
	$req = $bdd->prepare('SELECT id, first_name, last_name FROM characters'); //on prepare la requete pour le serveur
	
	if($req->execute(array() ) ){
		
		while($data = $req->fetch()){ //on affiche la liste des personnages ici
			echo "<li><a href = 'character.php?id=".$data['id']."'>".$data['first_name']." ".$data['last_name']."</a>";//-----rajouter le liens vers la page perso ici!
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
			</ul>
		</section>
		<a href="../../">accueil</a>
	</body>
</html>
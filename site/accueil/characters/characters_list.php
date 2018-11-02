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

include('../../ConnectToDB.php');

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
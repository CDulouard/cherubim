<!--Liste tout les personnage disponible dans la base de donnee-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../CSS/characters_list.css" />
        <title>Personnages</title>
    </head>

    <body>
    	

        <?php include('../modules/menu.php');//affiche le menu?>
        <h2>Personnages :</h2>
    	<section id = 'list_chars'>
    		<ul id = 'list_chars'>

<?php

include('../modules/ConnectToDB.php');
$bdd = connectToDB('../setting');

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
	</body>
</html>
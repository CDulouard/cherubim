<!--Page type d'un personnage-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
<?php   

    include('\wamp64\www\cherubim\site\ConnectToDB.php');

    $req = $bdd->prepare('SELECT * FROM characters WHERE id = ?'); //on prepare la requete pour le serveur
    
    
    if($req->execute(array($_GET['id']) ) ){
        $data = $req->fetch();

        $first_name = $data['first_name'];//recuperation prenom
        
        if($data['last_name'] != "" ) {//recuperation nom
            $last_name = $data['last_name'];
        }
        else{
            $last_name = "---";
        }

        if($data['birth'] != "" ) {//recuperation date de naissance
            $birth = $data['birth'];
        }
        else{
            $birth = "Inconnue";
        }

        $content = $data['article'];

        //affichage de la page
        echo "<title>".$first_name."</title>
   </head>

    <body>
    	<header>
        	<h1>Projet CHERUBIM-Personnage:".$first_name."</h1>
        </header>
        <nav>
	    	<ul>
     			<li><a href='../accueil/Projet_CHERUBIM.php'>Accueil</a></li>
        		<li><a href='#'>Histoire</a></li>
        		<li><a href='characters_list.php'>Personnages</a></li>
        		<li><a href='#'>Contact</a></li>
        	</ul>

    	</nav>
        <main>
        	<article>
        		<section id = 'info_chars'>
                    
                    <h2>Personnage</h2>
                    <p>Nom : ".$last_name."</p>
                    <p>Prénom : ".$first_name."</p>
                    <p>Date de naissance : ".$birth."</p>

                </section>

                <section id = 'content'>

                    <p>".$content."</p>
                
                </section>
        	</article>
        </main>
        <footer>
        	<p>©Copyright 2077 BrumeHumanite. Tous droits reversés.</p>
        </footer>
    </body>
</html>
";
    }
?>
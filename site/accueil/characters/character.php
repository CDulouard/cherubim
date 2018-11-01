<!--Page type d'un personnage-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
<?php   

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
     			<li><a href='../../'>Accueil</a></li>
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
<!--page de changement de mail-->
<?php session_start();
	if(!isset($_SESSION['username'])){
		header('Location: /cherubim/site/accueil/login/login.php');
  		exit();
//http://localhost/cherubim/site/accueil/user/interface.php
  		}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Modifier adresse mail</title>
    </head>

    <body>
    	<?php
        if(!isset($_POST['mail'])){

            echo '
        <h1>Modifier adresse mail</h1>
        <section id = \'formulaire\'>
            <form action="" method="post">

                <p>Nouveau mail : </p>
                <input type="text" name="mail" placeholder="nouveau mail" autocomplete="mail"/> <br /> <br /> 

                <p>Confirmez mail : </p>
                <input type="text" name="mail_confirm" placeholder="mail confirm" autocomplete="mail"/> <br /> <br /> 
    
                <p>Mot de passe : </p>
                <input type="password" autocomplete="on" placeholder="password" name="password" /> <br /> <br /> 

                <input type="submit" value="Modifier" />

            </form>

        </section>';
        }
        
        elseif(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
            if($_POST['mail'] == $_POST['mail_confirm']){
                include('\wamp64\www\cherubim\site\ConnectToDB.php');
                $req = $bdd->prepare('SELECT password FROM users WHERE username =? ');//on recupere le mot de passe hashe de l utilisateur
                $req->execute(array($_SESSION['username']));
                $data = $req->fetch();
                if(password_verify($_POST['password'], $data['password'])){
                    $req = $bdd->prepare('UPDATE users SET mail = :mail_new WHERE username = :username'); //on prepare la requete de modification de mail
                    $req->execute(array( 
                    'mail_new' => $_POST['mail'], 
                    'username' => $_SESSION['username']) );
                    echo "Mail modifie avec succes.";
                }
                else{
                    echo "Mot de passe incorrect.";
                }
            }
            else{
                echo "Les deux adresses mail doivent etre identiques.";
            }
        echo "<p id = 'navigation'><a href=''>retour</a></br>";
        }
        else{
            echo "Entrez une adresse mail valide.
            <p id = 'navigation'><a href=''>retour</a></br>";
        }   
        ?>

        <a href="../../user/interface.php">retour interface utilisateur</a>
        </br>
    	<a href="../../accueil/Projet_CHERUBIM.php">accueil</a>
    </p>
	</body>
</html>

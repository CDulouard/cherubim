<!--page de destruction du compte utilisateur-->
<?php session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../../login/login.php');
  		exit();
  		}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Suppresion</title>
    </head>

    <body>
    	<h1>Supprimer le compte</h1>
        <?php
        
        if(isset($_POST['password'])){
            include('\wamp64\www\cherubim\site\ConnectToDB.php');
            $req = $bdd->prepare('SELECT password FROM users WHERE username =? ');//on recupere le mot de passe hashe de l utilisateur
            $req->execute(array($_SESSION['username']));
            $data = $req->fetch();
            if(password_verify($_POST['password'], $data['password'])){
                
                $req = $bdd->prepare('DELETE FROM users WHERE username =? ');//on prepare la demande de suppression
                $req->execute(array($_SESSION['username']));//on supprime le compte
                session_destroy();
                header('Location: msg_confirm.php'); //on redirige vers la page de confirmation
                exit();
            }
            else{
                echo "<p id = info>Mot de passe incorrect.<p>";
            } 
        }
        if(!isset($ok)){
            echo '

        <section id = \'formulaire\'>
            <form action="" method="post">

                <p>Entrez votre mot de passe : </p>
                <input type="password" autocomplete="on" placeholder="password" name="password" /> <br /> <br /> 

                <input type="submit" value="Supprimer" />

            </form>

        </section>';
        }
        ?>
    <p id = 'navigation'>
        <a href="../../user/interface.php">retour interface utilisateur</a>
        </br>
    	<a href="../../accueil/Projet_CHERUBIM.php">accueil</a>
    </p>
	</body>
</html>

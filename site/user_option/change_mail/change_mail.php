<!--page de changement de mail-->
<?php session_start();
	if(!isset($_SESSION['username'])){
		header('Location: /cherubim/site/accueil/login/login.php');
  		exit();
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
    	<h1>Modifier adresse mail</h1>
        <?php
        if(isset($_POST['mail'])){
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
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
                        $ok = 1;
                        echo "<p id = 'info'>Mail modifie avec succes.</p>";
                    }
                    else{
                        echo "<p id = 'info'>Mot de passe incorrect.</p>";
                    }
                }
                else{
                    echo "<p id = 'info'>Les deux adresses mail doivent etre identiques.</p>";

                }
            }
            else{
                echo "<p id = info>Entrez une adresse mail valide.<p>";
            } 
        }
        if(!isset($ok)){
            $mail = '';
            if (isset($_POST['mail'])) {
                $mail = $_POST['mail'];
            }
            $mail_confirm = '';
            if (isset($_POST['mail_confirm'])){
                $mail_confirm = $_POST['mail_confirm'];
            }
            echo '

        <section id = \'formulaire\'>
            <form action="" method="post">

                <p>Nouveau mail : </p>
                <input type="text" name="mail" placeholder="nouveau mail" value = "'.$mail.'" autocomplete="mail"/> <br /> <br /> 

                <p>Confirmez mail : </p>
                <input type="text" name="mail_confirm" placeholder="mail confirm" value = "'.$mail_confirm.'" autocomplete="mail"/> <br /> <br /> 
    
                <p>Mot de passe : </p>
                <input type="password" autocomplete="on" placeholder="password" name="password" /> <br /> <br /> 

                <input type="submit" value="Modifier" />

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

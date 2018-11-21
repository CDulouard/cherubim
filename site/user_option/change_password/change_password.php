<!--page de changement de mot de passe-->
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
        <title>Modifier mot de passe</title>
    </head>

    <body>
    	<h1>Modifier mot de passe</h1>
        <?php
        
        if(isset($_POST['password'])){
            if(preg_match("#^.{4,255}$#", $_POST['password_new'])){
                if($_POST['password_new'] == $_POST['password_confirm']){
                    include('../../modules/ConnectToDB.php');
                    $bdd = connectToDB('../../setting');;
                    $req = $bdd->prepare('SELECT password FROM users WHERE username =? ');//on recupere le mot de passe hashe de l utilisateur
                    $req->execute(array($_SESSION['username']));
                    $data = $req->fetch();
                    if(password_verify($_POST['password'], $data['password'])){
                        $req = $bdd->prepare('UPDATE users SET password = :password_new WHERE username = :username'); //on prepare la requete de modification de mail
                        $req->execute(array( 
                        'password_new' => password_hash($_POST['password_new'], PASSWORD_DEFAULT), 
                        'username' => $_SESSION['username']) );
                        $ok = 1;
                        echo "<p id = 'info'>Mot de passe modifie avec succes.</p>";
                    }
                    else{
                        echo "<p id = 'info'>Mot de passe incorrect.</p>";
                    }
                }
                else{
                    echo "<p id = 'info'>Les deux mots de passe doivent etre identiques.</p>";

                }
            }
            else{
                echo "<p id = info>Entrez un mot de passe d'une longueur comprise entre 4 et 255 caracteres.<p>";
            } 
        }
        if(!isset($ok)){
            echo '

        <section id = \'formulaire\'>
            <form action="" method="post">

                <p>Nouveau mot de passe : </p>
                <input type="password" autocomplete="on" placeholder="new password" name="password_new" /> <br /> <br /> 

                <p>Confirmez mot de passe : </p>
                <input type="password" autocomplete="on" placeholder="password confirm" name="password_confirm" /> <br /> <br /> 
    
                <p>Ancien mot de passe : </p>
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

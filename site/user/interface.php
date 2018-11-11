<!--interface utilisateur-->
<?php session_start();
	if(!isset($_SESSION['username'])){
		header('Location: ../login/login.php');
  		exit();
  		}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Interface utilisateur</title>
    </head>

    <body>
    	<h1>Interface utilisateur :</h1>
    	<aside id = 'user_info'>
    		<h2 id = 'username'><?php echo $_SESSION['username'];  ?></h2>
    		
    		<p id = 'user_mail'>
    		mail utilisateur : </br>
    		<?php echo $_SESSION['mail']; ?>
    		</p>

    		<p id = 'user_type' >
    		Privileges : </br>
    		<?php echo $_SESSION['type']; ?>
    		</p>

    	</aside>

    	<section id = 'user_options'>
    		<h2>Options :</h2>
    		<ul>
    			<li><a href="../user_option/change_password/change_password.php">Changer mot de passe</a></li>
    			<li><a href="../user_option/change_mail/change_mail.php">Changer adresse mail</a></li>
    			<li><a href="../user_option/delete_user/delete_user.php">Supprimer le compte</a></li>
    		</ul>
    	</section>

        <?php 
            if ($_SESSION['type'] == 'admin'){
                echo '
        <section id = \'admin_options\'>
            <h2>Gestion du site :</h2>
            <ul>
                <li><a href="../admin_option/creat_character/creat_character.php">Creer personnage</a></li>
                <li><a href="../admin_option/delete_character/delete_character.php">Supprimer personnage</a></li>

            </ul>
        </section>';
            }




        ?>


    	<a href="../accueil/Projet_CHERUBIM.php">accueil</a>
	</body>
</html>
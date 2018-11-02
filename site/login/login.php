<!--Formulaire pour la connexion-->
<?php session_start(); ?>
<form action="connect.php" method="post">

	<p>Nom d'utilisateur : </p>
 	<input type="text" name="username" placeholder="username" autocomplete="username"/> <br /> <br /> 
	
	<p>Mot de passe : </p>
 	<input type="password" autocomplete="on" placeholder="password" name="password" /> <br /> <br /> 

	<input type="submit" value="connexion" />

	<br /><a href="#">mot de passe oublie</a>
	<br /><a href="../register/register.php">Creer un compte</a>
	<br /><a href="../accueil/Projet_CHERUBIM.php">accueil</a>

</form>



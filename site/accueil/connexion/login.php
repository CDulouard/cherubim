<!--Formulaire pour la connexion-->
<?php session_start(); ?>
<form action="connect.php" method="post">

	<p>Nom d'utilisateur : </p>
 	<input type="text" name="username" autocomplete="username"/> <br /> <br /> 
	
	<p>Mot de passe : </p>
 	<input type="password" autocomplete="on" name="password" /> <br /> <br /> 

	<input type="submit" value="connexion" />

	<br /><a href="#">mot de passe oublie</a>
	<br /><a href="../../">acceuil</a>

</form>



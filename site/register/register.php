<!--Formulaire pour la creation de compte-->
<?php session_start(); ?>
<form action="creat.php" method="post">

	<p>Nom d'utilisateur : </p>
 	<input type="text" name="username" placeholder="username" autocomplete="username"/> <br /> <br /> 

 	<p>Mail : </p>
 	<input type="text" name="mail" placeholder="mail" autocomplete="mail"/> <br /> <br /> 

 	<p>Confirmez mail : </p>
 	<input type="text" name="mail_confirm" placeholder="mail confirm" autocomplete="mail"/> <br /> <br /> 
	
	<p>Mot de passe : </p>
 	<input type="password" autocomplete="on" placeholder="password" name="password" /> <br /> <br /> 

 	<p>Confirmez mot de passe : </p>
 	<input type="password" autocomplete="on" placeholder="password confirm" name="password_confirm" /> <br /> <br /> 

	<input type="submit" value="Creer" />

	<br /><a href="../login/login.php">Se connecter</a>
	<br /><a href="../accueil/Projet_CHERUBIM.php">Accueil</a>

</form>

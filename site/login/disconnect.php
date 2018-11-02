<!--Detruit la session utilisateur-->
<?php 

session_start();
session_destroy();
echo "Deconnection effectuee avec succes.</br> <p><a href ='../accueil/Projet_CHERUBIM.php' >Retour a l'accueil</a></p>";
?>
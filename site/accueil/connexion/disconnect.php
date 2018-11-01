<!--Detruit la session utilisateur-->
<?php 

session_start();
session_destroy();
echo "Deconnection effectuee avec succes.</br> <p>Retour a l'<a href ='../../' >accueil</a></p>";
?>
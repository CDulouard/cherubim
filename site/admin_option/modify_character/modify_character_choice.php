<!--page de modification de personnage-->
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
        <title>Choix personnage</title>
    </head>

    <body>
        <?php
        include('../../modules/ConnectToDB.php');
        $bdd = connectToDB('../../setting');
        $data = $bdd->query('SELECT * FROM characters');
        echo '
          <form action="modify_character.php" method="post">
            
            <input type="hidden" name="first_call" value="1">

            <p>Choisissez le personnage a modifier :</p>

            <select name="choice">';

      while ($elt = $data->fetch()) {
        echo '<option value="'.$elt['id'].'"> id:'.$elt['id'].' : '.$elt['first_name'].' '.$elt['last_name'].'</option>';
      }
        echo '
            </select>
            <input type="submit" value="Modifier">
          </form>
        ';
      
       ?>



        <p id = 'navigation'>
            <a href="../../user/interface.php">retour interface utilisateur</a>
            </br>
         <a href="../../accueil/Projet_CHERUBIM.php">accueil</a>
        </p>
  </body>
</html>
<!--page de suppression de personnage-->
<?php session_start();
  if(!isset($_SESSION['username'])){
    header('Location: ../../login/login.php');
      exit();
      }
  if($_SESSION['type'] == 'user'){
    header('Location: ../../user/interface.php');
    exit();
  }
 ?>

 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../../css/textedit.css" />
        <title>Creer personnage</title>
    </head>

    <body>

    	<?php
    	include('../../../site/modules/ConnectToDB.php');
    	
    	if(isset($_POST['choice'])){
    		$req = $bdd->prepare('SELECT * FROM users WHERE username = ?');
    		$req->execute(array($_SESSION['username']) );
    		$data = $req->fetch();
    		if(password_verify($_POST['password'], $data['password'])){
    			$req = $bdd->prepare('DELETE FROM characters WHERE id = ?');
    			$req->execute(array($_POST['choice']));
    			echo "Personnage supprime avec succes.";
    			$ok = 1;
    		}
    		else{
    			echo 'Mot de passe incorrect.';
    		}

    	}
    	
    	if(!isset($ok)){

    		$lastSelection = "";
    		if(isset($_POST['choice'])){
    			$lastSelection = $_POST['choice'];
    		}

    		$data = $bdd->query('SELECT * FROM characters');
    		echo '
    			<form action="" method="post">
    				
    				<p>Choisissez le personnage a supprimer :</p>

    				<select name="choice">';

    	while ($elt = $data->fetch()) {
    		$selected = "";
    		if($lastSelection == $elt['id']){
    			$selected = "selected";
    		}
    		echo '<option value="'.$elt['id'].'" '.$selected.'> id:'.$elt['id'].' : '.$elt['first_name'].' '.$elt['last_name'].'</option>';
    	}



    		echo '
    				</select>

    				<p>Entrez votre mot de passe :</p>
    				<input type="password" name="password">

    				<input type="submit" value="Supprimer">

    			</form>
    		';
    	}
    	 ?>

        <p id = 'navigation'>
            <a href="../../user/interface.php">retour interface utilisateur</a>
            </br>
    	   <a href="../../accueil/Projet_CHERUBIM.php">accueil</a>
        </p>
	
	</body>
</html>

<!--page de modification de personnage-->
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

 <?php
    if(!isset($_POST['choice'])){
        header('Location: modify_character_choice.php');
        exit();
        }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../../css/textedit.css" />
        <title>Modifier personnage</title>
    </head>

    <body>
    	
<?php
    include('../../modules/ConnectToDB.php');
    $bdd = connectToDB('../../setting');
    if (isset($_POST['first_name'])) {
        if ($_POST['first_name'] != '') {
            
            

            $req = $bdd->prepare('UPDATE characters SET first_name = :first_name, last_name = :last_name, birth = :birth, article = :article WHERE id = :id '); //on prepare la requete de modification de mail
            
            $req->execute(array( 
                'first_name' => $_POST['first_name'], 
                'last_name' => $_POST['last_name'],
                'birth' => $_POST['birth'],
                'article' => $_POST['text'],
                'id' => $_POST['choice']

            ) );
            
            $ok = 1;
            echo "Personnage modifie avec succes!";
        }
        else{
            echo'<p class = "info" >Entrez un prenom </p>';

        }
    }
    if(!isset($ok)){
        
         $last_name = '';
            if (isset($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
            }
        $birth = '';
            if (isset($_POST['birth'])){
                $birth = $_POST['birth'];
            }
        $text = '';
            if (isset($_POST['text'])){
                $text = $_POST['text'];
        }
        $first_name = '';

        if(isset($_POST['first_call'])){
            $req = $bdd->prepare('SELECT * FROM characters WHERE id = ?');
            $req->execute(array($_POST['choice']));
            $data = $req->fetch();
            
            $last_name = $data['last_name'];
            $first_name = $data['first_name'];
            $birth = $data['birth'];
            $text = $data['article'];
        }

        echo'

        <h1>Creer personnage</h1>
  
        <form action="" method="post" id="edit" enctype="multipart/form-data">

            <input type="hidden" name="choice" value="'.$_POST['choice'].'"> 

            <p>Prenom du personnage :</p>
            <input type="text" name="first_name" value="'.$first_name.'">

            <p>Nom du personnage :</p>
            <input type="text" value="'.$last_name.'" name="last_name">

            <p>Date de naissance du personnage :</p>
            <input type="text" value="'.$birth.'"  name="birth">


        </br>
        <p>Histoire du personnage :</p>';
        include("../../modules/textedit.php");
        echo '
            <input type="button" onclick="resultat2();" value="Modifier personnage" ></code><br /> 

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

<!--page de creation de personnage-->
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
        
    if (isset($_POST['first_name'])) {
        if ($_POST['first_name'] != '') {
            
            include('../../modules/ConnectToDB.php');
            $bdd = connectToDB('../../setting');

            $req = $bdd->prepare('INSERT INTO characters(first_name, last_name, birth, article) VALUES(:first_name, :last_name, :birth, :article)'); //on prepare la requete de modification de mail
            
            $req->execute(array( 
                'first_name' => $_POST['first_name'], 
                'last_name' => $_POST['last_name'],
                'birth' => $_POST['birth'],
                'article' => $_POST['text']

            ) );
            
            $ok = 1;
            echo "Personnage cree avec succes!";
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

        echo'

        <h1>Creer personnage</h1>
  
        <form action="" method="post" id="edit" enctype="multipart/form-data">

            <p>Prenom du personnage :</p>
            <input type="text" name="first_name">

            <p>Nom du personnage :</p>
            <input type="text" value="'.$last_name.'" name="last_name">

            <p>Date de naissance du personnage :</p>
            <input type="text" value="'.$birth.'"  name="birth">


        </br>
        <p>Histoire du personnage :</p>';
        include("../../modules/textedit.php");
        echo '
            <input type="button" onclick="resultat2();" value="Creer personnage" ></code><br /> 

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

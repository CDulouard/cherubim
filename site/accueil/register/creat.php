<!--Effectue les verifications necessaires a la creation d un compte et le cree si tout est correct-->

<?php 
session_start();
//on essaye de recuperer les parametres pour acceder a la base de donnee 

try{
	$setting = fopen('../../setting', 'r'); //on ouvre setting en lecture seule

	$host = fgets($setting); //on recupere la ligne de host et on enleve les caracteres indesirables
	$host = str_replace ( "host=" , '' , $host);
	$host = rtrim($host);

	$dbname = fgets($setting);//on recupere la ligne de dbname et on enleve les caracteres indesirables
	$dbname = str_replace ( "dbname=" , '' , $dbname);
	$dbname = rtrim($dbname);

	$charset = fgets($setting); //on recupere la ligne de charset et on enleve les caracteres indesirables
	$charset = str_replace ( "charset=" , '' , $charset);
	$charset = rtrim($charset);

	$db_User = fgets($setting);//on recupere la ligne de user et on enleve les caracteres indesirables
	$db_User = str_replace ( "user=" , '' , $db_User);
	$db_User = rtrim($db_User);

	$db_Password = fgets($setting); //on recupere la ligne de password et on enleve les caracteres indesirables
	$db_Password = str_replace ( "password=" , '' , $db_Password);
	$db_Password = rtrim($db_Password);

	fclose($setting); //on ferme setting
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//on essaye de se connecter a la bdd en utilisant les parametres recuperes
try 
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset='.$charset, $db_User, $db_Password); 

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//on essaye de creer l utilisateur admin

try{
	
	$req = $bdd->prepare('SELECT * FROM users WHERE username = ?'); //on prepare la requete pour le serveur
	
	if($req->execute(array($_POST['username']) ) ){
		if($data = $req->fetch()){
			echo "Nom d'utilisateur non disponible.";
		}
		else{
			if(preg_match("#^.{4,255}$#", $_POST['username'])){
				
				if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
					
					if($_POST["mail"] == $_POST["mail_confirm"]){
						
						if(preg_match("#^.{4,255}$#", $_POST['password'])){
							
							if($_POST['password'] == $_POST['password_confirm']){
								
								$req = $bdd->prepare('INSERT INTO users(username, password, mail, type) VALUES(:username, :password, :mail, :type)'); //on prepare la requette pour le serveur
								if($req->execute(array(  //et on cree l admin
									'username' => $_POST['username'],
									'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
									'mail' => $_POST["mail"],
									'type' => 'user'
								))){
									echo "Utilisateur cree avec succes!";
								}
								else{
									
									echo "Erreur lors de la création de l'utilisateur";

								}

							}
							else{
								echo "Les deux mots de passe doivent être identiques";
							}
						}
						else{
							echo "Le mot de passe dois contenir entre 4 et 255 caracteres.";
						}
					
					}
					else{
						echo "Les deux adresses mail ne sont pas identiques.";
					}


				}
				else{
					echo "Entrez une adresse mail valide.";
				}

			}
			else{
				echo "Le nom d'utilisateur doit contenir entre 4 et 255 caracteres.";
			}
			
		}
		

	}
	else{
		echo "error";
	}

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>



</br>
<a href="../../">accueil</a>
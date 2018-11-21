<?php


function connectToDB($path)
{
    try{
		echo realpath('./ConnectToDB.php');
		$setting = fopen($path, 'r'); //on ouvre setting en lecture seule

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
	catch(Exception $e){
    	die('Erreur : '.$e->getMessage());
    	return(1);
	}


//on essaye de se connecter a la bdd en utilisant les parametres recuperes
	try 
	{
		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset='.$charset, $db_User, $db_Password); 
		return $db;
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
        return(2);
	}
    
	}


?>
<?php
	session_start();
	if(isset($_POST['id']) && isset($_POST['passw'])&&isset($_POST['UserType']))
	{
	echo"<meta charset=\"utf-8\">";
	//echo "<link rel=\"stylesheet\"type=\"text/css\" href =\"dupondStyle.css\">";
	//identifier base de donnée
	$database = "hxh";

	//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);

	//$id = isset($_POST["id"])? $_POST["id"] : "";
	//$passw = isset($_POST["passw"])? $_POST["passw"] : "";
	
	// on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $id = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['id'])); 
    $passw = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['passw']));
    $type =mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['UserType']));;
    
    if($id !== "" && $passw !== "" &&$type!=="")
    {
        $requete = "SELECT count(*) FROM login where 
              Pseudo = '".$id."' and Password = '".$passw."' and AccountType='".$type."' ";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            

           header('Location: index.html?nom=$id&mdp=$passw&compte=$type');
        
        }
        else
        {
           header('Location: Log.php?erreur=1'); // utilisateur ou mot de passe incorrect
        	
        }
    }
    else
    {
       header('Location: Log.php?erreur=2'); // utilisateur ou mot de passe vide
    	
    }
//fermer la connexion
	mysqli_close($db_handle);

	
	}
	?>

	
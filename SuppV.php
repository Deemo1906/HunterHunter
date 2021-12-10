<?php
	session_start();
	
	echo"<meta charset=\"utf-8\">";
	//echo "<link rel=\"stylesheet\"type=\"text/css\" href =\"dupondStyle.css\">";
	//identifier base de donnée
	$database = "hxh";

	//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);


	$suppr = isset($_POST["suppr"])? $_POST["suppr"] : "";
    
	echo"$suppr";
    
    
   
        $requete = "DELETE FROM vendeur where 
              Pseudo = '".$suppr."' ";
        $exec_requete = mysqli_query($db_handle,$requete);

        $requete1 = "DELETE FROM login where 
              Pseudo = '".$suppr."' ";
        $exec_requete1 = mysqli_query($db_handle,$requete1);


        
        header('Location: index.php');
        
    
//fermer la connexion
	mysqli_close($db_handle);

	
	

	?>

	
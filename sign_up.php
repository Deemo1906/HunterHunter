<?php
session_start();

	if(isset($_POST['name']) && isset($_POST['pseudo'])&&isset($_POST['mail']) && isset($_POST['passw']))
	{

echo"<meta charset=\"utf-8\">";
$database = "hxh";

//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);

	/*$name = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['name'])); 
	$pseudo = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['pseudo'])); 
	$mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
    $passw = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['passw']));
    $choice = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['choice']));*/

    $name = isset($_POST["name"])? $_POST["name"] : "";
    $pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
    $mail = isset($_POST["mail"])? $_POST["mail"] : "";
    $passw = isset($_POST["passw"])? $_POST["passw"] : "";
    $choice = isset($_POST["choice"])? $_POST["choice"] : "";
  
    
    if($pseudo !== "" && $passw !== "" &&$mail!=="" && $name!=="" &&$choice!=="")
    {
    	if($choice=="client")
    	{

    	$requete = "SELECT count(*) FROM client where 
              Pseudo = '".$pseudo."' or Mail = '".$mail."'";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count==0)
        {
    	
    		$sql = "INSERT INTO client (Name, Mail, Pseudo, Password)
	VALUES('$name','$mail','$pseudo','$passw')";
    		mysqli_query($db_handle,$sql);

    	$sql1 = "INSERT INTO login ( Pseudo, Password,AccountType)
	VALUES('$pseudo', '$passw','$choice')";
	mysqli_query($db_handle,$sql1);

		header('Location: Log.php?erreur=3');
		}

		else {
		header('Location: sign.php?erreur=4');
	}

	
		}

		if($choice=="vendeur")
    	{
    		$requete = "SELECT count(*) FROM vendeur where 
              Pseudo = '".$pseudo."' or Mail = '".$mail."'";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        if($count==0)
        {
    		$sql="INSERT INTO vendeur (Name, Mail, Pseudo, Password)
        
	VALUES( '$name', '$mail', '$pseudo', '$passw')";
    mysqli_query($db_handle,$sql);

    	$sql1 = "INSERT INTO login (Pseudo, Password,AccountType)
	VALUES('$pseudo', '$passw','$choice')";
	mysqli_query($db_handle,$sql1);
	header('Location: Log.php?erreur=3');
	}
	else {
		header('Location: sign.php?erreur=4');
	}
	}

}


else{

	mysqli_close($db_handle);
	header('Location: sign.php?erreur=5');
}
		

}


?>

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

	$name = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['name'])); 
	$pseudo = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['pseudo'])); 
	$mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
    $passw = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['passw']));
    $choice = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['choice']));
    
    
   


    if(isset($_POST['summit']))
    {
    
    	if($choice=="client")
    	{
    		$sql = "INSERT INTO client (Name, Mail, Pseudo, Password)
	VALUES( $name, $mail, $pseudo, $passw)";
    mysqli_query($db_handle,$sql);

    		$sql1 = "INSERT INTO login ( Pseudo, Password,AccountType)
	VALUES(  $pseudo, $passw ,$choice)";

	mysqli_query($db_handle,$sql1);
		}

		if($choice=="vendeur")
    	{
    		$sql="INSERT INTO vendeur (Name, Mail, Pseudo, Password)
	VALUES( $name, $mail, $pseudo, $passw)";
    mysqli_query($db_handle,$sql);

    	$sql1 = "INSERT INTO login ( Pseudo, Password,AccountType)
	VALUES(  $pseudo, $passw ,$choice)";
	mysqli_query($db_handle,$sql1);
		


	}
}

	
}

?>
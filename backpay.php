<?php
session_start();

	if(isset($_POST['adress']) && isset($_POST['city'])&&isset($_POST['postcode']) && isset($_POST['country']) && isset($_POST['tel']) && isset($_POST['card']) && isset($_POST['cardnum']) && isset($_POST['cardname']) && isset($_POST['datexp']) && isset($_POST['crypto']))
	{

echo"<meta charset=\"utf-8\">";
$database = "hxh";

//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);

    $adress = isset($_POST["adress"])? $_POST["adress"] : "";
    $city = isset($_POST["city"])? $_POST["city"] : "";
    $postcode = isset($_POST["postcode"])? $_POST["postcode"] : "";
    $country = isset($_POST["country"])? $_POST["country"] : "";
    $tel = isset($_POST["tel"])? $_POST["tel"] : "";
    $cardtype = isset($_POST["card"])? $_POST["card"] : "";
    $cardnum = isset($_POST["cardnum"])? $_POST["cardnum"] : "";
    $cardname = isset($_POST["cardname"])? $_POST["cardname"] : "";
    $datexp = isset($_POST["datexp"])? $_POST["datexp"] : "";
    $crypto = isset($_POST["crypto"])? $_POST["crypto"] : "";     
    $submit = isset($_POST["submit"])? $_POST["submit"] : "";

      if($adress !== "" && $city !== "" && $postcode!=="" && $country!=="" &&$tel!=="" && $cardtype !== "" && $cardnum !== "" && $cardname !== "" && $datexp !== "" && $crypto !== ""  )
    {    

    	if($submit=='Validate')
    	{

    		$pseudo = $_SESSION['name'];

    		$requete = "SELECT count(*) FROM client where 
              Pseudo = '$pseudo'";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        

    	if ($count!==0) {

    		$sqlpay = "UPDATE client
                  SET Adress='$adress', City='$city', PostalCode='$postcode', Country='$country', NumTel='$tel', CardType='$cardtype', CardNum='$cardnum', CardName='cardname', DateExp='$datexp', CardCode='$crypto' WHERE Pseudo='$pseudo'";
                  mysqli_query($db_handle,$sqlpay);
			header('Location: pay.php?erreur=1');    	}


}

}
else
{
	mysqli_close($db_handle);
	header('Location: pay.php?erreur=2');
}

}
?>
<?php

session_start();
	
	echo"<meta charset=\"utf-8\">";
	
	//identifier base de donnée
	$database = "hxh";

	//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);


	$imgName = $_GET['imgB'];
	$Atype = $_SESSION['Atype'];
	//$pseudo = $_SESSION['name'];
	//echo"ca marche ptnn $imgName";

	if($Atype=="client")
	{

	$sqlt = "SELECT IdClient FROM client where Pseudo = '".$_SESSION['name']."'";
        		$exec_sqlt = mysqli_query($db_handle,$sqlt);
        		$data = mysqli_fetch_assoc($exec_sqlt);

            $idClient=$data['IdClient'];

            $requete = "SELECT count(*) FROM panier where 
              IdClient = '".$idClient."'  ";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        		if($count==0)
        		{
            	
        		$sql = "INSERT INTO panier (IdClient)
	VALUES('$idClient')";
    		mysqli_query($db_handle,$sql);
    		}

    		///////Inserer dans comporter

    		$sqlC = "SELECT Iditem FROM item WHERE Photo = '$imgName'";
			$exec_sqlC = mysqli_query($db_handle,$sqlC);
			$dataC = mysqli_fetch_assoc($exec_sqlC);
			$Iditem = $dataC['Iditem'];

			$sqlP = "SELECT IdPanier FROM panier WHERE IdClient = '$idClient'";
			$exec_sqlP = mysqli_query($db_handle,$sqlP);
			$dataP = mysqli_fetch_assoc($exec_sqlP);
			$IdPanier = $dataP['IdPanier'];
			echo $Iditem;
			$sqlComp="INSERT INTO comporter (IdItem,IdPanier) VALUES('$Iditem','$IdPanier') ";
			mysqli_query($db_handle,$sqlComp);
    	}
    	 header('Location: index.php');
    	mysqli_close($db_handle);
	?>
<?php

session_start();
	
	echo"<meta charset=\"utf-8\">";
	
	//identifier base de donnée
	$database = "hxh";

	//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);


	
	$Atype = $_SESSION['Atype'];
	//$pseudo = $_SESSION['name'];
	//echo"ca marche ptnn $imgName";

	if($Atype=="client")
	{

	$sqlt = "SELECT IdClient,Adress,City,PostalCode,Country,Name FROM client where Pseudo = '".$_SESSION['name']."'";
        		$exec_sqlt = mysqli_query($db_handle,$sqlt);
        		$data = mysqli_fetch_assoc($exec_sqlt);

            $idClient=$data['IdClient'];
            $Name=$data['Name'];
            $Adress=$data['Adress'];
            $City=$data['City'];
            $PostalCode=$data['PostalCode'];
            $Country=$data['Country'];

            echo"$idClient<br> $Name <br> $Adress<br>$City<br>$PostalCode<br>$Country<br>";

            ///////
            $sqlP = "SELECT IdPanier FROM panier WHERE IdClient = '$idClient'";
			$exec_sqlP = mysqli_query($db_handle,$sqlP);
			$dataP = mysqli_fetch_assoc($exec_sqlP);
			$IdPanier = $dataP['IdPanier'];
			echo"$IdPanier<br><br>";

			////////////
				/*
				$sqlC = "SELECT Iditem FROM comporter WHERE IdPanier = '$IdPanier'";
			$exec_sqlC = mysqli_query($db_handle,$sqlC);
			while($dataC = mysqli_fetch_assoc($exec_sqlC))
			{
			
			$Iditem = $dataC['Iditem'];
			//echo"$Iditem<br>";
			$sqlI="SELECT item.Iditem,item.Price FROM item,panier,comporter WHERE panier.IdClient = '$Idclient'and comporter.IdPanier=Panier.IdPanier and comporter.IdItem=item.Iditem";
			$exec_sqlI = mysqli_query($db_handle,$sqlI);

		}*/
		$sqlI="SELECT item.Iditem,item.Price FROM item,panier,comporter WHERE panier.IdClient = '$idClient'and comporter.IdPanier=Panier.IdPanier and comporter.IdItem=item.Iditem";
			$exec_sqlI = mysqli_query($db_handle,$sqlI);
		//Inserer nouvelle(s) commande(s) si on l'on compte le même idpanier
		while($dataI = mysqli_fetch_assoc($exec_sqlI))
		{
				$NumItem=$dataI['Iditem'];
				$Price=$dataI['Price'];

				echo"$NumItem  $Price<br>";


				$requete = "SELECT count(*),IdCommande FROM commande where 
              IdPanier = '".$IdPanier."'  ";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        $Idcommande=$reponse['IdCommande'];

        echo"$count  $Idcommande<br><br>";

        		//if($count==0)
        		//{
            	
        		$sql = "INSERT INTO commande (Adress,City,PostalCode,Country,Price,NomAcheteur,NumItem,IdPanier)
	VALUES('$Adress','$City','$PostalCode','$Country','$Price','$Name','$NumItem','$IdPanier')";
    		mysqli_query($db_handle,$sql);
    		//}
    		//else
    		/*{
    			$sql = "INSERT INTO commande (IdCommande,Adress,City,PostalCode,Country,Price,NomAcheteur,NumItem,IdPanier)
	VALUES('$Idcommande','$Adress','$City','$PostalCode','$Country','$Price','$Name','$NumItem','$IdPanier')";
    		mysqli_query($db_handle,$sql);

    		}*/
		}

			///////////

           /* $requete = "SELECT count(*) FROM panier where 
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

    		/*$sqlC = "SELECT Iditem FROM item WHERE Photo = '$imgName'";
			$exec_sqlC = mysqli_query($db_handle,$sqlC);
			$dataC = mysqli_fetch_assoc($exec_sqlC);
			$Iditem = $dataC['Iditem'];

			$sqlP = "SELECT IdPanier FROM panier WHERE IdClient = '$idClient'";
			$exec_sqlP = mysqli_query($db_handle,$sqlP);
			$dataP = mysqli_fetch_assoc($exec_sqlP);
			$IdPanier = $dataP['IdPanier'];

			$sqlComp="INSERT INTO comporter (IdItem,IdPanier) VALUES('$Iditem','$IdPanier') ";
			mysqli_query($db_handle,$sqlComp);*/
    	}
    	header('Location: index.php');
    	mysqli_close($db_handle);
	?>
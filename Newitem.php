<?php
	session_start();
	if(isset($_POST['name']) && isset($_POST['description'])&&isset($_POST['price'])&&isset($_POST['saletype'])&&isset($_POST['category'])&&isset($_POST['photo']))
	{
	echo"<meta charset=\"utf-8\">";
	//echo "<link rel=\"stylesheet\"type=\"text/css\" href =\"dupondStyle.css\">";
	//identifier base de donnée
	$database = "hxh";

	//se connecter à la BDD
	//rappel: serveur = localhost/phpmyadmin login = root  mdp= Rien
	$db_handle = mysqli_connect('localhost','root','');
	$db_found = mysqli_select_db($db_handle, $database);


	$name = isset($_POST["name"])? $_POST["name"] : "";
    $description = isset($_POST["description"])? $_POST["description"] : "";
    $price = isset($_POST["price"])? $_POST["price"] : "";
    $saletype = isset($_POST["saletype"])? $_POST["saletype"] : "";
    $category = isset($_POST["category"])? $_POST["category"] : "";
    $photo = isset($_POST["photo"])? $_POST["photo"] : "";
	
    
    
    if($name !== "" && $description !== "" &&$price!=="" && $saletype !== "" && $category !== "" &&$photo!=="")
    {
        $requete = "SELECT count(*) FROM item where 
              Name = '".$name."' ";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count==0) // nom d'utilisateur et mot de passe correctes
        {
        	if($_SESSION['Atype']=="vendeur")
        	{
        		$sqlt = "SELECT IdVendeur FROM vendeur where Pseudo = '".$_SESSION['name']."'";
        		$exec_sqlt = mysqli_query($db_handle,$sqlt);
        		$data = mysqli_fetch_assoc($sqlt);
            
        		$sql = "INSERT INTO item (Name, Description, Price, SaleType,Category,Photo,IdAdmin,Idvendeur)
	VALUES('$name','$Description','$price','$saletype','$category','photo',1,$data['IdVendeur'])";
    		mysqli_query($db_handle,$sql);
           header('Location: index.php');

        }

        if($_SESSION['Atype']=="admin")
        	{
        		$sqlt = "SELECT IdAdmin FROM admin where Pseudo = '".$_SESSION['name']."'";
        		$exec_sqlt = mysqli_query($db_handle,$sqlt);
        		$data = mysqli_fetch_assoc($sqlt);
            
        		$sql = "INSERT INTO item (Name, Description, Price, SaleType,Category,Photo,IdAdmin,Idvendeur)
	VALUES('$name','$Description','$price','$saletype','$category','photo',$data['IdAdmin'],2)";
    		mysqli_query($db_handle,$sql);
           header('Location: index.php');

        }
        
        }
        else
        {
           header('Location: ItemSetting.php?erreur=1'); // article déjà existant
        	
        }
    }
    else
    {
       header('Location: ItemSetting.php?erreur=2'); // champ(s) vide(s)
    	
    }
//fermer la connexion
	mysqli_close($db_handle);

	
	}

	?>

	
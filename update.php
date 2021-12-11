<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hxh";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$bid = $_GET['bid'];
$imgName = $_GET['img'];

$data = "SELECT Price,Iditem FROM item WHERE Photo = '$imgName'";
$price = mysqli_query($conn,$data);
$pricefetch = mysqli_fetch_assoc($price);
$pricefin = $pricefetch['Price'];
$IdItem = $pricefetch['Iditem'];


$Atype = $_SESSION['name'];
$sqlt = "SELECT IdClient FROM client where Pseudo = '$Atype'";
$exec_sqlt = mysqli_query($conn,$sqlt);
$dataid = mysqli_fetch_assoc($exec_sqlt);

$idClient=$dataid['IdClient'];

$sql_idclient = "SELECT IdClient FROM auction where Iditem = '$IdItem'";
$exec_sql_client = mysqli_query($conn,$sql_idclient);





if ($pricefin < $bid) {
    $send = "UPDATE item SET Price = '$bid' WHERE Photo = '$imgName'";

    if(mysqli_query($conn,$send)){
        if($dataidC = mysqli_fetch_assoc($exec_sql_client)){
            $sendit = "UPDATE auction SET IdClient = '$idClient' WHERE IdItem = '$IdItem'";
            mysqli_query($conn,$sendit);
        }else{
            echo "no update";
            $sqlComp="INSERT INTO auction (IdClient,IdItem) VALUES('$idClient','$IdItem') ";
			mysqli_query($conn,$sqlComp);
        }


    }else{
        echo "not good";
    }
}else{
    echo "price not right";
}

header('Location: index.php');



?>
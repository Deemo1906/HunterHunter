<?php

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

$data = "SELECT Price FROM item WHERE Photo = '$imgName'";
$price = mysqli_query($conn,$data);
$pricefetch = mysqli_fetch_assoc($price);
$pricefin = $pricefetch['Price'];

echo $bid;
echo "<br>";
echo $pricefin;



if ($pricefin < $bid) {
    $send = "UPDATE item SET Price = '$bid' WHERE Photo = '$imgName'";

    if(mysqli_query($conn,$send)){
        echo "all good";
    }else{
        echo "not good";
    }
}else{
    echo "price not right";
}

header('Location: index.php');



?>
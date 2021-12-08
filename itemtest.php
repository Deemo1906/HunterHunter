<?php
echo "<meta charset=\"utf-8\">";
//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"dupontStyle.css\">";
//identifier votre BDD
$database = "hxh";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);




$sql = "";
//Si la BDD existe
if ($db_found) {
//code MySQL. $sql est basé sur le choix de l’utilisateur

$sql = "SELECT Name,Description,Price,Category,Photo FROM item where Name LIKE 'S%'";


$result = mysqli_query($db_handle, $sql);

while ($data = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $data['Name'] . "</td><br>";
echo "<td>" . $data['Description'] . "</td><br>";
echo "<td>" . $data['Price'] . "</td><br>";
echo "<td>" . $data['Category'] . "</td><br>";
$image=$data['Photo'];
echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td><br>";
echo "</tr>";
}
echo "</table>";
} else {
echo "<br>Database not found";
}
//fermer la connexion
mysqli_close($db_handle);
?>
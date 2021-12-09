<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hunter association official site</title>
</head>
<body id="main">
    <form action="backpay.php" method="post">
    <div id = "login">
        <img src="logo_main.png" alt="logos">
        <br>
        <div id = "left">
            <tr>
                <td id="text">Adress:</td>
                <br>
                <td><input type="text" name="adress"></td>
            </tr>
            <tr>
                <td id="text">City:</td>
                <br>
                <td><input type="text" name="city"></td>
            </tr>
            <tr>
                <td id="text">Postal Code:</td>
                <br>
                <td><input type="number" name="postcode"></td>
            </tr>
            <tr>
                <td id="text">Country:</td>
                <br>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td id="text">Phone number:</td>
                <br>
                <td><input type="number" name="tel"></td>
            </tr>
        </div>
        <div id = "right">
            <tr>
                <td id="text">Card Type:</td>
                <br>
                <td><input type="text" name="card"></td>
            </tr>
            <tr>
                <td id="text">Card-num:</td>
                <br>
                <td><input type="number" name="cardnum"></td>
            </tr>
            <tr>
                <td id="text">Name Holder:</td>
                <br>
                <td><input type="text" name="cardname"></td>
            </tr>
            <tr>
                <td id="text">Date Exp:</td>
                <br>
                <td><input type="date" name="datexp"></td>
            </tr>
            <tr>
                <td id="text">Cryptogram:</td>
                <br>
                <td><input type="number" name="crypto"></td>
            </tr>
        </div>
        <br>
        <tr>
        <br>
        <td ><h3 style="color:black;">_</h3></td>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Validate">
        </td>
        </tr>
        <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                    {
                        echo "<p style='color:red'>Vos données ont bien été enregistrées<br> </p>";

                    }
                    elseif($err==2)
                    {
                        echo"<p style='color:red'>Veuillez remplir tous les champs pour valider le paiement<br></p>";
                    }
                }
        ?>
        <p>Pour retourner au menu principal: Cliquez <a href="index.php">ici</a><br></p>

        <h3 style="color: red;">Any unauthorized use of this site will result in deadly force</h3>
    </div>
    </form>
    <script src="index.js"></script> 
</body>
</html>
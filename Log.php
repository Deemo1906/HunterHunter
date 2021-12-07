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
    <form action="login.php" method="post">
    <div id = "login">
        <img src="logo_main.png" alt="logos">
        <br>
        <tr>
            <td id="text">Name:</td>
            <br>
            <td><input type="text" name="id"></td>
        </tr>
        <br>
        <tr>
            <td id="text">Password</td>
            <br>
            <td><input type="password" name="passw"></td>
        </tr>
        <br>
        <tr>
            <td id="text">AccountType</td>
            <br>
            <td>
                <SELECT name="UserType">
                <OPTION VALUE="admin">Admin</OPTION>
                <OPTION VALUE="vendeur">Seller</OPTION>
                <OPTION VALUE="client">Customer</OPTION>



                </SELECT>
            </td>
        </tr>
       
        <tr>
        <br><br><br>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Login">
        </td>
        <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect<br> </p>";
                }
        ?>
        <p>Si vous n'avez pas de compte Hunter: Cliquez <a href="sign.php">ici</a></p>
        </tr>
        <h3 style="color: red;">Any unauthorized use of this site will result in deadly force</h3>
    </div>
    </form>
    <script src="index.js"></script>
</body>
</html>
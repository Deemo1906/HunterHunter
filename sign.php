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
    <form action="sign_up.php" method="post">
    <div id = "login">
        <img src="logo_main.png" alt="logos">
        <br>
        <tr>
            <td id="text">Name:</td>
            <br>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td id="text">Pseudo:</td>
            <br>
            <td><input type="text" name="pseudo"></td>
        </tr>
        <td id="text">Mail:</td>
            <br>
            <td><input type="text" name="mail"></td>
            <td id="text">Password</td>
            <br>
            <td><input type="password" name="passw"></td>
        </tr>

        <tr>
            <td id="text">Seller <input type="radio"  name="choice"value="vendeur">
                </td>
                <br>

        </tr>
        <tr>
            <td id="text">Customer <input type="radio"  name="choice"value="client">
                </td>
                <br>

        </tr>


        <br>
        <tr>
        <br>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Sign-up">
        </td>
        </tr>
        <h3 style="color: red;">Any unauthorized use of this site will result in deadly force</h3>
    </div>
    </form>
    <script src="index.js"></script>
</body>
</html>
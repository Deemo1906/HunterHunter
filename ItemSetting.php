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
    <form action="Newitem.php" method="post">
    <div id = "login">
        <img src="logo_main.png" alt="logos">
        <br>
        <div id = "left">
            <tr>
                <td id="text">Name:</td>
                <br>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td id="text">Description:</td>
                <br>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td id="text">Price:</td>
                <br>
                <td><input type="text" name="price"></td>
            </tr>
            
        </div>
        <div id = "right">
            <tr>
                <td id="text">Saletype:</td>
                <br>
                <td><input type="text" name="saletype"></td>
            </tr>
            <tr>
                <td id="text">Category:</td>
                <br>
                <td><input type="text" name="category"></td>
            </tr>
            <tr>
                <td id="text">Photo:</td>
                <br>
                <td><input type="text" name="photo"></td>
            </tr>
            
        </div>
        
        <br>
        <tr>
        <br>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="AddNewItem">
        </td>

        </tr>

        <h3 style="color: red;">Any unauthorized use of this site will result in deadly force</h3>
    </div>
    </form>
    <script src="index.js"></script>
</body>
</html>
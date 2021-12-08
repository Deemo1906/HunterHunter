<?php
session_start();
echo "<meta charset=\"utf-8\">";
//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"dupontStyle.css\">";
//identifier votre BDD
$database = "hxh";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

$sql = "";
//Si la BDD existe
if ($db_found) {
$sql = "SELECT Name,Description,Price,Category,Photo FROM item where Name='Scarlet eyes'";
$sql2 = "SELECT Name,Description,Price,Category,Photo FROM item where Name LIKE 'Son%'";
$sql3 = "SELECT Name,Description,Price,Category,Photo FROM item where Name LIKE 'Gun%'";

$sqlD = "SELECT * FROM item where SaleType = 'Direct'";
$sqlA = "SELECT * FROM item where SaleType = 'Auction'";


$resultA = mysqli_query($db_handle, $sqlA);
$resultD = mysqli_query($db_handle, $sqlD);


$imgA = [];
$descA = [];
$priceA = [];
$imgD = [];
$descD = [];
$priceD = [];
$nameD = [];
while($dataA = mysqli_fetch_assoc($resultA)){
    array_push($imgA,$dataA['Photo']);
    array_push($descA,$dataA['Description']);
    array_push($priceA,$dataA['Price']);
}
while($dataD = mysqli_fetch_assoc($resultD)){
    array_push($imgD,$dataD['Photo']);
    array_push($descD,$dataD['Description']);
    array_push($priceD,$dataD['Price']);
    array_push($nameD,$dataD['Name']);
}

$result = mysqli_query($db_handle, $sql);
$result2 = mysqli_query($db_handle, $sql2);
$result3 = mysqli_query($db_handle, $sql3);


// 3 Newest items
$data = mysqli_fetch_assoc($result);
$data2 = mysqli_fetch_assoc($result2);
$data3 = mysqli_fetch_assoc($result3);

$img = $data['Photo'];
$img2 = $data2['Photo'];
$img3 = $data3['Photo'];
$text = $data['Name'];
$text2 = $data2['Name'];
$text3 = $data3['Name'];
$desc = $data['Description'];
$desc2 = $data2['Description'];
$desc3 = $data3['Description'];
$price = $data['Price'];
$price2 = $data2['Price'];
$price3 = $data3['Price'];

if($_SESSION['name'] !== ""&&$_SESSION['mdp']!==""&&$_SESSION['Atype']!==""){
                    $pseudo = $_SESSION['name'];
                    $mdp = $_SESSION['mdp'];
                    $Atype = $_SESSION['Atype'];
                    }



}


?>





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
    <form action="indexback.php">
    <div id = "login"style="visibility: hidden;position: absolute;">
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
            <td>License number:</td>
            <br>
            <td><input type="text" name="license"></td>
            </tr>
        <tr>
        <br>
        <td colspan="2" align="center">
        <input type="submit" name="submit" value="Login">
        </td>
        </tr>
        <h3>Any unauthorized use of this site will result in deadly force</h3>
    </div>


    <div id="Wrapper">
        <div class="topnav">
            <a id="Home" class="active" onclick="change(this, event)">Home</a>
            <a id="All available items" onclick = "change(this, event)">All available items</a>
            <a id="Notifications" onclick="change(this, event)">Notifications</a>
            <a id="My basket" onclick="change(this, event)">My basket</a>
            <a id="My account" onclick="change(this, event)">My account</a>
            <a id="Sell" onclick="change(this, event)">Sell</a>
            <a href='index.php?disconnect=true'id="Disconnect">Disconnect</a>
            <?php
                 if(isset($_GET['disconnect']))
                 {
                    if($_GET['disconnect']==true)
                    {
                       session_unset();
                       header("location:Log.php");
                   }
                 }
            ?>
        </div>
        <div class="Home">
            <!-- New items -->
            <div id = "left">
                <h1 style="color: white; text-align: center; font-family: bleu;">New items</h1>
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <?php
                    echo "<img src='$imgD[0]' style='width:100%;height:300px' onclick='gotoitem(this, event), setdesc(this)'>";
                    echo " <div class='text'>$nameD[0]</div>";
                    ?>
                    </div>
                    <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <?php
                    echo "<img src='$imgD[1]' style='width:100%;height:300px' onclick='gotoitem(this, event), setdesc(this)'>";
                    echo " <div class='text'>$nameD[1]</div>";
                    ?>
                    </div>
                    <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <?php
                    echo "<img src='$imgD[2]' style='width:100%;height:300px' onclick='gotoitem(this, event), setdesc(this)'>";
                    echo " <div class='text'>$nameD[2]</div>";
                    ?>
                    </div>
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <div class="info">
                    <dl style="color: white; text-align: center;">
                        <dt>Price</dt>
                        <?php
                        echo "<dl> $priceD[0] </dl>";
                        ?>
                        <dt>Date of arrival</dt>
                        <dl>19-06-2001</dl>
                    </dl>
                </div>
                <div class="info">
                    <dl style="color: white; text-align: center;">
                        <dt>Price</dt>
                        <?php
                        echo "<dl> $priceD[1] </dl>";
                        ?>
                        <dt>Date of arrival</dt>
                        <dl>19-06-2001</dl>
                    </dl>
                </div>
                <div class="info">
                    <dl style="color: white; text-align: center;">
                        <dt>Price</dt>
                        <?php
                        echo "<dl> $priceD[2] </dl>";
                        ?>
                        <dt>Date of arrival</dt>
                        <dl>19-06-2001</dl>
                    </dl>
                </div>
            </div>
            <!-- Current auctions -->
            <div class = "auctions" id="right" style="height: 50%;">
                <h1 style="text-align: center;">Current auctions</h1>
                <div class="Aimg" id="boximg" style=" text-align: center;">
                    <!-- auctions with timer under image -->
                    <img class="imgA" src="000.jpg" onclick="gotoitem(this, event); descA(this)">
                    <img class="imgA" src="1.jpg" onclick="gotoitem(this, event); descA(this)">
                    <img class="imgA" src="17.jpg" onclick="gotoitem(this, event); descA(this) ">

                    <script type = "text/javascript">
                        var imgtot = <?php echo json_encode($imgA); ?>;
                        for (let i = 0; i<3;i++) {
                            document.getElementsByClassName("imgA")[i].src =imgtot[i];
                        };

                        function descA(el){
                            var desctot = <?php echo json_encode($descA); ?>;
                            var indexImg = imgtot.indexOf(el.src.replace(/^.*[\\\/]/, ''))
                            document.getElementById("description").innerHTML = desctot[indexImg];
                            //console.log(imgtot.indexOf(el.src.replace(/^.*[\\\/]/, '')));
                        }
                    </script>

                </div>
                <!-- newsletter -->
                <div>
                    <h3 style="text-align: center;">News of the Hunter world</h3>
                    <br>
                    <div id="left">
                        <img src="netero.jpg" style="float: left; width: 100%;">
                    </div>
                    <div id="right">
                        <h3 style="float: right; text-align: center;">Netero is just gobbling pussy right now he will never die I repeat he will NEVER DIE</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="itempageB" style="visibility: hidden;position: absolute;">
            <div id="img3040" >
                <img class="mainpic">
            </div>
            <div id="desc">
                <dl style="color: white;">
                    <dt>Price</dt>
                    <dl>150 000</dl>
                    <dt>Date of arrival</dt>
                    <dl>19-06-2001</dl>
                    <dt id="demo"></dt>
                </dl>
                <input type="button" value="Add to basquet "onclick="addItem(this,event)">
                <input type="button" value="Wishlist" onclick="wishlist(this,event)">
            </div>
            <div id="textd">
                <h3 id="description"></h3>
                <script type = "text/javascript">
                    imgtotD = <?php echo json_encode($imgD); ?>;
                    function setdesc(el){
                        // if(document.getElementsByClassName('mainpic')[0].src == "http://localhost/HunterHunter/000.jpg"){
                        //     console.log("test1")
                        //     document.getElementById("description").innerHTML = "<?php echo $desc2; ?>";
                        // }else{
                        //     console.log("test2")
                        //     document.getElementById("description").innerHTML = "<?php echo $desc; ?>";
                        // }
                        var desctotD = <?php echo json_encode($descD); ?>;
                        var indexImgD = imgtotD.indexOf(el.src.replace(/^.*[\\\/]/, ''))
                        document.getElementById("description").innerHTML = desctotD[indexImgD];
                    }
                </script>
            </div>


        </div>

        <div class="My account" style="visibility: hidden; position: absolute;">
            <div id="img3040">
                <img src="netero.jpg" style="max-width: 400px;max-height: 400px; width: 200%;">
            </div>
            <div id="right" style="background-image: url('back.jpg'); background-size: cover;">
                
                    <?php
                
                    echo"<dl id='info' style='color: white;''>";
                 

                    if($Atype=="client")
                    {
                        




                        $sqlc = "";
                        //Si la BDD existe
                        if ($db_found) {
                        //code MySQL. $sql est basé sur le choix de l’utilisateur

                            $sqlc = "SELECT Name,Pseudo,Mail FROM client where Pseudo = '".$pseudo."'";


                            $resultc = mysqli_query($db_handle, $sqlc);

                            while ($data = mysqli_fetch_assoc($resultc)) {


                                
                                    
                                    echo"<dt >Name:   </dt>";
                                    echo"<dl >" . $data['Name'] . "</dl>";
                                    echo"<dt >Pseudo:   </dt>";
                                    echo"<dl >". $data['Pseudo'] ."</dl>";
                                    echo"<dt >Mail:   </dt>";
                                    echo"<dl >". $data['Mail'] ."</dl>";
                                
                                
                                    
                                }
                            
                        } 
                        
                    }

                    elseif($Atype=="vendeur")
                    {
                        $sqlv = "";
                        //Si la BDD existe
                        if ($db_found) {
                        //code MySQL. $sql est basé sur le choix de l’utilisateur

                            $sqlv = "SELECT Name,Pseudo,Mail FROM vendeur where Pseudo = '".$pseudo."'";


                            $resultv = mysqli_query($db_handle, $sqlv);

                            while ($data = mysqli_fetch_assoc($resultv)) {


                                
                                    
                                    echo"<dt >Name:   </dt>";
                                    echo"<dl >" . $data['Name'] . "</dl>";
                                    echo"<dt >Pseudo:   </dt>";
                                    echo"<dl >". $data['Pseudo'] ."</dl>";
                                    echo"<dt >Mail:   </dt>";
                                    echo"<dl >". $data['Mail'] ."</dl>";
                                
                                
                                    
                                }
                            
                        } 
                    }
                    elseif($Atype=="admin")
                    {
                        $sqla = "";
                        //Si la BDD existe
                        if ($db_found) {
                        //code MySQL. $sql est basé sur le choix de l’utilisateur

                            $sqla = "SELECT Name,Pseudo,Mail FROM admin where Pseudo = '".$pseudo."'";


                            $resulta = mysqli_query($db_handle, $sqla);

                            while ($data = mysqli_fetch_assoc($resulta)) {


                                
                                    
                                    echo"<dt >Name:   </dt>";
                                    echo"<dl >" . $data['Name'] . "</dl>";
                                    echo"<dt >Pseudo:   </dt>";
                                    echo"<dl >". $data['Pseudo'] ."</dl>";
                                    echo"<dt >Mail:   </dt>";
                                    echo"<dl >". $data['Mail'] ."</dl>";
                                
                                
                                    
                                }
                            
                        } 
                    }
                    echo"</dl>";

                
                /*<div id="img3040">
                <img src="netero.jpg" style="max-width: 400px;max-height: 400px; width: 200%;">
            </div>
            <div id="right" style="background-image: url('back.jpg'); background-size: cover;">
                <dl id="info" style="color: white;">
                    <dt>Name:</dt>
                    <dl>Netero</dl>
                    <dt>Pseudo:</dt>
                    <dl>PussyHunter420</dl>
                    <dt>Post:</dt>
                    <dl>Admin</dl>
                    <dt>Mail:</dt>
                    <dl>pussyGod@hunter-association.com</dl>
                </dl>
            </div>*/
            ?>
                </dl>
            </div>
        </div>
        <div class="My basket" style="visibility: hidden; position: absolute;">
            <h3 style="text-decoration: underline; text-align: center;">Bienvenue dans votre centre de contrôle:</h3>
            <div id=Panier>
                <h3>Mon Panier</h3>
                    <img class="unselected" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <img class="unselected" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <img class="unselected" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <br>
                    <input type="submit" value="Valider votre panier"  onclick="window.open('pay.php','popup','width=600,height=600')" >
            </div>
            <div id=Historique>
                <h3>Mon Historique d'achats</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id=Wishlist>
                <h3>Ma liste de souhaits</h3>

                <img class="unselectedW" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img class="unselectedW" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img class="unselectedW" src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <br>
                <input type="submit" value="Ajouter au panier" onclick="addbasquet(this,event)">
            </div>
        </div>
        <div class="All available items" style="visibility: hidden; position: absolute;">
            <div id="trending">
                <h3>En ce moment:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="comingsoon">
                <h3>À venir:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="auctions">
                <h3>Enchères:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="buynow">
                <h3>Acheter tout de suite:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
        </div>
        <div class="Notifications" style="visibility: hidden; position: absolute;">
            <h3 id="demo"></h3>
            <div id="venteperso">
                <h3 style="text-decoration: underline; text-align: center;">Vous avez acheté:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="achatperso">
                <h3 style="text-decoration: underline; text-align: center;">Vous avez vendu:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="recherche" style="padding-top: auto;">
                <h3 style="text-decoration: underline; text-align: center;">Vous recherhez un article correspondant aux critères suivants:</h3>
                <form action="">
                        <td>
                            <h3>Prix minimal: </h3>
                            <input type="number" name="minimal" id="fesses" min=0 onkeyup="GioIsGod()" onclick="GioIsGod()">
                            <h3>Prix maximal: </h3>
                            <input type="number" name="maximal" id="bite" onkeyup="GioIsGod()" onclick="GioIsGod()">
                            <h3> €</h3><br>
                            <h3 style="text-decoration: underline; text-align: center;">Rechercher par:</h3>
                            <label for="alphabetique"><h3>Ordre Alphabétique</h3></label>
                            <input type="radio" id="alphabetique" name="critere" value="Ordre Alphabétique">
                              <label for="croissant"><h3>Prix Croissant</h3></label>
                              <input type="radio" id="croissant" name="critere" value="Prix Croissant">
                              <label for="decroissant"><h3>Prix Décroissant</h3></label>
                              <input type="radio" id="decroissant" name="critere" value="Prix Décroissant">

                        </td>
                </form>
            </div>
        </div>
        <!-- <div id="Sell" style="display:none">
             <form action="">
            <h3 style="text-decoration: underline; text-align: center;">Entrez ci-dessous les critères de l'article que vous aouhaitez vendre:</h3><br>
            <h3>Nom de l'article: </h3><input type="text" name="" id=""><br>
            <h3>Prix de l'article (en €): </h3><input type="number" name="" id="" min=0><br>
            <h3>Date limite de vente de l'article: </h3><input type="date" name="" id=""><br>
            <h3>Heure limite de vente de l'article: </h3><input type="time" name="" id=""><br>
            <h3>Photo de l'article: </h3><input type="file" name="" id=""><br>
            <input type="submit" value="Mettre l'article en vente">
         </form>
        </div> -->
    </div>
    <script src="index.js"></script>
    </form>
</body>
</html>
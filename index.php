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
$sqlN = "SELECT * FROM item where SaleType = 'Negotiation'";


$resultA = mysqli_query($db_handle, $sqlA);
$resultD = mysqli_query($db_handle, $sqlD);
$resultN = mysqli_query($db_handle, $sqlN);


$imgA = [];
$descA = [];
$priceA = [];
$imgD = [];
$descD = [];
$priceD = [];
$nameD = [];
$imgN = [];
$descN = [];
$priceN = [];
$nameN = [];
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
while($dataN = mysqli_fetch_assoc($resultN)){
    array_push($imgN,$dataN['Photo']);
    array_push($descN,$dataN['Description']);
    array_push($priceN,$dataN['Price']);
    array_push($nameN,$dataN['Name']);
}

$result = mysqli_query($db_handle, $sql);
$result2 = mysqli_query($db_handle, $sql2);
$result3 = mysqli_query($db_handle, $sql3);


// 3 Newest items
$data = mysqli_fetch_assoc($result);
$data2 = mysqli_fetch_assoc($result2);
$data3 = mysqli_fetch_assoc($result3);

// $img = $data['Photo'];
// $img2 = $data2['Photo'];
// $img3 = $data3['Photo'];
// $text = $data['Name'];
// $text2 = $data2['Name'];
// $text3 = $data3['Name'];
// $desc = $data['Description'];
// $desc2 = $data2['Description'];
// $desc3 = $data3['Description'];
// $price = $data['Price'];
// $price2 = $data2['Price'];
// $price3 = $data3['Price'];

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
    <!--<form action="indexback.php">-->
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
            <a id="All available items" onclick = "change(this, event), setAll()">All available items</a>
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
                       $sqlSP="DELETE FROM panier";
                       $sqlSC="DELETE FROM comporter";
                       mysqli_query($db_handle,$sqlSP);
                       mysqli_query($db_handle,$sqlSC);

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
                        var imgtotD = <?php echo json_encode($imgD); ?>;
                        var imgtotA = <?php echo json_encode($imgA); ?>;
                        var imgtotN = <?php echo json_encode($imgN); ?>;
                        for (let i = 0; i<3;i++) {
                            document.getElementsByClassName("imgA")[i].src =imgtotA[i];
                        };

                        function descA(el){
                            var desctot = <?php echo json_encode($descA); ?>;
                            var pricetot = <?php echo json_encode($priceA); ?>;
                            var indexImg = imgtotA.indexOf(el.src.replace(/^.*[\\\/]/, ''))
                            document.getElementById("description").innerHTML = desctot[indexImg];
                            document.getElementById("priceItem").innerHTML = pricetot[indexImg];
                            document.getElementById("bid").style.visibility = "inherit";
                            document.getElementById("bidB").style.visibility = "inherit";
                            document.getElementById("namepicinput").value = imgtotA[indexImg];
                            //console.log(imgtot.indexOf(el.src.replace(/^.*[\\\/]/, '')));
                        }

                        function descN(el){
                            var desctot = <?php echo json_encode($descN); ?>;
                            console.log(desctot[0])
                            var pricetot = <?php echo json_encode($priceN); ?>;
                            var indexImg = imgtotN.indexOf(el.src.replace(/^.*[\\\/]/, ''))
                            document.getElementById("description").innerHTML = desctot[indexImg];
                            document.getElementById("priceItem").innerHTML = pricetot[indexImg];
                            document.getElementById("bid").style.visibility = "hidden";
                            document.getElementById("bidB").style.visibility = "hidden";
                            document.getElementById("namepicinput").value = imgtotN[indexImg];
                            //console.log(imgtot.indexOf(el.src.replace(/^.*[\\\/]/, '')));
                        }

                        function setAll(){
                            setAllA(imgtotA, "auctions");
                            setAllA(imgtotD, "buynow");
                            setAllA(imgtotN, "negotiations");
                        }

                        function setAllA(img, position){
                            for(let i = 0; i<img.length;i++){
                                var elemImgA = document.createElement("img");
                                console.log("test");
                                elemImgA.src = img[i];
                                elemImgA.style.height = "100px";
                                elemImgA.style.width = "100px";
                                if(position == "auctions"){
                                    elemImgA.onclick = function(){
                                    gotoitem(this, event);
                                    descA(this);};
                                }else if(position == "buynow"){
                                    elemImgA.onclick = function(){
                                    gotoitem(this, event);
                                    setdesc(this);};
                                }else{
                                    elemImgA.onclick = function(){
                                    gotoitem(this, event);
                                    descN(this);};
                                }
                                var positionA = document.getElementById(position);
                                positionA.appendChild(elemImgA);
                            }
                            document.getElementById("All available items").onclick = function(){
                                change(this, event);
                            }
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
                        <h3 style="float: right; text-align: center;">Netero is re-elected president of the Hunter Association</h3>
                    </div>
                </div>
            </div>
        </div>

        <script type = "text/javascript">
            function newBid(el){
                var bid = document.getElementById("bid").value;
                var current = document.getElementById("priceItem").innerHTML;
                if(bid <= current){
                    document.getElementById("errorbid").innerHTML = "your bid is too low";
                }else{
                    document.getElementById("errorbid").innerHTML = "New bid has been set";
                }
            }
        </script>
        <div id="itempageB" style="visibility: hidden;position: absolute;">
            <div id="img3040" >
                <img class="mainpic">
            </div>
            <div id="desc">
                <dl style="color: white;">
                    <dt>Price</dt>
                    <dl id = "priceItem" name = "price">150 000</dl>
                    <dt>Date of arrival</dt>
                    <dl>19-06-2001</dl>
                    <dt id="demo"></dt>
                </dl>
                <form action="AddBasket.php" method='get'>
                <input id="namepicinput" type="text"  name="img" value="" style="visibility: hidden;position: absolute;">
                <input type="submit" value="Add to basquet "onclick="addItem(this,event);newBid(this)">

                </form>
                <input type="button" value="Wishlist" onclick="wishlist(this,event)">
                <form method= "get" name="form" action="update.php">
                <input id = "bid" type="number" name="bid">
                <input id="namepicinput" type="text"  name="img" value="" style="visibility: hidden;position: absolute;">
                <input id = "bidB" type="submit" value="Increase bid" onclick="newBid(this)">
                </form>
                <br>
                <h3 id="errorbid"></h3>
            </div>
            <div id="textd">
                <h3 id="description"></h3>
                <script type = "text/javascript">
                    imgtotD = <?php echo json_encode($imgD); ?>;
                    function setdesc(el){
                        var desctotD = <?php echo json_encode($descD); ?>;
                        var pricetot = <?php echo json_encode($priceD); ?>;
                        var indexImgD = imgtotD.indexOf(el.src.replace(/^.*[\\\/]/, ''))
                        document.getElementById("description").innerHTML = desctotD[indexImgD];
                        document.getElementById("priceItem").innerHTML = pricetot[indexImgD];
                        document.getElementById("bid").style.visibility = "hidden";
                        document.getElementById("bidB").style.visibility = "hidden";
                        document.getElementById("namepicinput").value = imgtotD[indexImgD];
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
            <div>
            <?php
            if($Atype=="vendeur" || $Atype=="admin")
            {

                echo "<td><form action=\"ItemSetting.php\" method=\"post\"><input type=\"submit\" value=\"AddItem\" /></form></td>";

            }

            ?>
            </div>

            <div style="color:white">
                <?php
            if($Atype=="admin")
            {
                if($db_found)
                {
                $sqlV = "SELECT Pseudo FROM vendeur WHERE IdVendeur!=2";
                $resultV = mysqli_query($db_handle, $sqlV);


                echo "<th >";
                echo "Supprimer vendeur : " ;
                echo "</th><br><br>";
                echo"<form action='SuppV.php' method='post'>";
                while ($dataV = mysqli_fetch_assoc($resultV)){


                    $pseud=$dataV['Pseudo'];
                //echo "<td >".  $dataV['Pseudo'] . "</td><br><br>";
                echo "<input type='button' value='$pseud'/>";
                echo"<br><br>";

                }
                echo"<input type='text' name='suppr'/>";
                echo"<input type=\"submit\" value=\"Delete Seller\" />";
                echo"</form>";

            }
        }

            ?>

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
                    <?php
                        if($Atype=="client")
                        {
                            echo "<td><form action=\"pay.php\" method=\"post\"><input type=\"submit\" value=\"Valider votre panier\" /></form></td>";
                    //echo"<input type='submit' value='Valider votre panier'  onclick='window.open(pay.php,popup,width=600,height=600)' >";
                        }
                    ?>
            </div>
            <div id="currentBids" style ="text-align: center">
                <h3>My current bids</h3>
                <img id="testimg">

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
            <div id="trending" style="visibility: hidden; position: absolute;">
                <h3>En ce moment:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="negotiations" style="text-align:center">
                <h3>Negotiation:</h3>
            </div>
            <div id="auctions">
                <h3>Auctions:</h3>
            </div>
            <div id="buynow">
                <h3>Buy now:</h3>
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
    <script >
        function change(el, e){
    e.preventDefault();
    if(document.getElementById("itempageB").style.visibility == "visible"){
      document.getElementById("itempageB").style.visibility = "hidden";
      document.getElementById("itempageB").style.position = "absolute";
    }
    console.log(document.getElementsByClassName("active")[0].id);
    if(document.getElementsByClassName("active")[0].id == "Home" || (document.getElementsByClassName("active")[0].id == "My account")|| (document.getElementsByClassName("active")[0].id == "My basket")|| (document.getElementsByClassName("active")[0].id == "All available items")|| (document.getElementsByClassName("active")[0].id == "Notifications")|| (document.getElementsByClassName("active")[0].id == "Sell")){
      document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.visibility = "hidden";
    document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.position = "absolute";
    }
    document.getElementsByClassName("active")[0].className = "";
    el.className = "active";
    console.log(el.id)
    if(el.id == "Home" || el.id =="My account" || el.id =="My basket"|| el.id =="All available items"|| el.id =="Notifications"|| el.id =="Sell"){
      document.getElementsByClassName(el.id)[0].style.visibility = "visible";
      document.getElementsByClassName(el.id)[0].style.position = "relative";
    }
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var info = document.getElementsByClassName("info");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      info[i].style.display = "none"
  }
  slides[slideIndex-1].style.display = "block";
  info[slideIndex-1].style.display = "block";
}


function gotoitem(el, e){
  e.preventDefault();

  document.getElementById("itempageB").style.visibility = "visible";
  document.getElementById("itempageB").style.position = "relative";
  document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.visibility = "hidden";
  document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.position = "absolute";
  document.getElementsByClassName("active")[0].className = "";
  document.getElementById("Home").className = "active";
  document.getElementsByClassName("Home")[0].style.visibility = "hidden";

  document.getElementsByClassName("Home")[0].style.position = "absolute";
  console.log(document.getElementsByClassName("Home")[0].visibility)
  document.getElementsByClassName("mainpic")[0].src = el.src;
}

function addItem(el, e){
   document.getElementsByClassName("unselected")[0].src = document.getElementsByClassName("mainpic")[0].src;
   document.getElementsByClassName("unselected")[0].className = "selected";
}

function wishlist(el, e){
  document.getElementsByClassName("unselectedW")[0].src = document.getElementsByClassName("mainpic")[0].src;
  document.getElementsByClassName("unselectedW")[0].className = "selectedW";
}


function addbasquet(el, e){
  while(document.getElementsByClassName("selectedW").length != 0){
    document.getElementsByClassName("unselected")[0].src = document.getElementsByClassName("selectedW")[0].src;
   document.getElementsByClassName("unselected")[0].className = "selected";
   document.getElementsByClassName("selectedW")[0].className = "unselectedW";
  }
}




  function GioIsGod()
  {
    console.log(document.getElementById("fesses").value);
    let value=document.getElementById("fesses").value;
    document.getElementById("bite").setAttribute('min', value);
  }
function timer()
  {
    // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
    }
  }, 1000);
  }

  timer();
  //Balayer le vecteur avec la fonction timer surchargée avec les dates et les noms des articles

    </script>
    <!--</form>-->
</body>
</html>
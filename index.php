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
    <form action="login.php" method="post"></form>
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
                    <img src="image1.jpg" style="width:100%" onclick="gotoitem(this, event)">
                    <div class="text">Caption Text</div>
                    </div>
                    <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="img2.jpg" style="width:100%" onclick="gotoitem(this, event)">
                    <div class="text">Caption Two</div>
                    </div>
                    <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="img3.jpg" style="width:100%" onclick="gotoitem(this, event)">
                    <div class="text">Caption Three</div>
                    </div>
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
                <div>
                    <dl style="color: white; text-align: center;">
                        <dt>Price</dt>
                        <dl>150 000</dl>
                        <dt>Date of arrival</dt>
                        <dl>19-06-2001</dl>
                    </dl>
                </div>
            </div>
            <!-- Current auctions -->
            <div class = "auctions" id="right" style="height: 50%;">
                <h1 style="text-align: center;">Current auctions</h1>
                <div class="Aimg" id="boximg">
                    <!-- auctions with timer under image -->
                    <img src="000.jpg" onclick="gotoitem(this, event)">
                    <img src="1.jpg" onclick="gotoitem(this, event)">
                    <img src="17.jpg" onclick="gotoitem(this, event)">


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
                </dl>
                <input type="button" value="Add to basquet "onclick="addItem(this,event)">
                <input type="button" value="Wishlist" onclick="wishlist(this,event)">
            </div>
            <div id="textd">
                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum ab fuga eveniet sed doloremque corrupti omnis aspernatur nisi nesciunt? Doloribus rerum exercitationem, aut voluptate dolor commodi deserunt sint iure illum.</h3>
            </div>

        </div>

        <div class="My account" style="visibility: hidden; position: absolute;">
            <div id="img3040">
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
                <h3>Vous avez acheté:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="achatperso">
                <h3>Vous avez vendu:</h3>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
            </div>
            <div id="recherche" style="padding-top: auto;">
                <h3>Vous recherhez un article correspondant aux critères suivants:</h3>
                <form action="">
                    <table>
                        <td>
                            <h3>Fourchette de prix: </h3>
                            <input type="range" name="prix" id="">
                            <h3> €</h3>
                        </td>
                        <td>
                            
                        </td>
                    </table>
                </form>
                <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <img src="img2.jpg" height="100px" width="100px" onclick="gotoitem(this, event)">
                    <br>
                    <input type="submit" value="Ajouter au panier">
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
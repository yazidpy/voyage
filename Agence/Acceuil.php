<?php
session_start();
include "configuration.php";
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$offres = "SELECT * from offre";
$execution = mysqli_query($conn,$offres);
$_SESSION['ido']=FALSE;
if (empty($_GET['idcl'])) {
    $_SESSION['connected'] = FALSE;
    $_SESSION['offres'] = FALSE;
} else {
    $x = $_GET['idcl'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <title>Agence de voyage</title>
</head>

<body>
    <!-- Header -->
    <div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <?php
                if ($_SESSION['connected'] == FALSE) {
                    echo '<ul>
                    <li><a href="Acceuil.php" class="active">Acceuil</a></li>
                    <li><a href="offres.php">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                </ul>';
                } else {
                    echo '<ul>
                    <li><a href="Acceuil.php?idcl=' . $x . '" class="active">Acceuil</a></li>
                    <li><a href="offres.php?idcl=' . $x . '">Destinations</a></li>
                    <li><a href="services.php?idcl=' . $x . '">Services</a></li>
                    <li><a href="apropos.php?idcl=' . $x . '">A propos</a></li>
                </ul>';
                }
                ?>
            </nav>
            <div class="connexion">
                <?php
                if ($_SESSION['connected'] == FALSE) {
                    echo "<a class='btn-cnx connect'>connecter</a>
                <a href='inscription.php' class='btn-cnx'>s'inscrire</a>";
                } else {
                    echo '<a href="./acceuil.php" class="btn-cnx">se déconnecter</a>';
                }
                ?>
            </div>
        </div>

    </div>
    <div class="contain">
        <!-- Principale -->
        <section class="home container flex">
            <div class="content box">
                <h3>bienvenue,</h3>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="admin_login.php" class="btn-cnx">administration </a>
            </div>

            <div class="controls">
                <span class="vid-btn active" data-src="images/vid-1.mp4"></span>
                <span class="vid-btn" data-src="images/vid-2.mp4"></span>
                <span class="vid-btn" data-src="images/vid-5.mp4"></span>
            </div>

            <div class="video-container">
                <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
            </div>
        </section>

        <!-- Destinations -->
        <section class="container Destinations">
            <h1 class="heading">
                <span>d</span>
                <span>e</span>
                <span>s</span>
                <span>t</span>
                <span>i</span>
                <span>n</span>
                <span>a</span>
                <span>t</span>
                <span>i</span>
                <span>o</span>
                <span>n</span>
                <span>s</span>
            </h1>
            <div class="box-container grid grid-3">
                <?php
                $counter = 1;
                while (($offre = mysqli_fetch_assoc($execution)) && $counter < 4) {
                    $ido = $offre['id_ofr'];
                ?>
                    <div class="box">
                        <img src="./images/<?= $offre['photo']; ?>" alt="">
                        <div class="content">
                            <h3> <i class="fas fa-map-marker-alt"></i> <?= $offre['destination_ofr'] ?> </h3>
                            <p><?= $offre['description_ofr'] ?></p>
                            <div class="price"> $ <?= $offre['prix_ofr'] ?> </div>
                            <?php
                            if ($_SESSION['connected'] == TRUE) {
                                $verification = "SELECT * from reservation where offre=$ido and client=$x ";
                                $execute = mysqli_query($conn, $verification);
                                $rows = mysqli_fetch_assoc($execute);
                                if ($rows) {
                                    echo '<p class="erreur">Vous avez déja réservé</p>';
                                } else {
                                    echo '<a href="./reservation.php?idoffre='.$ido.'" class="btn-reserver">réserver</a>';
                                }
                            } else if ($_SESSION['connected'] == FALSE) {
                                echo '<a class="btn-reserver connect">réserver</a>';
                            }
                            ?>
                        </div>
                    </div>
                <?php $counter += 1;
                } ?>
            </div>
            <?php
            if ($_SESSION['connected'] == FALSE) {
                echo '<a class="btn-reserver" href="./offres.php">Voir Plus</a>';
            } else {
                echo '<a class="btn-reserver" href="./offres.php?idcl=' . $x . '">Voir Plus</a>';
            }
            ?>
        </section>

        <!-- bénéfices -->
        <section class="benefits">
            <div class="box-container">

                <div class="box">
                    <img src="images/icn1.png" alt="">
                    <h3>Aventure</h3>
                </div>

                <div class="box">
                    <img src="images/icn2.png" alt="">
                    <h3>Guide <br>
                        touristique</h3>
                </div>

                <div class="box">
                    <img src="images/icn3.png" alt="">
                    <h3>trekking</h3>
                </div>

                <div class="box">
                    <img src="images/icn4.png" alt="">
                    <h3>Lorem.</h3>
                </div>
            </div>
        </section>
    </div>
    <!-- footer -->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Liens</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i> Acceuil</a>
                <a href="about.php"> <i class="fas fa-angle-right"></i> Destinations</a>
                <a href="package.php"> <i class="fas fa-angle-right"></i> Services</a>
                <a href="book.php"> <i class="fas fa-angle-right"></i> A propos</a>
            </div>


            <div class="box">
                <h3>informations de contact</h3>
                <a href="#"> <i class="fas fa-phone"></i> +213-555-5555 </a>
                <a href="#"> <i class="fas fa-phone"></i> +213-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> mumbai, india - 400104 </a>
            </div>

            <div class="box">
                <h3>Suivez nous</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <?php
                if ($_SESSION['connected'] == FALSE) {
                    echo '<a href="./contact.php"> <i class="fas fa-phone"></i> contactez nous </a>';
                } else {
                    echo '<a href="./contact.php?idcl=' . $x . '"> <i class="fas fa-phone"></i> contactez nous </a>';
                }
                ?>
            </div>

        </div>

        <div class="credit"> created by <span>Groupe 7</span> | all rights reserved! </div>

    </section>
    <div id="form_connexion">
        <form id="login" action="conn.php" method="POST" class="insc-form">

            <div class="grid">
                <div class="part1">
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" placeholder="insérer votre email" id="email" name="email">
                    </div>
                    <div class="inputBox">
                        <span>Mot de passe :</span>
                        <input type="password" placeholder="insérer votre mot de passe" id="mdp" name="password">
                    </div>

                    <p>mot de passe oublié ? <a href="#">cliquez ici</a></p>
                    <p>j'ai pas un compte ? <a href="inscription.php">s'inscrire</a></p>
                    <input type="submit" value="envoyer" id="connexion" class="btn-reserver" name="submit">
        </form>
        <div id="error"></div>
    </div>
</body>
<script>
    const connect = document.querySelectorAll(".connect");
    Array.from(connect).forEach(function(btn) {
        btn.addEventListener("click", function() {
            let form = document.getElementById("form_connexion")
            form.style.display = "flex";
            let tout = document.querySelector(".contain");
            // tout.style.filter = "blur(2px)"
        });
    });
    $(document).ready(function(){
        $("#login").submit(function(e){
            e.preventDefault();
            var email =$("#email").val();
            var mdp = $("#mdp").val();
            if(email == "" || mdp == ""){
                $("div#error").html("Veuillez remplir tous les champs!");
            }
            else{
            $.ajax({
                url:"./conn.php",
                method:"POST",
                data: {
                    login:1,
                    emailphp: email,
                    mdpphp: mdp
                },
                success: function(response){
                    if(response.indexOf("admin")>=0){
                        window.location = "./espace_admin.php";
                    }else if(response.indexOf("succés")>= 0){
                        window.location = "./acceuil.php?idcl="+response;
                    }else{
                        $("div#error").html(response);
                    }
                },
                dataType:"text"
            })}
        })
    });
</script>

</html>
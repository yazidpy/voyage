<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>A propos </title>
</head>
<body>


<div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <?php
                if (!isset($_SESSION['id_cl'])) {
                 
                    echo '<ul>
                    <li><a href="acceuil.php" class="active">Acceuil</a></li>
                    <li><a href="offre.php">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about.php">A propos</a></li>
                </ul>';
                } else {
                    $ab=$_SESSION['id_cl'];
                    echo '<ul>
                    <li><a href="acceuil.php?client=' . $ab . '" class="active">Acceuil</a></li>
                    <li><a href="offre.php?client=' . $ab . '">Destinations</a></li>
                    <li><a href="services.php?client=' . $ab . '">Services</a></li>
                    <li><a href="about.php?client=' . $ab . '">A propos</a></li>
                </ul>';
                }
                ?>
            </nav>
            <div class="connexion">
                <?php
                if (!isset($_SESSION['id_cl'])){
                    echo "<a class='btn-cnx connect'>connecter</a>
                <a href='inscription.php' class='btn-cnx'>s'inscrire</a>";
                } else {
                    echo '<a href="deconnexion.php" class="btn-cnx">se déconnecter</a>';
                }
                ?>
            </div>
        </div>

    </div>








<div class="contain">
<div class="head" style="background:url(images/header-bg-1.png) no-repeat">
    <h1>A propos</h1>
 </div>

    <section class="home-about">
        <div class="image">
           <img src="images/bali.jpg" alt="">
        </div>
        <div class="content">
           <h3>about us</h3>
           <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, repellat! Doloremque, deleniti. Corrupti minus non incidunt. Explicabo quia dolore animi doloribus consequuntur, error, doloremque soluta, quisquam aperiam omnis corrupti illo.</p>
           <div class="icons-container">
            <div class="icons">
               <i class="fas fa-map"></i>
               <span>top destinations</span>
            </div>
            <div class="icons">
               <i class="fas fa-hand-holding-usd"></i>
               <span>affordable price</span>
            </div>
            <div class="icons">
               <i class="fas fa-headset"></i>
               <span>24/7 guide service</span>
            </div>
         </div>
      </div>
        </div>
     </section>
    
     <div class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Pays </h3>
                <a href="#">Tunise</a>
                <a href="#">USA</a>
                <a href="#">Indonésie</a>
                <a href="#">france</a>
            </div>
            <div class="box">
                <h3>Liens</h3>
                <a href="#">Acceuil</a>
                <a href="#">Destinations</a>
                <a href="#">Services</a>
                <a href="#">A Propos</a>
             
            </div>
            <div class="box">
                <h3>Abonnez Nous</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
            </div>
        </div>
        <h1 class="credit"> created by <span> L3 systéme d'information </span> | all rights reserved! </h1>
    </div>
</div>
</div>
<div id="form_connexion">
    <form action="connexion_cl.php" method="POST" class="insc-form">
        <div class="grid">
            <div class="part1">
                <div class="inputBox">
                    <span>Email</span>
                    <input type="email" placeholder="insérer votre email" name="email">
                </div>
                <div class="inputBox">
                    <span>Mot de passe :</span>
                    <input type="password" placeholder="insérer votre mot de passe" name="password">
                </div>

                <p>mot de passe oublié ? <a href="#">cliquez ici</a></p>
                <p>j'ai pas un compte ? <a href="inscription.php">s'inscrire</a></p>

                <input type="submit" value="envoyer" class="btn-reserver" name="submit">
    </form>
</div>
<script src="js/script.js"></script>


</body>
</html>
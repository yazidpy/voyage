<?php 
session_start();
include "configuration.php";
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$verifier = $db->query("SELECT * from offre");
$recup = $verifier->rowCount();
$offres = "SELECT * from offre ";
$execution = mysqli_query($conn,$offres);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?hhiu">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>offres</title>
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
                    <li><a href="acceuil.php?client=' . $ab . '">Acceuil</a></li>
                    <li><a href="offre.php?client=' . $ab . '"class="active">Destinations</a></li>
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
    <h1>Top Destinations</h1>
 </div>
    <h1 class="heading">
        <span>O</span>
        <span>F</span>
        <span>F</span>
        <span>R</span>
        <span>E</span>
        <span>S</span>
    </h1>
 
    <div class="offre"> 
    <?php if(isset($_GET['client'])){ ?>
        <div class="box-container">
        <?php

                $counter = 1;
                while (($offre = mysqli_fetch_assoc($execution)) && $counter < $recup) {
                    $_SESSION['idoffre']=$offre['id_ofr'];
                    $off=$_SESSION['idoffre'];
                    $place=$offre['place_res'];

                ?>
            <div class="box">
            <img src="./images/<?= $offre['photo']; ?>" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>  <?= $offre['destination_ofr'] ?> </h3>
                    <p><?= $offre['description_ofr'] ?></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> Prix: <?= $offre['prix_ofr'] ?> DA </div>
                  <?php


$verification3 = "SELECT * from vol where id_offre=$off";
$execute3 = mysqli_query($conn, $verification3);
$rows3 = mysqli_fetch_assoc($execute3);
if($rows3>0){

                  if($place>0){
                    $y=$_GET['client'];
                        $verification = "SELECT * from reservation where offre=$off and client=$y ";
                        $execute = mysqli_query($conn, $verification);
                        $rows = mysqli_fetch_assoc($execute);
                        if($rows>0){
                        $id=$rows['id_res'];
                        if ($id>0){
 echo' <p class="choisir" >offre déjà reservée <a href="pdf.php?idres=' .$id. '">Consulter</a></p>';
                        }
                    }
               else{
                echo '<a  href="reservation.php?idoffre='.$off.'" class=button >Reserver</a>';

                }
            }
            else{
                echo' <p class="choisir" >Saturé</p>';   
            }
        }else{
            echo' <p class="choisir-2" >Aucun vol diponible pour cette offre</p>';    
        }  
                     
               ?>
                </div>
            </div>    
            <?php $counter=$counter+1; } ?>
                </div>
            </div>
 
                <?php } else{ ?>
                    <div class="box-container">
        <?php

                $counter = 1;
                while (($offre = mysqli_fetch_assoc($execution)) && $counter < $recup) {
                    $_SESSION['idoffre']=$offre['id_ofr'];
                    $off=$_SESSION['idoffre'];

                ?>
            <div class="box">
            <img src="./images/<?= $offre['photo']; ?>" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>  <?= $offre['destination_ofr'] ?> </h3>
                    <p><?= $offre['description_ofr'] ?></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> Prix: <?= $offre['prix_ofr'] ?> DA </div>  
                </div>
            </div>    
            <?php $counter=$counter+1; } ?>
          
                </div>
            </div>
          
<?php } ?>












            
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
        <div id="form_connexion">
            <form action="conn.php" method="POST" class="insc-form">
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
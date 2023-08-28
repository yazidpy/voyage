<?php
session_start();
include "configuration.php";
$offres = "SELECT * from offre ";
$execution = mysqli_query($conn,$offres);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/ser.css">

    

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>acceuil</title>
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
    <section class="home container flex">
        <div class="content box">
            <h3>bienvenue,</h3>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
  
        <div class="controls">
            <span class="vid-btn active" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-2.mp4"></span>
            <span class="vid-btn" data-src="images/vid-5.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/vid-2.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    </div>
   
   
    <section class="packages ">
        <h1 class="heading">
            <span>O</span>
            <span>F</span>
            <span>F</span>
            <span>R</span>
            <span>E</span>
            <span>S</span>
        </h1>
        <?php if(isset($_GET['client'])){ ?>
        <div class="box-container">
        <?php

                $counter = 1;
                while (($offre = mysqli_fetch_assoc($execution)) && $counter < 4) {
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

$verification3 = "SELECT * from vol where id_offre=$off and nb_place>0";
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
           <?php  echo'
            <a  href="offre.php?client='.$_GET['client'].'"  class="button2">Voir plus</a> '; ?>


                <?php } else{ ?>
                    <div class="box-container">
        <?php

                $counter = 1;
                while (($offre = mysqli_fetch_assoc($execution)) && $counter < 4) {
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
            <?php { echo
           ' <a href="offre.php" class="button2">Voir plus</a>'; 
             } ?>
<?php } ?>
    </section>
                      
</section>
<section class="services" id="services">

    <h1 class="heading">
        <span>s</span>
        <span>e</span>
        <span>r</span>
        <span>v</span>
        <span>i</span>
        <span>c</span>
        <span>e</span>
        <span>s</span>
    </h1>
    <div class="box-container">
        <div class="box"> 
            <i class="fas fa-hotel"></i>
            <h3>affordable hotels</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        <div class="box">
            <i class="fas fa-utensils"></i>
            <h3>food and drinks</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
        <div class="box">
            <i class="fas fa-bullhorn"></i>
            <h3>safty guide</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>      
        </div>
        <div class="box">
            <i class="fas fa-globe-asia"></i>
            <h3>around the world</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
        <div class="box">
            <i class="fas fa-plane"></i>
            <h3>fastest travel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
        <div class="box">
            <i class="fas fa-hiking"></i>
            <h3>adventures</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
    </div>
    </div>
</section>
<div class="propos">
<h1 class="heading">
    <span>A</span>
    <span>p</span>
    <span>r</span>
    <span>o</span>
    <span>p</span>
    <span>o</span>
    <span>s</span>
</h1>
</div>
<section class="home-about">
    <div class="image">
       <img src="images/imggg.jpg" alt="">
    </div>
    <div class="content">
       <h3>about us</h3>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing. adipisicing elit. Dolor, minima voluptate tempora vero autem ut recusandae vitae doloribus modi illo ullam laborum sint corporis ex accusantium adipisci obcaecati natus explicabo!lorem15

       </p>
       <a href="about.php" class="button">Voir plus</a>
    </div>
 </section>
 

 <div class="slider">
        <div class="slides">
<div class="slide"><img src="./images/Itlay.jpg"></div>
<div class="slide"><img src="./images/bali.jpg"></div>
<div class="slide"><img src="./images/p-1.jpg"></div>
<div class="slide"><img src="./images/tunisie.jpg"></div>
<div class="slide"><img src="./images/turc.jpg"></div>
<div class="slide"><img src="./images/g-2.jpg"></div>
<div class="slide"><img src="./images/g-2.jpg"></div>
        </div>
        </div>

 <?php if(isset($_GET['client'])){ ?>
 <section class="contact" id="contact">
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">
        <div class="image">
            <img src="images/cn.jpg" alt="">
        </div>
<?php echo
       ' <form action="contact.php?client='.$_GET['client'].'" method="post" >'; ?>
        <?php if (isset($_GET['succes'])) {
    ?>
        <p class="choisir">
            <?php echo $_GET['succes']; ?>
        </p>
    <?php } ?>
            <div class="inputBox">
                <input type="text" placeholder=" votre Nom" name="nom" required>
                <input type="text" placeholder=" votre prenom" name="prenom" required>
            </div>
            <div class="inputBox">
                <input type="number" placeholder="Numéro" name="num" required>
                <input type="email" placeholder=" votre email" name="email" required>
            </div>
            <textarea placeholder=" votre message " name="message" id="" cols="30" rows="10" required ></textarea>
            <input type="submit" class="button" value="Envoyer" name="envoyer">
        </form>

    </div>
    
</section>
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
<script>
    const connect = document.querySelectorAll(".connect");
    Array.from(connect).forEach(function(btn) {
        btn.addEventListener("click", function() {
            let form = document.getElementById("form_connexion")
            form.style.display = "flex";
            let tout = document.querySelector(".contain");
             tout.style.filter = "blur(5px)"; 
                window.onscroll = () =>{
                 form.style.display="none";
                 tout.style.filter="none";
                
             }
        }); 
    });
   ;

  
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</body>
</html>



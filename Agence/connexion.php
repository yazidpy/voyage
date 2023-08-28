<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/inscription.css">

   
    <title></title>
</head>
<body>
    <div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <ul>
                    <li><a href="Acceuil.php">Acceuil</a></li>
                    <li><a href="offres.php">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                </ul>
            </nav>
            <div class="connexion">
                <a href="inscription.php" class="btn-cnx">s'inscrire</a>
            </div>
        </div>
    </div>
       
   
    <div class="picture">
        <img src="./images/formulaire-inscription-bouton-concept-graphique_53876-101285.webp">
    </div>
    <section class="container inscription">
        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>n</span>
            <span>e</span>
            <span>x</span>
            <span>i</span>
            <span>o</span>
            <span>n</span>
        </h1>
        <form action="conn.php" method="POST" class="insc-form">
            <?php if(isset($_GET['error'])){
                      ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
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
               
            <input type="submit" value="envoyer" class="btn" name="submit">
            </form>
            </div>
    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Liens</h3>
                <a href="Acceuil.php"> <i class="fas fa-angle-right"></i> Acceuil</a>
                <a href="offres.php"> <i class="fas fa-angle-right"></i> Destinations</a>
                <a href="services.php"> <i class="fas fa-angle-right"></i> Services</a>
                <a href="apropos.php"> <i class="fas fa-angle-right"></i> A propos</a>
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
                <a href="#"> <i class="fas fa-phone"></i> contactez nous </a>
            </div>
        </div>
        <div class="credit"> created by <span>Groupe 7</span> | all rights reserved! </div>
    </section>
</body>
</html>


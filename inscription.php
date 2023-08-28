<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <title>inscreption</title>
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
        
            <a class='btn-cnx connect'>connecter</a>  
        </div>
</div>
</div>
<div class="contain">
<div class="picture">
    <img src="./images/formulaire-inscription-bouton-concept-graphique_53876-101285.webp">
</div>
<section class="booking">

    <h1 class="heading">
        <span>I</span>
        <span>n</span>
        <span>s</span>
        <span>c</span>
        <span>r</span>
        <span>i</span>
        <span>p</span>
        <span>t</span>
        <span>i</span>
        <span>o</span>
        <span>n</span>
    </h1>
    <?php if(isset($_GET['error'])){
                      ?>
            <p class="error">
            <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
            <?php if(isset($_GET['succes'])){
                      ?>
            <p class="succes">
            <?php echo $_GET['succes']; ?>
            </p>
            <?php } ?>
    <form action="inscrire.php" method="post" class="book-form">
 
       <div class="flex">
          <div class="inputBox">
             <span>Nom:</span>
             <input type="text" placeholder="Votre nom" name="nom" required>
          </div>
          <div class="inputBox">
            <span>Prénom:</span>
            <input type="text" placeholder="Votre Prénom" name="prenom" required>
         </div>
          <div class="inputBox">
             <span>email :</span>
             <input type="email" placeholder=" votre email" name="email" required minlength="10">
          </div>
          <div class="inputBox">
             <span>Téléphone:</span>
             <input type="number" placeholder="votre numéro de téléphone" name="phone" required minlength="10">
          </div>
          <div class="inputBox">
             <span>Addresse :</span>
             <input type="text" placeholder="votre addresse" name="addresse" required>
          </div>
          <div class="inputBox">
            <span>numéro de passport :</span>
            <input type="number" placeholder="numéro de passport" name="passeport" required minlength="10">
        </div>
        <div class="inputBox">
            <span>Date de naissance :</span>
            <input type="date" placeholder="votre date de naissance" name="naissance" required >
        </div>
        
        <div class="inputBox">
            <span>Mot de passe :</span>
            <input type="password" placeholder="votre mot de passe" name="mdps" required>
        </div>
        <div class="inputBox">
            <span>confirmation:</span>
            <input type="password" placeholder="confirmez votre mot de passe" name="confirmation" required>
        </div>
        <div class="inputBox">
            <span>sexe :</span>
            <select class="select" name="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>
 </div>
       <input type="submit" value="Envoyer" class="btn" name="submit"> 
    </form>
 </section>
 </div>
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
<script src="./js/script.js"></script>
</body>
</html>
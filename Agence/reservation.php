<?php
include "configuration.php" ;
session_start();
$y =$_GET['idoffre'];
$sql = "SELECT * from offre where id_ofr = $y";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$destination = $row['destination_ofr'];
$datedebut = $row['date_debut'];
$datefin = $row['date_fin'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/reservation.css">

    <title>Réservation</title>
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

                <a href="deconnexion.php" class="btn-cnx">se deconnecter</a>
            </div>
        </div>
    </div>
    <div class="picture">
        <img src="./images/images (2).jpeg">
    </div>
    <section class="container booking">
        <h1 class="heading">
            <span>R</span>
            <span>E</span>
            <span>S</span>
            <span>E</span>
            <span>R</span>
            <span>V</span>
            <span>A</span>
            <span>T</span>
            <span>i</span>
            <span>o</span>
            <span>n</span>
        </h1>
        <?php echo '<form action="./reserver.php?idoffre='.$y.'" method="post" class="book-form">' ?>
            <div class="grid">
                <div class="part1">
                    <div class="inputBox">
                        <span>Nom :</span>
                        <input type="text" placeholder="insérer votre nom" name="nom">
                    </div>
                    <div class="inputBox">
                        <span>Prénom :</span>
                        <input type="text" placeholder="insérer votre prénom" name="prenom">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="insérer votre email" name="email">
                    </div>
                    <div class="inputBox">
                        <span>numéro de téléphone :</span>
                        <input type="number" placeholder="insérer votre numéro de téléphone :" name="phone">
                    </div>
                    <div class="inputBox">
                        <span>addresse :</span>
                        <input type="text" placeholder="votre addresse" name="adresse">
                    </div>
                </div>
                <div class="part2">
                    <div class="inputBox">
                        <span>Destination :</span>
                        <input type="text" value="<?php echo $destination ?>" name="destination">
                    </div>
                    <div class="inputBox">
                        <span>nombre de personnes :</span>
                        <input type="number" placeholder="nombre de voyageurs" name="personne">
                    </div>
                    <div class="inputBox">
                        <span>date début :</span>
                        <input type="text" value="<?php echo $datedebut ?>" name="arrivée">
                    </div>
                    <div class="inputBox">
                        <span>date fin :</span>
                        <input type="text" value="<?php echo $datefin ?>" name="retour">
                    </div>
                    <div class="inputBox">
                        <span>numéro de passport :</span>
                        <input type="number" placeholder="numéro de passport" name="passeport">
                    </div>
                </div>
            </div>

            <input type="submit" value="envoyer" class="btn" name="envoyer">

        </form>
        </div>
    </section>

</body>

</html>
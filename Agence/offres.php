<?php
session_start();
include "configuration.php";
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$offres = $db->query('SELECT * from offre');
if (empty($_GET['idcl'])) {
    $_SESSION['connected'] = FALSE;
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
    <title>offres</title>

</head>

<body>
    <div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <?php
                if ($_SESSION['connected'] == FALSE) {
                    echo '<ul>
                    <li><a href="Acceuil.php">Acceuil</a></li>
                    <li><a href="offres.php" class="active">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                </ul>';
                } else {
                    echo '<ul>
                    <li><a href="Acceuil.php?idcl=' . $x . '">Acceuil</a></li>
                    <li><a href="offres.php?idcl=' . $x . '" class="active">Destinations</a></li>
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
                    echo '<a href="./offres.php" class="btn-cnx">se déconnecter</a>';
                }
                ?>
            </div>
        </div>
    </div>
    <section class="container Destinations">
        <h1 class="heading">
            <span>o</span>
            <span>f</span>
            <span>f</span>
            <span>r</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container grid grid-3">
            <?php while ($offre = $offres->fetch()) {
                $idoffre = $offre['id_ofr'];
            ?>
                <div class="box">
                    <img src="./images/<?= $offre['photo']; ?>" alt="">
                    <div class="content">
                        <h3> <i class="fas fa-map-marker-alt"></i> <?= $offre['destination_ofr'] ?> </h3>
                        <p><?= $offre['description_ofr'] ?></p>
                        <div class="price"> $<?= $offre['prix_ofr'] ?> </div>
                        <?php if ($_SESSION['connected'] == TRUE) {
                            $verification = "SELECT *from reservation where offre=$idoffre and client=$x ";
                            $execute = mysqli_query($conn, $verification);
                            $rows = mysqli_fetch_assoc($execute);
                            if ($rows) {
                                echo '<p class="erreur">Vous avez déja réservé</p>';
                            } else {
                                echo '<a href="./reservation.php?id_ofr=' . $ido . '" class="btn-reserver">réserver</a>';
                            }
                        } else if ($_SESSION['connected'] == FALSE) {
                            echo '<a class="btn-reserver connect">se connecter</a>';
                        } ?>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>
    <div id="form_connexion">
        <form id="login" action="conn.php" method="POST" class="insc-form">
            <?php if (isset($_GET['error'])) {
            ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>
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

                    <input type="submit" value="envoyer" class="btn-reserver" name="submit">
                    <div id="error"></div>
        </form>
    </div>
</body>
<script>
    const connect = document.querySelectorAll(".connect");
    Array.from(connect).forEach(function(btn) {
        btn.addEventListener("click", function() {
            <?php $_SESSION['offres'] = TRUE; ?>
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
                    }else if(response.indexOf("offre")>= 0){
                        window.location = "./offres.php?idcl="+response;
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
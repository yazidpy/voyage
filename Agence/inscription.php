<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css    ">
    <link rel="stylesheet" href="./css/utilitie.css">
    <link rel="stylesheet" href="./css/inscription.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <title>inscription</title>
</head>

<body>
    <div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <ul>
                    <li><a href="Acceuil.php">Acceuil</a></li>
                    <li><a href="destinations.php">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                </ul>
            </nav>
            
        </div>
    </div>
    <div class="picture">
        <img src="./images/formulaire-inscription-bouton-concept-graphique_53876-101285.webp">
    </div>
    <section class="container inscription">
        <!-- <h1 class="heading">
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
        </h1> -->
        <form id="form_inscription" action="./inscription2.php" method="POST" class="insc-form">
            <div class="grid">
                <div class="part1">
                    <div class="inputBox">
                        <span>Nom :</span>
                        <input type="text" placeholder="insérer votre nom" id="nom" name="nom">
                    </div>
                    <div class="inputBox">
                        <span>Prénom :</span>
                        <input type="text" placeholder="insérer votre prénom" id="prenom" name="prenom">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="insérer votre email" id="email" name="email">
                    </div>
                    <div class="inputBox">
                        <span>numéro de téléphone :</span>
                        <input type="number" placeholder="insérer votre numéro de téléphone :" id="phone" name="phone">
                    </div>
                    <div class="inputBox">
                        <span>addresse :</span>
                        <input type="text" placeholder="votre address" id="adresse" name="adresse">
                    </div>
                </div>
                <div class="part2">
                    <div class="inputBox">
                        <span>Date de naissance :</span>
                        <input type="date" placeholder="votre date de naissance" id="naissance" name="naissance">
                    </div>
                    <div class="inputBox">
                        <span>numéro de passport :</span>
                        <input type="number" placeholder="numéro de passport" id="passeport" name="passeport">
                    </div>
                    <div class="inputBox">
                        <span>mot de passe :</span>
                        <input type="password" placeholder="votre mot de passe" id="mdps" name="mdps">
                    </div>
                    <div class="inputBox">
                        <span>confirmation :</span>
                        <input type="password" placeholder="confirmez votre mot de passe" id="confirmation" name="confirmation">
                    </div>
                    <div class="inputBox">
                        <h3>Sexe :</h3>
                        <select autocomplete="off" type="text" id="sexe" name="sexe">
                            <option selected disabled value> --SEXE-- </option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                   
                </div>
            </div>
            <input type="submit" value="envoyer" class="btn" name="envoyer">
            <div id="error"></div>
        </form>
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

<script>
    $(document).ready(function(){
        $("#form_inscription").submit(function(e){
            e.preventDefault();
            var nom = $("#nom").val();
            var prenom = $("#prenom").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var adresse = $("#adresse").val();
            var passeport = $("#passeport").val();
            var naissance = $("#naissance").val();
            var mdps = $("#mdps").val();
            var confirmation = $("#confirmation").val();
            var sexe = $("#sexe").val();
            $.ajax({
                url: "./inscription2.php",
                method: "POST",
                data:{
                    insc:1,
                    nomphp: nom,
                    prenomphp: prenom,
                    emailphp: email,
                    phonephp: phone,
                    adressephp: adresse,
                    passeportphp: passeport,
                    naissancephp: naissance,
                    mdpsphp: mdps,
                    confirmationphp: confirmation,
                    sexephp: sexe 
                },
                success: function(response){
                    if(response.indexOf("succés")>= 0){
                        window.location = "./acceuil.php?"+response;
                    }else{
                        $("div#error").html(response);
                    }
                },
                dataType: "text"
            })
        })
    })


</script>

</html>
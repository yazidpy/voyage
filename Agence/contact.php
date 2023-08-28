<?php
include "configuration.php";
if (empty($_GET['idcl'])) {
    $_SESSION['connected'] = FALSE;    
}else {
    $_SESSION['connected'] = TRUE;
    $x = $_GET['idcl'];
}
if(isset($_POST['envoyer'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $num = $_POST['num'];
    $message = $_POST['message'];
    $sql = "INSERT into messages(nom,prenom,email,num,message) values('$nom','$prenom','$email','$num','$message')";
    $result = mysqli_query($conn,$sql);
    if($result){
        if($_SESSION['connected'] == TRUE){
            header("location:./acceuil.php?idcl='$x'?your message is sent");
        }else {
            header("location:./acceuil.php?your message is sent");
        }   
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>
    
    <section class="container">
        <div class="container">
            <div class="contactInfo">
                <div>
                    <h2>info de Contact</h2>
                    <ul class="info">
                        <li>
                            <span><img src="images/location.png" alt=""></span>
                            <span>
                                targa ouzmour <br>
                                bejaia
                            </span>
                        </li>
                        <li>
                            <span><img src="images/mail.png" alt=""></span>
                            <span>
                                Aghiles@gmail.com
                            </span>
                        </li>
                        <li>
                            <span><img src="images/call.png" alt=""></span>
                            <span>
                                0558187346
                            </span>
                        </li>
                    </ul>
                </div>
                <ul class="sci">
                    <li><a href="https://www.facebook.com/"><img src="images/1.png" alt=""></a></li>
                    <li><a href="https://www.instagram.com/"><img src="images/2.png" alt=""></a></li>
                    <li><a href="https://twitter.com/?lang=fr"><img src="images/3.png" alt=""></a></li>
                    

                </ul>
            </div>
            <div class="contactFrom">
                <h2>Envoyer le message</h2>
                <form method="post">
                <div class="frombox">
                    <div class="inputbox w50">
                        <input type="text" required name="nom">
                        <span>Nom</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="text" required name="prenom">
                        <span>Prénom</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="email" required name="email">
                        <span> Adresse Email</span>
                    </div>
                    <div class="inputbox w50">
                        <input type="text" required name="num">
                        <span>Numéro de téléphone</span>
                    </div>
                    <div class="inputbox w100">
                        <textarea required name="message"></textarea>
                        <span>Ecrivez votre message ici...</span>
                    </div>
                    <div class="inputbox w100">
                        <input type="submit" value="Envoyer" name="envoyer">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
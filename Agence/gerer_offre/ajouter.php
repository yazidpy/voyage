<?php
session_start();
    $_SESSION['image'] = false;
    $_SESSION['tmp'] = false;
$sname = "localhost";
$unmae = "root";
$password = "";
$db_name = "agence";
$pictures = $_POST['picturephp'];
if(isset($_POST['submit'])){
$x = is_uploaded_file($_FILES["picture"] ["tmp_name"]) ;
if($x){
    $_SESSION['image'] = $_FILES['picture']['name'];
    $_SESSION['tmp'] = $_FILES['picture']['tmp_name'];
}
}
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (isset($_POST['ajouter'])) {
    if (
        empty($_POST['titrephp']) || empty($_POST['destinationphp']) || empty($_POST['prixphp'])
        || empty($pictures) || empty($_POST['date_debutphp']) || empty($_POST['date_finphp']) || empty($_POST['descriptionphp'])
    ) {
        echo 'Veuillez remplir tous les champs';
        exit();
    } else {
        $image = $_SESSION['image'];
        $picture = $_POST['picturephp'];
        $tmp = $_SESSION['tmp'];
        $titre = htmlspecialchars($_POST['titrephp']);
        $destination = htmlspecialchars($_POST['destinationphp']);
        $prix = $_POST['prixphp'];
        $folder = "./images" . $image;
        $datedebut = $_POST['date_debutphp'];
        $datefin = $_POST['date_finphp'];
        $description = nl2br(htmlspecialchars($_POST['descriptionphp']));
        
        if ($datedebut > $datefin) {
            echo "Date de fin de l'offre est avant son début";
            exit();
        } else {
            $sql2 = "INSERT INTO offre (nom_ofr,destination_ofr,prix_ofr,photo,date_debut,date_fin,description_ofr)
        values('$titre','$destination','$prix','$picture','$datedebut','$datefin','$description')";
            $result2 = mysqli_query($conn, $sql2);
            move_uploaded_file($tmp, $folder);
        }
        if ($result2) {
            session_reset();
            echo 'Votre ajout est réussi !';
            exit();
        }
    }
}

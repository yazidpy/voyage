<?php
session_start();
include "configuration.php";
$idcl = $_SESSION['id'];
$idofr = $_GET['idoffre'];
$_SESSION['counter'] = 2;
$idvol = $_GET['idvol'];
$_SESSION['idvol'] = $idvol;
$personne = $_SESSION['personne'];
$sql = "SELECT * from client where id = $idcl";
$sql2 = "SELECT * from offre where id_ofr = $idofr";
$sql3 = "SELECT * from vol where id_vol = $idvol";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
$row3 = mysqli_fetch_assoc($result3);
$choisir = "UPDATE vol set nb_place = nb_place - $personne where id_vol=$idvol";
$ex = mysqli_query($conn,$choisir);
if ($personne == 1) {
    $sql4 = "INSERT INTO reservation(client,offre,vol,nbr_prsn) values('$idcl','$idofr','$idvol','$personne')";
    $result4 = mysqli_query($conn, $sql4);
}else{
    $sql4 = "INSERT INTO reservation(client,offre,vol,nbr_prsn) values('$idcl','$idofr','$idvol','$personne')";
    $result4 = mysqli_query($conn, $sql4);
    $sql6 = "SELECT * from reservation where client=$idcl";
    $result6 = mysqli_query($conn,$sql6);
    $row6 = mysqli_fetch_assoc($result6);
    $idres = $row6['id_res'];
    header("location:voyageurs.php?idreservation=$idres&idoffre=$idofr");
}
$sql5 = "SELECT * from reservation where client = $idcl";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/trait.css">
    <title>Confirmation</title>
</head>

<body>
    <div class="container my-3 p-5 bg-primary bg-gradient" style="--bs-bg-opacity: .6; border-radius:25px">
        <h3 class="text-center">Confirmation</h3>
        <div class="field">
            <label class="text-light fs-4">Nom:</label>
            <span class="form-control border-dark"><?php echo $row['nom_cl'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Prénom:</label>
            <span class="form-control border-dark"><?php echo $row['prenom_cl'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Numéro de réservation</label>
            <span class="form-control border-dark"><?php echo $row5['id_res'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Référence Client:</label>
            <span class="form-control border-dark"><?php echo $row['id'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Référence vol:</label>
            <span class="form-control border-dark"><?php echo $row3['id_vol'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Destination:</label>
            <span class="form-control border-dark"><?php echo $row2['destination_ofr'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Date de départ:</label>
            <span class="form-control border-dark"><?php echo $row3['date_dep'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Aéroport de départ:</label>
            <span class="form-control border-dark"><?php echo $row3['aeroport_dep'] ?></span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Aéroport d'arrivé:</label>
            <span class="form-control border-dark"><?php echo $row3['aeroport_arv'] ?></span>
        </div>
        <button class="btn btn-dark my-3">Imprimer</button>
    </div>
</body>

</html>
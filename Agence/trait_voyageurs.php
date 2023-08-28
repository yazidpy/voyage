<?php
session_start();
include "configuration.php";
$idcl = $_SESSION['id'];
$idofr = $_GET['idoffre'];
$idvol = $_SESSION['idvol'];
$sql = "SELECT * from client where id = $idcl";
$sql2 = "SELECT * from offre where id_ofr = $idofr";
$sql3 = "SELECT * from vol where id_vol = $idvol";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
$row3 = mysqli_fetch_assoc($result3);
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
    </div>

    <!-- autres voyageurs -->
    <?php 
    $idres = $_GET['idres'];
    $voyage = "SELECT * from voyageurs where id_reservation=$idres";
    $result_v = mysqli_query($conn,$voyage);
    $counter = 2;
    while($voyageur = mysqli_fetch_assoc($result_v)){
        $nomv = $voyageur['nomv'];
        $prenomv = $voyageur['prenomv'];
        $nump = $voyageur['nump'];
        $daten = $voyageur['daten'];
    echo '
    <div class="container my-3 p-5 bg-primary bg-gradient" style="--bs-bg-opacity: .6; border-radius:25px">
        <h3 class="text-center">Voyageur n°'.$counter.'</h3>
        <div class="field">
            <label class="text-light fs-4">Nom:</label>
            <span class="form-control border-dark">'.$nomv.'</span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Prénom:</label>
            <span class="form-control border-dark">'.$prenomv.'</span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Numéro de passport:</label>
            <span class="form-control border-dark">'.$nump.'</span>
        </div>
        <div class="field">
            <label class="text-light fs-4">Date de naissance:</label>
            <span class="form-control border-dark">'.$daten.'</span>
        </div>
    </div> ';
    $counter += 1;
    }
    ?>
</body>

</html>
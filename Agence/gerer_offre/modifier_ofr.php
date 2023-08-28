<?php
include "../configuration.php";

if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nomofr'];
    $dest = $_POST['destofr'];
    $prix = $_POST['prixofr'];
    $photo = $_POST['photo'];
    $datedebut = $_POST['datedebut'];
    $datefin = $_POST['datefin'];
    $description = $_POST['descriptionofr'];

    $sql = "UPDATE offre set nom_ofr='$nom',destination_ofr='$dest',prix_ofr='$prix',photo='$photo',date_debut='$datedebut',date_fin='$datefin',description_ofr='$description' where id_ofr=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 'offre modifié avec succés';
    } else {
        die(mysqli_error($conn));
    }
}

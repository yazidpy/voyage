<?php
include "../configuration.php";
if (isset($_POST['ajouter'])) {
    if (
        empty($_POST['idofrphp']) || empty($_POST['adepphp']) || empty($_POST['aarivphp'])
        || empty($_POST['hdepart']) || empty($_POST['hretour']) || empty($_POST['datedepphp']) || empty($_POST['dateretphp']) || empty($_POST['nbrplacesphp'])
    ) {
        echo 'Veuillez remplir tous les champs';
        exit();
    }else{
    $id_offre = $_POST['idofrphp'];
    $adep = $_POST['adepphp'];
    $aariv = $_POST['aarivphp'];
    $datedep = $_POST['datedepphp'];
    $dateret = $_POST['dateretphp'];
    $nbr = $_POST['nbrplacesphp'];
    $hdepart = $_POST['hdepart'];
    $hretour = $_POST['hretour'];
    $sql2 = "SELECT * from offre where id_ofr = $id_offre";
    $execution = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($execution);
        if ($datedep < $row['date_debut'] || $datedep > $row['date_fin'] || $dateret < $row['date_debut'] || $dateret > $row['date_fin'] || $datedep > $dateret) {
        echo 'La date de depart ou de retour de vol est incorrecte';
        exit();
    } else {
        $sql = "INSERT INTO vol(id_offre,aeroport_dep,aeroport_arv,date_dep,heure_dep,date_ret,heure_ret,nb_place) values('$id_offre','$adep','$aariv','$datedep','$hdepart','$dateret','$hretour','$nbr')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Ajout de vol réussi !';
            exit();
        }
    }
}
}

<?php
include "../configuration.php";

if (isset($_POST['modifier'])) {
    $idv = $_POST['id'];
    $dep = $_POST['adepart'];
    $ariv = $_POST['aarivee'];
    $hdep = $_POST['hdepv'];
    $hret = $_POST['hretv'];
    $datedep = $_POST['datedepv'];
    $dateret = $_POST['dateretv'];
    $nb = $_POST['nbrplacesv'];

    $sql2 = "UPDATE vol set aeroport_dep='$dep',aeroport_arv='$ariv',date_dep='$datedep',heure_dep='$hdep',date_ret='$dateret',heure_ret='$hret',nb_place='$nb' where id_vol=$idv";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        echo 'vol modifié';
    } else {
        die(mysqli_error($conn));
    }
}
?>

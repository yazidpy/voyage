<?php
include "../configuration.php";
$id = $_GET['updateid'];
$sql = "SELECT * from vol where id_vol = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$adep = $row['aeroport_dep'];
$aariv = $row['aeroport_arv'];
$ddep = $row['date_dep'];
$dret = $row['date_ret'];
$nbplace = $row['nb_place'];

if (isset($_POST['submit'])) {
    $idv = $_POST['idvol'];
    $dep = $_POST['adep'];
    $ariv = $_POST['aariv'];   $des = $_POST['destin'];
    $datedep = $_POST['datedep'];
    $dateret = $_POST['dateret'];
    $nb = $_POST['nbrplaces'];

    $sql2 = "UPDATE vol set id_vol='$idv',aeroport_dep='$dep',aeroport_arv='$ariv',date_dep='$datedep',date_ret='$dateret',nb_place='$nb' where id_vol=$id";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header('location:../espace_admin.php?succes=un vol est modifié');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>modifier le vol</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <h3>Modifier le vol</h3>
            <?php if (isset($_GET['error'])) {
        ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>

            <div class="mb3">
                <label class="form-label">ID vol</label>
                <input type="number" class="form-control" name="idvol" value="<?php echo $id?>">
            </div>
            <div class="mb3">
                <label class="form-label">Aeroport de départ</label>
                <input type="text" class="form-control" name="adep" value="<?php echo $adep?>">
            </div>
            <div class="mb3">
                <label class="form-label">Aeroport d'arrivé</label>
                <input type="text" class="form-control" name="aariv" value="<?php echo $aariv?>">
            </div>
            <div class="mb3">
                <label class="form-label">Date De Départ</label>
                <input type="date" class="form-control" name="datedep" value="<?php echo $ddep?>">
            </div>
            <div class="mb3">
                <label class="form-label">Date De Retour</label>
                <input type="date" class="form-control" name="dateret" value="<?php echo $dret?>">
            </div>
            <div class="mb3">
                <label class="form-label">Nombre de places</label>
                <input type="number" class="form-control" name="nbrplaces" value="<?php echo $nbplace?>">
            </div>
            <input type="submit" value="Modifier" class="btn btn-dark my-3" id="btn1" name="submit">
        </form>
    </div>
</body>

</html>
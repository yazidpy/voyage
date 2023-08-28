<?php
session_start();
include "../configuration.php";
$x=$_GET['idoffre'];
$y=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Choix de vol</title>
</head>

<body>
    <div class="container my-5">
        <table class="table">
            <legend>Choisir un vol</legend>
            <?php echo $_SESSION['ido']; ?>
            <thead>
                <tr>
                    <th class="col">id vol</th>
                    <th class="col">aeroport départ</th>
                    <th class="col">aeroport arrivé</th>
                    <th class="col">destination</th>
                    <th class="col">date départ</th>
                    <th class="col">date retour</th>
                    <th class="col">nombre de places</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from vol where id_offre = $x";
                $result = mysqli_query($conn, $sql);
                $frow = mysqli_num_rows($result);
                if(!$frow) {
                    echo '<tr><td colspan="7" class="text-danger fs-1 fw-bold text-center">vols non disponibles</td></tr>';
                }
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idvol = $row['id_vol'];
                        $adep = $row['aeroport_dep'];
                        $aariv = $row['aeroport_arv'];
                        $destin = $row['destination_vol'];
                        $datedep = $row['date_dep'];
                        $dateret = $row['date_ret'];
                        $nbrplaces = $row['nb_place'];
                        echo '<tr>
                            <th scope="row">' . $idvol . '</th>
                            <td>' . $adep . '</td>
                            <td>' . $aariv . '</td>
                            <td>' . $destin . '</td>
                            <td>' . $datedep . '</td>
                            <td>' . $dateret . '</td>
                            <td>' . $nbrplaces . '</td>
                            <td>
                            <a class="text-light" href="../trait.php?idvol='.$idvol.'&idoffre='.$x.'"><button class="btn btn-primary">Choisir</button></a>
                            </td>
                        </tr>';
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
include "configuration.php";
session_start();
$personne = $_SESSION['personne'];
$ido = $_GET['idoffre'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/utilities.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Voyageurs</title>
</head>

<body>
  <div class="formv container">
    <form method="post">
      <?php
            for($i=2; $i<=$personne;$i++){
        ?>
      <div class="formulaire my-3 p-2">
        <h2>Formulaire de Voyageur n°
          <?php echo $i ?>
        </h2>
        <div class="mb-3">
          <label class="form-label">Nom:</label>
          <input type="text" class="form-control" name="nomv<?php echo $i ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Prénom:</label>
          <input type="text" class="form-control" name="prenomv<?php echo $i ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Date de naissance:</label>
          <input type="date" class="form-control" name="daten<?php echo $i ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Numéro de passport:</label>
          <input type="number" class="form-control" name="nump<?php echo $i ?>">
        </div>
      </div>
      <?php } ?>
      <input class="btn-reserver" type="submit" value="envoyer" name="envoyer">
    </form>
  </div>
  <?php
  if (isset($_POST['envoyer'])) {
    $idres = $_GET['idreservation'];
    for($i=2; $i<=$personne;$i++){
    $nomv = $_POST['nomv'.$i.''];
    $prenomv = $_POST['prenomv'.$i.''];
    $nump = $_POST['nump'.$i.''];
    $daten = $_POST['daten'.$i.''];
    $sql = "INSERT into voyageurs(nomv,prenomv,nump,daten,id_reservation) values('$nomv','$prenomv','$nump','$daten','$idres')";
    $result = mysqli_query($conn, $sql);
    }
    header("location:trait_voyageurs.php?idres=$idres&idoffre=$ido");
  }
  ?>
</body>

</html>
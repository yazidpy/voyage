<?php
include "../configuration.php";
$id = $_GET['updateid'];
$sql2= "SELECT * from offre where id_ofr = $id";
$result2 = mysqli_query($conn,$sql2);
$row = mysqli_fetch_assoc($result2);
$nom = $row['nom_ofr'];
$dest = $row['destination_ofr'];
$prix = $row['prix_ofr'];
$datedebut= $row['date_debut'];
$datefin = $row['date_fin'];
$description= $row['description_ofr'];
$place=$row['place_res'];
if(isset($_POST['submit'])){
    $nom = $_POST['nom_ofr'];
    $dest = $_POST['destination_ofr'];
    $prix = $_POST['prix_ofr'];
    $photo= $_POST['photo'];
    $datedebut= $_POST['date_debut'];
    $datefin = $_POST['date_fin'];
    $description= $_POST['description_ofr'];
    $place=$_POST['place'];

$sql = "UPDATE offre set nom_ofr='$nom',destination_ofr='$dest',prix_ofr='$prix',photo='$photo',date_debut='$datedebut',date_fin='$datefin',description_ofr='$description',place_res='$place' where id_ofr=$id";
$result = mysqli_query($conn,$sql);
if($result){
    header('location:../espace_admin.php?succes= une offre est modifiée');
}else{
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
    <title>modifier</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom_ofr" value="<?php echo $nom ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <input type="text" class="form-control" name="destination_ofr" value="<?php echo $dest ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Prix</label>
                <input type="text" class="form-control" name="prix_ofr" value="<?php echo $prix ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Date Debut</label>
                <input type="date" class="form-control" name="date_debut" value="<?php echo $datedebut ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Date Fin</label>
                <input type="date" class="form-control" name="date_fin" value="<?php echo $datefin ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <input type="text" class="form-control" name="description_ofr" value="<?php echo $description ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">place</label>
                <input type="number" class="form-control" name="place" autocomplete="off">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html> 

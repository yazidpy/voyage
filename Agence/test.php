<?php
include "configuration.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container my-3">
        <form method="post">
            <?php
            for($i=2; $i<=3;$i++){
            ?>
            <h2>Voyageur n°<?php echo $i ?></h2>
            <label>NOM:</label>
            <input type="text" name="nom<?php echo $i ?>">
            <label>Prenom:</label>
            <input type="text" name="prenom<?php echo $i ?>">
            <?php } ?>
            <input type="submit" name="envoyer" value="envoyer">
        </form>
        <?php 
        if(isset($_POST['envoyer'])){
            for($i=2; $i<=3;$i++){
                $nom = $_POST['nom'.$i.''];
                $prenom = $_POST['prenom'.$i.''];
                $sql = "INSERT into test(nom,prenom) values('$nom','$prenom')";
                $result = mysqli_query($conn,$sql);
                echo $i;
            }
        }
        ?>
    </div>
</body>
</html>
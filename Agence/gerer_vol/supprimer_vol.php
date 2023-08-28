<?php
include "../configuration.php";
if(isset($_POST['supprimer'])){
    $id = $_POST['idphp'];
    $sql = "DELETE from vol where id_vol = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo 'vol supprimé';
    }
}
?>
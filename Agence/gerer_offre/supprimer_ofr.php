<?php 
 include "../configuration.php";
 if(isset($_POST['supprimer'])){
    $id = $_POST['idphp'];
    $sql = "DELETE from offre where id_ofr = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo 'offre supprimé';
    }
}
?>

<?php
include "../configuration.php";
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE from vol where id_vol = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:../espace_admin.php?succes= un vol  est supprimé');
    }else{
        die(mysqli_error($conn));
    }
}
?>
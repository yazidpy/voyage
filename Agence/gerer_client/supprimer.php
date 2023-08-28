<?php
    include "../configuration.php";
    if(isset($_POST['supprimer'])){
        $id = $_POST['idphp'];
        $sql = "DELETE from client where id = $id";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo 'client supprimé';
        }
    }
?>
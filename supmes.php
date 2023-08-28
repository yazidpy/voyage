<?php
include "configuration.php";
if(isset($_GET['idmes'])){
    $idmes = $_GET['idmes'];
    $sql = "DELETE from messages where id_mes = $idmes";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:./messages.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>
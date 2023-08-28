<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "agence";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
    
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE from client where id = $id";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:http://localhost/final/espace_admin.php?succes=un client est supprimé");
        }else{
            die(mysqli_error($conn));
        }
    }
?>





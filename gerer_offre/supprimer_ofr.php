<?php 
 include "../configuration.php";
 if(isset($_GET['deleteid'])){
     $id = $_GET['deleteid'];
     $sql = "DELETE from offre where id_ofr = $id";
     $result = mysqli_query($conn,$sql);
     if($result){
         header('location:../espace_admin.php?succes=une offre est supprimée');
     }else{
         die(mysqli_error($conn));
     }
 }
?>

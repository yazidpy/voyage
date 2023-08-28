<?php
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
if(isset($_GET['idres'])){
    $reserv=$_GET['idres'];
    $sql = $db->prepare("SELECT * FROM reservation where id_res='$reserv'");
    $sql->execute();
    $fech = $sql->fetch();
    $tp=$fech['type_demande'];
    if($tp=='Annuler'){
        header("location:reservation.php?error11=La demande d'annuler votre reservation est déjà  envoyée");
    }
    else{
    $inserer = $db->prepare("UPDATE  reservation SET   type_demande='Annuler' where id_res=$reserv");
   $inserer->execute();
   if($inserer){
    header("location:reservation.php?error11=La demande d'annuler votre  reservation est envoyée avec succes ");
   }
}
}

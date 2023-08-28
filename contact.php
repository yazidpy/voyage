<?php
include "configuration.php";
    $x = $_GET['client'];
if(isset($_POST['envoyer'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $num = $_POST['num'];
    $message = $_POST['message'];
    $client = "SELECT * from client where id=$x ";
$execution = mysqli_query($conn,$client);
$rec=mysqli_fetch_assoc($execution);
if($nom!==$rec['nom_cl']||   $prenom!==$rec['prenom_cl'] || $email!==$rec['email']|| $num!==$rec['n_tele']){
    header("location:acceuil.php?client=$x&error=vous informations ne sont pas correct");
}
else{

    $sql = "INSERT into messages(nom,prenom,email,num,message) values('$nom','$prenom','$email','$num','$message')";
    $result = mysqli_query($conn,$sql);
    if($result){ 
            header("location:acceuil.php?client=$x&succes=Votre message est enovoyé ");
        }   
    }
}
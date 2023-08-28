<?php
session_start();
$db=new PDO('mysql:host=localhost;dbname=agence;','root','');
if(isset($_POST['envoyer'])){
$x=$_GET['idoffre'];
$y=$_SESSION['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$adresse=$_POST['adresse'];
$personne=$_POST['personne'];
$passeport=$_POST['passeport'];
if(empty($nom) or  empty($prenom) or  empty($email) or  empty($phone) or 
empty($adresse) or  empty($personne)){
    header("location:reservation.php?idoffre=$x&error=veuillez remplir tous les champs ");
}  
else{
$client=$db->prepare("SELECT * from client where id=?");
$client->execute(array($y));
$cl=$client->fetch();
$offre=$db->prepare("SELECT * from offre where id_ofr=?");
$offre->execute(array($x));
$ofr=$offre->fetch();
if($cl['nom_cl']==$nom AND $cl['prenom_cl']==$prenom AND  $cl['email_cl']==$email AND 
$cl['n_tele']==$phone  AND $cl['adresse']==$adresse AND  $cl['passeport']==$passeport)
{
header("location:./gerer_vol/choix_vol.php?idoffre=$x");
$_SESSION['personne']=$personne;
}

else 
{
    header("location:reservation.php?idoffre=$x&error=vos informations sont pas correct veuillez réssayer");
}
}
}

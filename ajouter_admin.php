<?php 
include "configuration.php";
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
if(isset($_POST['submit'])){
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$password=$_POST['password'];
$inserer = $db->prepare("INSERT INTO admin (nom_adm,prenom_adm,login,mot_passe)
values (?,?,?,?)");
$inserer->execute(array($nom,$prenom,$email,$password));
if ($inserer) {
header("location:espace_admin.php?succes= un admin est ajouté");
}
}
if(isset($_GET['del']))
$res=$_GET['del'];
$suppr= $db->prepare("DELETE  from admin where id_adm=$res");
$suppr->execute();
if($suppr){
header("location:espace_admin.php?succes= un admin est supprimé!");
}
?>
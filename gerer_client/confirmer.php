<?php
$db=new PDO('mysql:host=localhost;dbname=agence;','root','');
if(isset($_GET['etat']) and !empty($_GET['etat'])){
$confirmer=$_GET['etat'];
$req=$db->prepare('UPDATE client set état="validé" where id=?');
$req->execute(array($confirmer));
header("location:http://localhost/final/espace_admin.php?succes=un utilisateur est validé");
} 
?>
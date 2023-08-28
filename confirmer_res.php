<?php
$db=new PDO('mysql:host=localhost;dbname=agence;','root','');
if(isset($_GET['etat']) and !empty($_GET['etat'])){
$confirmer=$_GET['etat'];
$req=$db->prepare('UPDATE reservation set confirmation ="confirmé",type_demande="pas_demande" where id_res=?');
$req->execute(array($confirmer));
header("location:espace_admin.php?succes=une reservation est validée");
} 
?>

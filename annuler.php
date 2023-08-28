<?php
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$res=$_GET['idres'];
$suppr= $db->prepare("DELETE  from reservation where id_res=$res");
$suppr->execute();
if($suppr){
header("location:espace_admin.php?succes= une  réservation est supprimé!");
}
?>
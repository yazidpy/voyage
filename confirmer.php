<?php 
session_start();
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$vols=$_GET['vol'];
$offre=$_GET['idoffre'];
$client=$_SESSION['id_cl'];
$personne=$_GET['personne'];
  if($personne==1){  
   $verifier = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
   $verifier->execute(array($client, $offre, $vols));
   $recup = $verifier->rowCount();
  if ($recup == 0) { 
  $inserer = $db->prepare("INSERT INTO reservation (client,offre,vol,nbr_prsn)
values (?,?,?,?)");
$inserer->execute(array($client, $offre, $vols, $personne));
if ($inserer) {
    $update = $db->prepare("UPDATE vol SET nb_place= nb_place-1 WHERE id_offre=? AND id_vol=?");
    $update->execute(array($offre, $vols));
    $update1 = $db->prepare("UPDATE offre SET place_res=place_res-1 WHERE id_ofr=?");
    $update1->execute(array($offre));
    $sql = $db->query("SELECT * FROM client where id='$client'");
            $clien = $sql->fetch();
            $sql2 = $db->query("SELECT * FROM reservation where client='$client' and offre='$offre' and vol='$vols'");
            $reser = $sql2->fetch();
            $id_reservation = $reser['id_res'];
            $sql3 = $db->prepare("INSERT INTO voyageurs (id_reservation,nomv,prenomv,daten,sexe,nump) values
    (?,?,?,?,?,?)");
    $sql3->execute(array($id_reservation, $clien['nom_cl'], $clien['prenom_cl'], $clien['date_naiss'], $clien['sexe'],$clien['passeport']));
    if($sql3){
      $v = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
      $v->execute(array($client, $offre, $vols));
      $re=$v->fetch();
      $res=$re['id_res'];
    header("location:reservation.php?idoffre=$offre&idres=$res&error4= votre réservation est crée!");
    }
    exit();
}
}
else {
  $v = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
  $v->execute(array($client, $offre, $vols));
  $re=$v->fetch();
  $res=$re['id_res'];
    header("location:reservation.php?idoffre=$offre&idrese=$res&error5=votre réservation à été déjà crée!");
    exit();
}
}
?>

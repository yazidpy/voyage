<?php 
session_start();
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$client=$_SESSION['id_cl'];
$offre=$_GET['idoffre'];
$vols=$_GET['vol'];
$personne=$_GET['personne']; 
if(isset($_POST['envoyer'])){
    for($i=2; $i<=$personne;$i++){
        $nomv = $_POST['nomv'.$i.''];
        $prenomv = $_POST['prenomv'.$i.''];
        $daten = $_POST['daten'.$i.''];
        $sexe = $_POST['sexe'.$i.''];
        $nump = $_POST['numv'.$i.''];
    }
    $verifier = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
    $verifier->execute(array($client, $offre, $vols));
    $recup = $verifier->rowCount();
   if ($recup == 0){
 $inserer = $db->prepare("INSERT INTO reservation (client,offre,vol,nbr_prsn)
 values (?,?,?,?)");
 $inserer->execute(array($client, $offre, $vols, $personne));
 if ($inserer){
    $verifier = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
    $verifier->execute(array($client, $offre, $vols));
    $reservation=$verifier->fetch();
    $res=$reservation['id_res'];
    $update = $db->prepare("UPDATE vol SET nb_place= nb_place-$personne WHERE id_offre=? AND id_vol=?");
    $update->execute(array($offre, $vols));
    $update1 = $db->prepare("UPDATE offre SET place_res=place_res-$personne WHERE id_ofr=?");
    $update1->execute(array($offre));
    $sql = $db->query("SELECT * FROM client where id='$client'");
$clien = $sql->fetch();
$sql3 = $db->prepare("INSERT INTO voyageurs (nomv,prenomv,daten,sexe,nump,id_reservation) values
(?,?,?,?,?,?)");
$sql3->execute(array($clien['nom_cl'], $clien['prenom_cl'], $clien['date_naiss'], $clien['sexe'],$clien['passeport'],$res));
    for($i=2; $i<=$personne;$i++){
        $sql3 = $db->prepare("INSERT INTO voyageurs (nomv,prenomv,daten,sexe,nump,id_reservation) values
        (?,?,?,?,?,?)");
        $sql3->execute(array($nomv,$prenomv, $daten,$sexe,$nump,$res));
    }
    if($sql3){

        $v = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
        $v->execute(array($client, $offre, $vols));
        $re=$v->fetch();
        $res=$re['id_res'];
        header("location:reservation.php?idoffre=$offre&idres=$res&error4=votre réservation est crée!");

        } 
    }
}else{
    $v = $db->prepare("SELECT * from reservation where client=? and offre=? and vol=?");
    $v->execute(array($client, $offre, $vols));
    $re=$v->fetch();
    $res=$re['id_res'];
    header("location:reservation.php?idoffre=$offre&idrese=$res&error5=votre réservation est crée déjà!");

}
    }
    
?>

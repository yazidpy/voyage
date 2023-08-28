<?php
include "configuration.php";
session_start();
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');

$res=$_GET['idres']; 
$sql2 = $db->query("SELECT * FROM reservation where id_res='$res'");
$reser = $sql2->fetch();
$etat=$reser['confirmation'];
$type=$reser['type_demande'];
if($type=="Annuler"){
 header("location:reservation.php?error10=vous avez annuler cette réservation pous pouvez consultez d'autres offres plus tard Merci");
}
else{ 
if(($etat=="confirmé"))
{
$client=$reser['client'];
$vols=$reser['vol'];
$offre=$reser['offre'];
$numeroRes = $reser['id_res'];
$date_res = $reser['date_reservation'];
$nbprsn=$reser['nbr_prsn'];
$sql = $db->query("SELECT * FROM client where id='$client'");
$client = $sql->fetch();
$nom = $client['nom_cl'];
$prenom = $client['prenom_cl'];
$reference = $client['id'];
$passport=$client['passeport'];
$naiss=$client['date_naiss'];
$se=$client['sexe'];
$of = $db->query("SELECT * FROM offre where id_ofr='$offre' ");
$off = $of->fetch();
$destination=$off['destination_ofr'];
$prix=$off['prix_ofr'];
$rech = $db->query("SELECT * FROM vol where id_offre='$offre' and id_vol='$vols' ");
$vol = $rech->fetch();
    $numero_vol = $vol['id_vol'];
    $date_dep = $vol['date_dep'];
    $heure_dep = $vol['heure_dep'];
    $date_ret = $vol['date_dep'];
    $heure_ret = $vol['heure_dep'];
    $dep = $vol['aeroport_dep'];
    $arv = $vol['aeroport_arv'];
    $rechercher = $db->query("SELECT * FROM voyageurs where nump='$passport' and id_reservation='$res' ");
$vyg = $rechercher->fetch();
$numero=$vyg['id_v'];
$sql4 = $db->query("SELECT id_v,count(*) as total  FROM voyageurs  where id_reservation='$res'");
$vygs = $sql4->fetch();
$numero = $vygs['id_v'];
$sql4->closeCursor();
$total = $vygs['total'];





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/pdf.css?khu">
    <link rel="stylesheet" href="./css/utilities.css">

   
    <title>confirmation de Réservation </title>
</head>
<body> 
         




<div class="piece">
<div class="logo">
<img src="" alt="">
<h1>Confirmation de réservation   <p>Voyageur Numéro :  <?php echo  $numero ?>     </p>        </h1>

</div>
<div class="elements">
    <div class="grid-2">
<div>
<p>Nom:       <?php echo $nom ?>           </p>
<p>Prénom:           <?php echo  $prenom ?>             </p>
<p>Sexe:               <?php echo $se?></p>
</div>
<div>
   
 <p>Numéro de client:       <?php echo $reference?>                 </p>
    <p>Passeport:       <?php echo $passport?>                 </p>
    <p>Date naissance :<?php  echo $naiss ?></p>
</div>
</div>
<div class="grid-2">
    <div>
        <p>Destination:             <?php echo  $destination ?>                     </p>
        <p>Numéro de Resérvation :   <?php echo  $numeroRes ?>                     </p>
        </div>
        <div>
        <p>Prix :                   <?php echo  $prix ?>  DA                </p>
        <p>Date de resérvation:       <?php echo  $date_res ?>                 </p>
        </div>
</div>


<div class="grid-2">
    <div>
        <p>Numéro de vol:             <?php echo  $numero_vol ?>                           </p>
        <p>Date de départ :         <?php   echo $date_dep ?>               </p>
        </div>
        <div>
        <p>Nombre de voyageurs :                 <?php echo  $total  ?>                          </p>
        <p>heure de départ :                <?php echo  $heure_dep ?>        </p>
        </div>
</div>


<div class="grid-2">
    <div>
        <p>Aéroport de départ :             <?php  echo $dep ?>                     </p>
        <p>Date de retour :             <?php echo $date_ret ?>           </p>
        </div>
        <div>
        <p>Aéroport d'arrivé :         <?php echo $arv ?>                             </p>
        <p>heure de  retour :              <?php  echo $heure_ret ?>          </p>
        </div>
</div>
<?php 
if($nbprsn>1){
    $sql9 = "SELECT * FROM voyageurs  where id_reservation='$res'";
    $result9=mysqli_query($conn,$sql9);
    $i=2;
    
    echo '
    
    <h3>Liste des voyageurs</h3>
    <div class="voyag">';

    while($vyg = mysqli_fetch_assoc($result9) and $i <= $nbprsn){
   $nomv=$vyg['nomv'];
   $prenomv=$vyg['prenomv'];
   $sexv=$vyg['sexe'];
   $passportv=$vyg['nump'];
   $naissv=$vyg['daten'];
   $idd=$vyg['id_v'];
  echo' 
   <div class="vy1">
   <p>Référence : '.$idd.' </p>
   <p>nom   :  '.$nomv.' </p>
   <p>prénom   :  '.$prenomv.' </p>
   <p>Sexe:   :  '.$sexv.' </p>
   <p>Numéro de passeport  :  '.$passportv.' </p>
   <p>date de  naissance  :  '.$naissv.' </p>
   </div>

   ';
   $i++;
  
    }
    echo '</div>';
}

?>

<div class="certification">
<img src="">

</div>
</div>
</div>
<div class="generateur">
</div>
</div>
<button onclick="afficher()" class="submit" >Telecharger le pdf</button>
<script>
function afficher(){
window.print();
}

</script>




















</body>
</html>
<?php 
}else

{
    header("location:reservation.php?error10=votre reservation n'est pas encore validé par les admins");
}
}
 ?> 
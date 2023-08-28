<?php 
session_start();
$y=$_GET['idoffre'];
if(!isset($_GET['error2'])){
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');                                   
$y=$_GET['idoffre'];                                  
$sql=$db->query( "SELECT * from vol where id_offre = '$y'");
$personne=$_SESSION['personne'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?dshj">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <title>vols</title>
</head>
<body>
   



<div class="nav">
        <div class="container flex">
            <a href="Acceuil.php" class="logo">Agence<span> De Voyage</span></a>
            <nav>
                <?php
                if (!isset($_SESSION['id_cl'])) {
                 
                    echo '<ul>
                    <li><a href="acceuil.php" class="active">Acceuil</a></li>
                    <li><a href="offre.php">Destinations</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about.php">A propos</a></li>
                </ul>';
                } else {
                    $ab=$_SESSION['id_cl'];
                    echo '<ul>
                    <li><a href="acceuil.php?client=' . $ab . '" >Acceuil</a></li>
                    <li><a href="offre.php?client=' . $ab . '"class="active">Destinations</a></li>
                    <li><a href="services.php?client=' . $ab . '">Services</a></li>
                    <li><a href="about.php?client=' . $ab . '">A propos</a></li>
                </ul>';
                }
                ?>
            </nav>
            <div class="connexion">
                <?php
                if (!isset($_SESSION['id_cl'])){
                    echo "<a class='btn-cnx connect'>connecter</a>
                <a href='inscription.php' class='btn-cnx'>s'inscrire</a>";
                } else {
                    echo '<a href="deconnexion.php" class="btn-cnx">se déconnecter</a>';
                }
                ?>
            </div>
        </div>

    </div>







    <?php if(isset($vols)){ ?>
    
    
     </div>
<?php }else{  ?>
    <div class="head" style="background:url(images/home-slide-3.jpg) no-repeat">
        <h1>Reserver un Vol!</h1>
     </div> 
     <?php if (isset($_GET['error2'])){
            $error=$_GET['error2'];
        echo '<h4 class=error >'.$error.' <a href="reservation.php?idoffre='.$y.'">Retour</a></h4>'; 
        }else{?>
     <div class="choix">
          <div class="container my-5">
                    <table class="table">
                       <h1 class="choisir">Choisir Un vol </h1>
                       
                        <thead>
                         <tr>
                                
                                <th class="col">Référence</th>
                                <th class="col">Aeroport départ</th>
                                <th class="col">date départ</th>
                                <th class="col">Heure de départ</th>
                                <th class="col">Aeroport arrivé</th>
                                <th class="col">Date retour</th>
                                <th class="col">Heure de retour</th>
                                <th class="col">nombre de places disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                                while ($row3 = $sql->fetch()) {
                                    $id_ofr = $row3['id_offre'];
                                    $idvol = $row3['id_vol'];
                                    $adep = $row3['aeroport_dep'];
                                    $aariv = $row3['aeroport_arv'];
                                    $heuredep = $row3['heure_dep'];
                                    $datedep = $row3['date_dep'];
                                    $heureret = $row3['heure_ret'];
                                    $dateret = $row3['date_ret'];
                                    $nbrplaces = $row3['nb_place'];
                                    
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $idvol ?></td>
                                        <td><?php echo  $adep ?></td>
                                        <td><?php echo $aariv ?></td>
                                        <td><?php echo $heuredep ?></td>
                                        <td><?php  echo $datedep ?></td>
                                        <td><?php  echo $heureret ?></td>
                                        <td><?php echo $dateret ?></td>
                                        <td><?php echo $nbrplaces ?></td> 
                                        <td>
                                        <?php if($personne>$nbrplaces){
                                            header("location:vols.php?idoffre=$y&error2=vous pouvez reserver un vol seulement pour $nbrplaces personnes");

                                            

                                        }else{
                                        if($personne>1){echo
                                        '<a name="envoyer" class="text-light" href="reservation.php?vol=' . $idvol . '&idoffre=' . $y . '&personne='.$personne.'"><button class="btn btn-primary">choisir</button></a>';
                                        }else{
                                        echo
                                        '<a name="envoyer" class="text-light" href="confirmer.php?vol=' . $idvol . '&idoffre=' . $y . '&personne='.$personne.'"><button class="btn btn-primary">choisir</button></a>';
                                       } }?>
                                        </td>          
                                    </tr> 
                                    <?php } ?>   
                        </tbody>
                        
                    </table>
                
              <?php echo '<a class="text-light btn " href="reservation.php?idoffre=' . $y . '"><button class="btn btn-primary">Annuler</button></a>'; ?>
     </div>
     </div>
 <?php }} ?>
</body>
</html>
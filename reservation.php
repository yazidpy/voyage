<?php
session_start();
if((!isset($_GET['error10'])) && (!isset($_GET['error11'])))
{
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
$y =$_GET['idoffre'];
$sql = $db->query("SELECT * FROM offre where id_ofr='$y'");
$row = $sql->fetch();
$total=$row['place_res'];
$destination = $row['destination_ofr'];
$datedebut = $row['date_debut'];
$datefin = $row['date_fin'];
if (isset($_POST['submit'])){
    $prsn=$_POST['personne'];
    if(empty($prsn)){
        header("location:reservation.php?idoffre=$y&error=veuillez remplir tous les champs!");
        exit();
    }
    else{
        $_SESSION['personne']=$prsn;
        if($prsn==1)
        {
    header("location:vols.php?idoffre=$y&personne=$prsn");
    }
    else { if($prsn>1){
        if($prsn>$total){
header("location:reservation.php?idoffre=$y&error6=vous pouvez pas reserver pour $prsn personnes");
    } else
        header("location:vols.php?idoffre=$y&personne=$prsn");
        exit();
    }
else{
        header("location:reservation.php?idoffre=$y&error=le nombre de personne doit être valide!");
        exit();
    }
}    
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?jfjs">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Reservation</title>
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
                    <li><a href="acceuil.php?client=' . $ab . '">Acceuil</a></li>
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






   
        <div class="head" style="background:url(images/header-bg-3.png) no-repeat">
            <h1>Reserver Maintenant!</h1>
         </div>
<?php 
         if(isset($_GET['error10'])){
            $error6=$_GET['error10']; 
            echo' <h2 class="error">'.$error6.'</h2>';
         }
         else{
            if(isset($_GET['error11'])){
                $error6=$_GET['error11']; 
                echo' <h2 class="choisir">'.$error6.'</h2>';
             }
             else{
         ?>
          
        <?php if (isset($_GET['error6'])){
            $error6=$_GET['error6']; 
       echo' <h4 class="error">'.$error6.'</h4>';
        } ?>

<?php if(isset($_GET['idres'])) { echo 
   '<h2 class="choisir" >Votre Réservation est demandé veuillez attendez la confirmation des admins</h2>';} ?>
<?php if(isset($_GET['idrese']))  { echo '
    <h2 class="choisir" >Votre Réservation est déjà faite voulez-vous consulter cette réservation <a href="pdf.php?idres='.$_GET['idrese'].'"> Consulter</a></h2>';}?>



<?php 
$client=$_SESSION['id_cl'];
$verifier = $db->prepare("SELECT * from reservation where client=?");
    $verifier->execute(array($client));
    $recup = $verifier->rowCount();
   if ($recup == 0){
?>

        <?php if (isset($_GET['personne'])){ ?>
        <h4 class="choisir">veuillez saisir les informations des autres voyageurs</h4>
        <?php }?>
         <div class="diviser">
  <div class="box-container">
    <div class="box">
        <img src="images/<?= $row['photo']; ?>" alt="">
        <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i> <?= $row['destination_ofr']; ?> </h3>
            <p><?= $row['description_ofr']; ?></p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <div class="price"> Prix:<?= $row['prix_ofr']; ?>  DA</div>
        </div>
    </div>
<div >
    </div>
    </div>
   <div> 
       <div class="reserver"> 
           <form  
 <?php  echo 'action="reservation.php?idoffre='.$y.'"'; ?>
 method="post" class="book-form">
        <h1>Détails de Réservation</h1>
        <div class="flex">
           <div class="inputBox">
              <span>Destination:</span>
              <input type="text" value="<?php echo $destination ?>" name="destination" disabled="disabled">
           </div>
           <div class="inputBox">
             <span>Date_de_début:</span>
             <input type="date"  value="<?php echo $datedebut ?>" disabled="disabled">
          </div>
           <div class="inputBox">
              <span>date_de_fin:</span>
              <input type="date"   value="<?php echo $datefin ?>" disabled="disabled">
           </div>
           <div class="inputBox">
               <?php if(isset($_GET['personne'])){?>
              <span>Nombre_de_personne:</span>
              <input type="text" value="<?php echo $_GET['personne']?>" name="personne" disabled="disabled">

          <?php } else{?> 
            <input type="number" placeholder="nombre de personne" name="personne" required>
          <?php } ?>
            </div>
            <?php if(!isset($_GET['personne'])){?>
           <input type="submit" value="Envoyer" class="btn" name="submit">
           <?php } ?>
        </form>
        </div>
        </div>
</div>
</div>
<?php if (isset($_GET['personne'])){ ?>
        <h4 class="choisir">Les formulaires des voyageurs</h4>
        <?php }?>
<?php if(isset($_GET['personne']) && isset($_GET['vol'])){ ?>
    <?php 
$personne=$_GET['personne'];
$vols=$_GET['vol']; ?>
    <div class="book">  
 <?php echo'<form action="confirmer2.php?idoffre='.$y.'&personne='.$_GET['personne'].'&vol='.$vols.'&personne='.$personne.'" method="POST"class="book-form" ?>'; ?>
  <?php for ($i=2;$i<=$_GET['personne'];$i++){?>
 <div class=" flex"> 
<h2 class="choisir">Voyageur Numéro <?php echo $i ?></h2>
             <div class="inputBox">
              <span>Nom:</span>
              <input type="text"  name="nomv<?php echo $i ?>" required>
             </div>
              <div class="inputBox">
             <span>Prénom:</span>
             <input type="text" name="prenomv<?php echo $i ?>"required>
          </div>
           <div class="inputBox">
              <span>date_de_naissance:</span>
              <input type="date" name="daten<?php echo $i ?>"required>
           </div>
           <div class="inputBox">
              <span>passeport:</span>
              <input type="number" name="numv<?php echo $i ?>"required>
           </div>
          <div class="inputBox">
             <span>sexe :</span>
            <select class="select" name="sexe<?php echo $i ?>">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>
</div>
<?php }?>
<?php if (isset($_GET['personne'])){ ?>
 <?php echo' <input href=vols.php?personne='.$personne.'&idoffre='.$y.'"class="valider" type="submit" value="envoyer" name="envoyer">'; ?>
  <?php } ?>
    </form>
    </div>
  <?php } ?>

<?php }else{
    if(!isset($_GET['error4'])){
$res=$verifier->fetch();
$id=$res['offre'];
$idres=$res['id_res'];
$nb=$res['nbr_prsn'];
$verifier2 = $db->prepare("SELECT * from offre where id_ofr=$id");
    $verifier2->execute();
    $row=$verifier2->fetch();
    $destination = $row['destination_ofr'];
$datedebut = $row['date_debut'];
$datefin = $row['date_fin'];
echo'
<h2 class="choisir">Vous avez déjà une réservation <a href="pdf.php?idres='.$idres.'">Consulter </a><a href="demande.php?idres='.$idres.'">     Annuler</a></h2>';
?>
<div class="diviser">
<div class="box-container">
  <div class="box">
      <img src="images/<?= $row['photo']; ?>" alt="">
      <div class="content">
          <h3> <i class="fas fa-map-marker-alt"></i> <?= $row['destination_ofr']; ?> </h3>
          <p><?= $row['description_ofr']; ?></p>
          <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
          </div>
          <div class="price"> Prix:<?= $row['prix_ofr']; ?>  DA</div>
      </div>
  </div>
<div >
  </div>
  </div>
 <div> 
     <div class="reserver"> 
         <form  
<?php  echo 'action="reservation.php?idoffre='.$y.'"'; ?>
method="post" class="book-form">
      <h1>Détails de Réservation</h1>
      <div class="flex">
         <div class="inputBox">
            <span>Destination:</span>
            <input type="text" value="<?php echo $destination ?>" name="destination" disabled="disabled">
         </div>
         <div class="inputBox">
           <span>Date_de_début:</span>
           <input type="date"  value="<?php echo $datedebut ?>" disabled="disabled">
        </div>
         <div class="inputBox">
            <span>date_de_fin:</span>
            <input type="date"   value="<?php echo $datefin ?>" disabled="disabled">
         </div>
         <div class="inputBox">
       
            <span>Nombre_de_personne:</span>
            <input type="text" value="<?php echo $nb?>" name="personne" disabled="disabled">

       
          </div>
        
      </form>
      </div>
      </div>
</div>
</div>


<?php } }?>
<div class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Pays </h3>
            <a href="#">Tunise</a>
            <a href="#">USA</a>
            <a href="#">Indonésie</a>
            <a href="#">france</a>
        </div>
        <div class="box">
            <h3>Liens</h3>
            <a href="#">Acceuil</a>
            <a href="#">Destinations</a>
            <a href="#">Services</a>
            <a href="#">A Propos</a>
         
        </div>
        <div class="box">
            <h3>Abonnez Nous</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">twitter</a>
        </div>
    </div>
    <h1 class="credit"> created by <span> L3 systéme d'information </span> | all rights reserved! </h1>
</div>
<?php }} ?>
</body>
</html>

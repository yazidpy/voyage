<?php
session_start();
include "configuration.php";
if(!isset($_SESSION['id_adm'])){
    header("location:acceuil.php");
}
else{



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?jjyu">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/espace.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <title>Espace admin</title>
</head>

<body>
    <?php if (isset($_GET['succes'])) {
    ?>
        <p class="succes">
            <?php echo $_GET['succes']; ?>
        </p>
    <?php } ?>
    <?php if (isset($_GET['error'])) {
    ?>
        <p class="error">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
    <div class="nav">
        <div class="container flex">

            <a href="" class="logo">Espace<span>Administrateur </span></a>

            <div class="connexion">
                <a href="deconnexion.php" class="btn-cnx">se déconnecter</a>
            </div>
        </div>
    </div>
    <div class="picture">
        <img src="./images/adm.jpg">
    </div>
    <div class="contain">
        <section class="container">
            <h1 class="heading top">
                <span>A</span>
                <span>D</span>
                <span>M</span>
                <span>I</span>
                <span>N</span>
            </h1>
            <section class="container ">
                <div class="container my-5">
                 <button class="btn btn-dark">Gérer les comptes des cients</button>
                <button class="btn btn-dark">Gérer les offres</button>
                <button class="btn btn-dark">Gérer les demandes des clients </button>
                <a href="./messages.php" class="btn btn-dark">Messages </a>
                </div>
                <div class="container">
                    <table class="table">
                        <legend>Gérer les clients</legend>
                        <thead>
                            <tr>
                                <th class="col"> id </th>
                                <th class="col"> Nom </th>
                                <th class="col"> Prénom </th>
                                <th class="col"> email </th>
                                <th class="col"> Sexe </th>
                                <th class="col"> Téléphone </th>
                                <th class="col"> adresse </th>
                                <th class="col"> passeport </th>
                                <th class="col"> Etat </th>
                                <th class="col">opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * from client";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $nom = $row['nom_cl'];
                                    $prenom = $row['prenom_cl'];
                                    $email = $row['email_cl'];
                                    $sexe = $row['sexe'];
                                    $tel = $row['n_tele'];
                                    $adresse = $row['adresse'];
                                    $pass = $row['passeport'];
                                    $etat = $row['état'];
                                    echo '<tr>
                                        <th scope="row">' . $id . '</th>
                                        <td>' . $nom . '</td>
                                        <td>' . $prenom . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $sexe . '</td>
                                        <td>' . $tel . '</td>
                                        <td>' . $adresse . '</td>
                                        <td>' . $pass . '</td>
                                        <td>' . $etat . '</td>
                                        <td>
                                        <a class="text-light" href=http://localhost/final/gerer_client/supprimer.php?deleteid=' . $id . '><button class="btn btn-danger">Supprimer</button></a>';
                                    if ($etat == "pas_validé") {
                                        echo '<a class="confirmer btn btn-primary" href=http://localhost/final/gerer_client/confirmer.php?etat=' . $id . '">Confirmer</a>
                                            </td> </tr>';
                                    } else {
                                        echo '<p class ="confirmer btn btn-primary ">Confirmé</p>
                                            </td></tr>';
                                    }
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>


<?php 
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
 $verifier = $db->prepare("SELECT * from admin where type='principale'");
 $verifier->execute();
 $recuperation = $verifier->rowCount();
 if($recuperation==1){
     $admins=$verifier->fetch();
     $principale=$admins['id_adm'];
     ?> 
                <div class="container my-5">
                    <table class="table" id="tbl2">
                        <legend>Gérer les Administrateurs</legend>
                        <thead>
                            <tr>
                                <th class="col"> Numéro </th>
                                <th class="col"> Nom </th>
                                 <th class="col"> Prénom</th>
                                <th class="col"> email </th>
                                <th class="col"> Opértations </th>
                            
                            </tr>
                        </thead>
                        <tbody>
            
                            <?php
                            
                            $sql15 = "SELECT * from admin where id_adm!=$principale";
                            $result15 = mysqli_query($conn, $sql15);
                            if ($result15) {
                                while ($row15 = mysqli_fetch_assoc($result15)) {
                                    $admin = $row15['id_adm'];
                                    $nadmin = $row15['nom_adm'];
                                    $padmin = $row15['prenom_adm'];
                                    $emailad = $row15['login'];    

                                    echo '<tr>
                                        <th scope="row">' . $admin . '</th>
                                        <td>' . $nadmin . '</td>
                                        <td>' . $padmin . '</td>
                                        <td>' . $emailad . '</td>
                                        
                                    
                                        <td>
                                        <a class="text-light" href="ajouter_admin.php?del=' . $admin . '"><button class="btn btn-danger">Supprimer</button></a>
                                        </td>
                                    </tr>';
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="ajouter_admin">Ajouter</button>
             <?php }else{      
                 ?>
                 <div class="container my-5">
                    <table class="table" id="tbl2">
                        <legend>Géstion des Administrateurs(Seulement l'admin principale qui peut Gérer) </legend>
                    </table>
                 </div>
<?php } ?>
                <div class="container my-5">
                    <table class="table" id="tbl2">
                        <legend>Gérer les offres</legend>
                        <thead>
                            <tr>
                                <th class="col"> id_offre </th>
                                <th class="col"> Nom_offre </th>
                                <th class="col"> Destination </th>
                                <th class="col"> Prix </th>
                                <th class="col"> Lien Photo </th>
                                <th class="col"> Date début </th>
                                <th class="col"> Date fin </th>
                                <th class="col"> Description </th>
                                <th class="col"> place_restant </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * from offre";
                            $result2 = mysqli_query($conn, $sql2);
                            if ($result2) {
                                while ($row3 = mysqli_fetch_assoc($result2)) {
                                    $id_ofr = $row3['id_ofr'];
                                    $nom_ofr = $row3['nom_ofr'];
                                    $dest_ofr = $row3['destination_ofr'];
                                    $prix_ofr = $row3['prix_ofr'];
                                    $photo_ofr = $row3['photo'];
                                    $datedebut = $row3['date_debut'];
                                    $datefin = $row3['date_fin'];
                                    $description_ofr = $row3['description_ofr'];
                                    $place_ofr=$row3['place_res'];
                                    echo '<tr>
                                        <th scope="row">' . $id_ofr . '</th>
                                        <td>' . $nom_ofr . '</td>
                                        <td>' . $dest_ofr . '</td>
                                        <td>' . $prix_ofr . '</td>
                                        <td>' . $photo_ofr . '</td>
                                        <td>' . $datedebut . '</td>
                                        <td>' . $datefin . '</td>
                                        <td>' . $description_ofr . '</td>
                                        <td>' . $place_ofr . '</td>
                                        <td>
                                        <a class="text-light" href="./gerer_offre/modifier_ofr.php?updateid=' . $id_ofr . '"><button class="btn btn-primary">Modifier</button></a>
                                        </td>
                                        <td>
                                        <a class="text-light" href="./gerer_offre/supprimer_ofr.php?deleteid=' . $id_ofr . '"><button class="btn btn-danger">Supprimer</button></a>
                                        </td>
                                    </tr>';
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="ajout">Ajouter</button>
                <div class="container my-5">
        <div class="container">
                    <table class="table" id="tbl2">
                        <legend>Gérer les demandes des clients(confirmer ou Annuler Réservation)</legend>
                        <thead>
                            <tr>
                                <th class="col"> Numéro Réservation </th>
                                <th class="col"> Référence Client </th>
                                <th class="col"> Référence vol </th>
                                <th class="col"> Numéro de l'offre  </th>
                                <th class="col"> Nombre De personne</th>
                                <th class="col"> Date de Réservation</th>
                                <th class="col"> Etat </th>
                                <th class="col"> Demande </th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql4 = "SELECT * from reservation";
                            $result4 = mysqli_query($conn, $sql4);
                            if ($result4) {
                                while ($row6 = mysqli_fetch_assoc($result4)) {
                                    $res = $row6['id_res'];
                                    $client = $row6['client'];
                                    $offre = $row6['offre'];
                                    $vol = $row6['vol'];
                                    $nb = $row6['nbr_prsn'];
                                    $date = $row6['date_reservation'];
                                    $eta = $row6['confirmation'];
                                    $demande = $row6['type_demande'];
                                       
                                    echo '<tr>
                                        <th scope="row">' . $res . '</th>
                                        <td>' . $client . '</td>
                                        <td>' . $vol . '</td>
                                        <td>' . $offre . '</td>
                                        <td>' . $nb . '</td>
                                        <td>' . $date . '</td>
                                        <td>' . $eta . '</td>
                                        <td>' . $demande . '</td>
                                        <td>
                                        <a class="text-light" href="annuler.php?idres=' . $res . '"><button class="btn btn-primary">Supprimer</button></a>
                                        </td>' ;
                                        if ($eta == "pas_confirmé") {
                                            
                                        echo '<td><a class="confirmer btn btn-primary" href="confirmer_res.php?etat=' . $res . '">Confirmer</a>
                                               ';
                                        } else {

                                            echo ' <td>
                                            <p class  ="">Confirmé</p>
                                            </td>
                                               ';
                                        }
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="container my-5">
                    <table class="table">
                        <legend>Gérer les vols</legend>
                        <thead>
                            <tr>
                                <th class="col">id offre</th>
                                <th class="col">id vol</th>
                                <th class="col">aeroport départ</th>
                                <th class="col">aeroport arrivé</th>
                                <th class="col">date départ</th>
                                <th class="col">date retour</th>
                                <th class="col">nombre de places</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql3 = "SELECT * from vol";
                            $result3 = mysqli_query($conn, $sql3);
                            if ($result3) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $id_ofr = $row3['id_offre'];
                                    $idvol = $row3['id_vol'];
                                    $adep = $row3['aeroport_dep'];
                                    $aariv = $row3['aeroport_arv'];
                                    $datedep = $row3['date_dep'];
                                    $dateret = $row3['date_ret'];
                                    $nbrplaces = $row3['nb_place'];
                                    echo '<tr>
                                        <th scope="row">' . $id_ofr . '</th>
                                        <td>' . $idvol . '</td>
                                        <td>' . $adep . '</td>
                                        <td>' . $aariv . '</td>
                                    
                                        <td>' . $datedep . '</td>
                                        <td>' . $dateret . '</td>
                                        <td>' . $nbrplaces . '</td>
                                        <td>
                                        <a class="text-light" href="./gerer_vol/modifier_vol.php?updateid=' . $idvol . '"><button class="btn btn-primary">Modifier</button></a>
                                        </td>
                                        <td>
                                        <a class="text-light" href="./gerer_vol/supprimer_vol.php?deleteid=' . $idvol . '"><button class="btn btn-danger">Supprimer</button></a>
                                        </td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" id="ajout_vol">Ajouter un vol</button>
                </div>
            </section>
    </div>
    <div id="div_ajout">
        <form action="http://localhost/final/gerer_offre/ajouter.php" method="post" enctype="multipart/form-data">
            <h3>Ajouter offre</h3>
            <input type="text" class="box" placeholder="l'offre" name="titre" required>
            <input type="text" class="box" placeholder="destination" name="destination" required>
            <input type="number" class="box" placeholder="prix" name="prix" required>
            <input type="date" class="" placeholder="date de début" name="date_debut" required>
            <input type="date" class="" placeholder="date de fin" name="date_fin" required>
            <input type="text" class="box" placeholder="description" name="description" required>
            <input type="file" class="box" name="picture" required >
            <input type="number" class="box" placeholder="nombre de place" name="place" required >
            <input type="submit" value="ajouter" class="btn1" id="btn1" name="submit">
        </form>
    </div>
    <div id="div_vol">
        <form action="http://localhost/final/gerer_vol/ajouter_vol.php" method="post">
            <h3>Ajouter un vol</h3>
        
            <select autocomplete="off" type="text" class="box" name="idofr">
                <option hidden selected disabled value> --Veuillez selectionner une offre-- </option>
                <?php
                $selection = "SELECT * from offre ";
                $execution = mysqli_query($conn, $selection);

                while ($fetch = mysqli_fetch_assoc($execution)) {
                    echo '<option value=' . $fetch['id_ofr'] . '>' . $fetch['id_ofr'] . ' (' . $fetch['destination_ofr'] . ')' . '</option>';
                }

                ?>
            </select>
            <input type="text" class="box" placeholder="aeroport de départ" name="adep" autocomplete="off" required>
            <input type="text" class="box" placeholder="aeroport d'arrivé" name="aariv" autocomplete="off" required>
            <input type="date" class="box" placeholder="date de départ" name="datedep" autocomplete="off" required>
            <input type="time" class="box" placeholder="heure de départ" name="heuredep" autocomplete="off" required>
            <input type="date" class="box" placeholder="date de retour" name="dateret" autocomplete="off" required>
            <input type="time" class="box" placeholder="heure de retour" name="heureret" autocomplete="off" required>
            <input type="number" class="box" placeholder="nombre de places" name="nbrplaces" autocomplete="off" required>
            <input type="submit" value="ajouter" class="btn1" id="btn1" name="submit" autocomplete="off">
        </form>
    </div>

<div id="admin_ajouter">
<form action="ajouter_admin.php" method="post">
<h3>AJouter Un admin </h3>
<input type="text" class="box" placeholder="inserer Son Nom" name="nom" autocomplete="off" required>
            <input type="text" class="box" placeholder=" inserer son Prénom" name="prenom" autocomplete="off" required>
            <input type="email" class="box" placeholder="inserer son email" name="email" autocomplete="off" required>
            <input type="password" class="box" placeholder="saisir un mot de passe" name="password" autocomplete="off" required>
            <input type="submit" value="Ajouter" class="btn1" id="btn2" name="submit" autocomplete="off">
</form>
</div>

</body>
<script>
    let ajout = document.getElementById("ajout");
    ajout.addEventListener("click", function() {
        let form = document.getElementById("div_ajout")
        form.style.display = "flex";
        let tout = document.querySelector(".contain");
        tout.style.filter = "blur(2px)"

        window.onscroll = () =>{
                 form.style.display="none";
                 tout.style.filter="none";
                
             }

    });
    let ajout_vol = document.getElementById("ajout_vol");
    ajout_vol.addEventListener("click", function() {
        let form_vol = document.getElementById("div_vol");
        form_vol.style.display = "flex";
        let tout = document.querySelector(".contain");
        tout.style.filter = "blur(2px)";

        window.onscroll = () =>{
                 form_vol.style.display="none";
                 tout.style.filter="none";
        }


    });
    let ajout_admin=document.getElementById("ajouter_admin");
    ajout_admin.addEventListener("click",function(){
let form_admin=document.getElementById("admin_ajouter");
form_admin.style.display="flex";
let tout = document.querySelector(".contain");
tout.style.filter = "blur(2px)";
window.onscroll = () =>{
                 form_admin.style.display="none";
                 tout.style.filter="none";
        }


    });
</script>
</html>
<?php
} ?>
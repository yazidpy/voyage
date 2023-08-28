<?php
include "configuration.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/inscription.css">
    <link rel="stylesheet" href="./css/espace.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <title>Espace admin</title>
</head>

<body>
    <div class="navigation">
        <div class="container flex">

            <a href="" class="logo">Espace<span>Administrateur </span></a>

            <div class="connexion">
                <a href="./acceuil.php" class="btn-cnx">se déconnecter</a>
            </div>
        </div>
    </div>
    <div class="contain">
        <section class="body">
            <div class="navigation-buttons">
                <a id="but_clients" class="active">Gérer les comptes des clients</a>
                <a id="but_offres" class="">Gérer les offres</a>
                <a id="but_vols" class="">Gérer les vols </a>
                <a id="but_messages" class="">Messages </a>
            </div>
            <div id="clients" class="clients">
                <table class="table tableclients">
                    <legend>Gérer les clients</legend>
                    <thead>
                        <tr>
                            <th class="col"> id </th>
                            <th class="col"> Nom </th>
                            <th class="col"> Prénom </th>
                            <th class="col"> Sexe </th>
                            <th class="col"> email </th>
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
                        $frow = mysqli_num_rows($result);
                        if (!$frow) {
                            echo "<tr><td colspan='10' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucun client</td></tr>";
                        }
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                                $id = $row['id'];
                                $nom = $row['nom_cl'];
                                $prenom = $row['prenom_cl'];
                                $sexe = $row['sexe'];
                                $email = $row['email_cl'];
                                $tel = $row['n_tele'];
                                $adresse = $row['adresse'];
                                $pass = $row['passeport'];
                                $etat = $row['état'];
                                echo '<tr id="' . $id . '">
                                        <th data-target="id" scope="row">' . $id . '</th>
                                        <td data-target="nom">' . $nom . '</td>
                                        <td data-target="prenom">' . $prenom . '</td>
                                        <td data-target="sexe">' . $sexe . '</td>
                                        <td data-target="email">' . $email . '</td>
                                        <td data-target="tel">' . $tel . '</td>
                                        <td data-target="adresse">' . $adresse . '</td>
                                        <td data-target="pass">' . $pass . '</td>
                                        <td data-target="etat">' . $etat . '</td>
                                        <td>
                                        <a data-role="supprimer" data-id="' . $id . '" class="text-light"><button class="btn btn-danger">Supprimer</button></a>';
                                if ($etat == "pas_validé") {
                                    echo ' <a data-role="confirmer" data-id="' . $id . '" class="btn btn-primary">confirmer</a>
                                            </td> </tr>';
                                } else {
                                    echo '<p class ="confirmer btn btn-primary">Confirmé</p>
                                            </td></tr>';
                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>
                <div id="message"></div>
            </div>


            <div id="offres" class="offres">
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
                            <th class="col"> Operations </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * from offre";
                        $result2 = mysqli_query($conn, $sql2);
                        $frow2 = mysqli_num_rows($result2);
                        if (!$frow2) {
                            echo "<tr><td colspan='9' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucune offre</td></tr>";
                        }
                        if ($result2) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $id_ofr = $row2['id_ofr'];
                                $nom_ofr = $row2['nom_ofr'];
                                $dest_ofr = $row2['destination_ofr'];
                                $prix_ofr = $row2['prix_ofr'];
                                $photo_ofr = $row2['photo'];
                                $datedebut = $row2['date_debut'];
                                $datefin = $row2['date_fin'];
                                $description_ofr = $row2['description_ofr'];
                                echo '<tr id=' . $id_ofr . '>
                                        <th scope="row">' . $id_ofr . '</th>
                                        <td data-target="nomofr">' . $nom_ofr . '</td>
                                        <td data-target="destofr">' . $dest_ofr . '</td>
                                        <td data-target="prixofr">' . $prix_ofr . '</td>
                                        <td data-target="photoofr">' . $photo_ofr . '</td>
                                        <td data-target="datedebut">' . $datedebut . '</td>
                                        <td data-target="datefin">' . $datefin . '</td>
                                        <td data-target="descriptionofr">' . $description_ofr . '</td>
                                        <td>
                                        <a class="text-light modifier" data-role="modifier_offre" data-id=' . $id_ofr . '><button class="btn btn-primary">Modifier</button></a>
                                        </td>
                                        <td>
                                        <a class="text-light" data-role="supprimer_offre" data-id=' . $id_ofr . '><button class="btn btn-danger">Supprimer</button></a>
                                        </td>
                                    </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" id="ajout">Ajouter une offre</button>
                <div class="message"></div>
            </div>
            <div id="vols" class="vols">
                <table class="table" id="tvol">
                    <legend>Gérer les vols</legend>
                    <thead>
                        <tr>
                            <th class="col">id vol</th>
                            <th class="col">id offre</th>
                            <th class="col">aeroport départ</th>
                            <th class="col">aeroport arrivé</th>
                            <th class="col">date départ</th>
                            <th class="col">heure départ</th>
                            <th class="col">date retour</th>
                            <th class="col">heure de retour</th>
                            <th class="col">nombre de places</th>
                            <th class="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql3 = "SELECT * from vol";
                        $result3 = mysqli_query($conn, $sql3);
                        $frow3 = mysqli_num_rows($result3);
                        if (!$frow3) {
                            echo "<tr><td colspan='11' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucun vol</td></tr>";
                        }
                        if ($result3) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                $id_ofr = $row3['id_offre'];
                                $idvol = $row3['id_vol'];
                                $adep = $row3['aeroport_dep'];
                                $aariv = $row3['aeroport_arv'];
                                $datedep = $row3['date_dep'];
                                $dateret = $row3['date_ret'];
                                $nbrplaces = $row3['nb_place'];
                                $hdepart = $row3['heure_dep'];
                                $hretour = $row3['heure_ret'];
                                echo '<tr id=' . $idvol . '>
                                        <th data-target="idvol" scope="row">' . $idvol . '</th>
                                        <td>' . $id_ofr . '</td>
                                        <td data-target="adep">' . $adep . '</td>
                                        <td data-target="aariv">' . $aariv . '</td>
                                        <td data-target="datedep">' . $datedep . '</td>
                                        <td data-target="hdep">' . $hdepart . '</td>
                                        <td data-target="dateret">' . $dateret . '</td>
                                        <td data-target="hret">' . $hretour . '</td>
                                        <td data-target="nbrplaces">' . $nbrplaces . '</td>
                                        <td>
                                        <a class="text-light modifier_vol" data-role="modifiervol" data-id="' . $idvol . '"><button class="btn btn-primary">Modifier</button></a>
                                        </td>
                                        <td>
                                        <a class="text-light" data-role="supprimer_vol" data-id=' . $idvol . '><button class="btn btn-danger">Supprimer</button></a>
                                        </td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" id="ajout_vol">Ajouter un vol</button>
            </div>
            <div id="messages" class="messages">
                <table class="table">
                    <legend>Messages</legend>
                    <thead>
                        <tr>
                            <th class="col">ID Message</th>
                            <th class="col">nom</th>
                            <th class="col">prenom</th>
                            <th class="col">email</th>
                            <th class="col">num</th>
                            <th class="col">message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql4 = "SELECT * from messages";
                        $result4 = mysqli_query($conn, $sql4);
                        $frow4 = mysqli_num_rows($result4);
                        if (!$frow4) {
                            echo "<tr><td colspan='6' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucun message</td></tr>";
                        }
                        if ($result4) {
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                $idmes = $row4['id_mes'];
                                $nom = $row4['nom'];
                                $prenom = $row4['prenom'];
                                $email = $row4['email'];
                                $num = $row4['num'];
                                $message = $row4['message'];
                                echo '<tr>
                            <th scope="row">' . $idmes . '</th>
                            <td>' . $nom . '</td>
                            <td>' . $prenom . '</td>
                            <td>' . $email . '</td>
                            <td>' . $num . '</td>
                            <td>' . $message . '</td>
                            <td>
                            <a class="text-light" href="./supmes.php?idmes=' . $idmes . '"><button class="btn btn-primary">Supprimer</button></a>
                            </td
                        </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div id="div_ajout">
        <form id="ajouter_offre" action="http://localhost/agence/gerer_offre/ajouter.php" method="post" enctype="multipart/form-data">
            <p class="exit">x</p>
            <h3>Ajouter offre</h3>
            <input autocomplete="off" type="text" class="box" placeholder="l'offre" id="titre" name="titre">
            <input autocomplete="off" type="text" class="box" placeholder="destination" id="destination" name="destination">
            <input autocomplete="off" type="number" class="box" placeholder="prix" id="prix" name="prix">
            <input autocomplete="off" type="date" class="" placeholder="date de début" id="date_debut" name="date_debut">
            <input autocomplete="off" type="date" class="" placeholder="date de fin" id="date_fin" name="date_fin">
            <input autocomplete="off" type="text" class="box" placeholder="description" id="description" name="description">
            <input autocomplete="off" type="file" class="box" id="picture" name="picture">
            <input autocomplete="off" type="submit" value="ajouter" class="btn1" id="btn1" name="submit">
            <div id="error1"></div>
        </form>
    </div>

    <div id="div_modification">
        <form id="modifier_ofr" action="./gerer_offre/modifier_ofr.php" method="post" enctype="multipart/form-data">
            <p class="exit">x</p>
            <h3>Modifier l'offre</h3>
            <input autocomplete="off" type="text" class="box" placeholder="l'offre" id="titremod" name="titre">
            <input autocomplete="off" type="text" class="box" placeholder="destination" id="destinationmod" name="destination">
            <input autocomplete="off" type="number" class="box" placeholder="prix" id="prixmod" name="prix">
            <input autocomplete="off" type="date" class="" placeholder="date de début" id="date_debutmod" name="date_debut">
            <input autocomplete="off" type="date" class="" placeholder="date de fin" id="date_finmod" name="date_fin">
            <input autocomplete="off" type="text" class="box" placeholder="description" id="descriptionmod" name="description">
            <input autocomplete="off" type="file" class="box" id="picturemod" name="picture">
            <input type="hidden" id="idutilisateur">
            <input autocomplete="off" type="submit" value="Modifier" class="btn1" id="btn1" name="submit_modifier">
            <div id="error1"></div>
        </form>
    </div>

    <div id="div_vol">
        <form id="ajouter_vol" action="http://localhost/agence/gerer_vol/ajouter_vol.php" method="post">
            <p class="exit">x</p>
            <h3>Ajouter un vol</h3>
            <select autocomplete="off" type="text" class="box" id="idofr" name="idofr">
                <option selected disabled value> --Veuillez selectionner une offre-- </option>
                <?php
                $selection = "SELECT * from offre ";
                $execution = mysqli_query($conn, $selection);
                if ($fetch = mysqli_fetch_lengths($execution) <= 0) {
                    echo '';
                }
                while ($fetch = mysqli_fetch_array($execution)) {
                    echo '<option value=' . $fetch['id_ofr'] . '>' . $fetch['id_ofr'] . ' (' . $fetch['destination_ofr'] . ')' . '</option>';
                }

                ?>
            </select>
            <input type="text" class="box" placeholder="aeroport de départ" id="adep" name="adep" autocomplete="off">
            <input type="text" class="box" placeholder="aeroport d'arrivé" id="aariv" name="aariv" autocomplete="off">
            <input type="date" class="box" placeholder="date de départ" id="datedep" name="datedep" autocomplete="off">
            <input type="date" class="box" placeholder="date de retour" id="dateret" name="dateret" autocomplete="off">
            <input type="time" class="box" placeholder="heure de départ" id="hdepart" name="hdepart" autocomplete="off">
            <input type="time" class="box" placeholder="heure de retour" id="hretour" name="hretour" autocomplete="off">
            <input type="number" class="box" placeholder="nombre de places" id="nbrplaces" name="nbrplaces" autocomplete="off">
            <input type="submit" value="ajouter" class="btn1" id="btn1" name="submit" autocomplete="off">
            <div id="error2"></div>
        </form>
    </div>

    <div id="div_modification_vol">
        <form id="modifier_le_vol" action="" method="post">
            <p class="exit">x</p>
            <h3>Modifier le vol</h3>
            <input type="hidden" class="box"  id="idvol" name="idvol" autocomplete="off">
            <input type="text" class="box" placeholder="aeroport de départ" id="adepart" name="adep" autocomplete="off">
            <input type="text" class="box" placeholder="aeroport d'arrivé" id="aarivee" name="aariv" autocomplete="off">
            <input type="date" class="box" placeholder="date de départ" id="datedepv" name="datedep" autocomplete="off">
            <input type="time" class="box"  id="hdep" name="hdep" autocomplete="off">
            <input type="date" class="box" placeholder="date de retour" id="dateretv" name="dateret" autocomplete="off">
            <input type="time" class="box"  id="hret" name="hret" autocomplete="off">
            <input type="number" class="box" placeholder="nombre de places" id="nbrplacesv" name="nbrplaces" autocomplete="off">
            <input type="submit" value="Modifier" class="btn1" id="btn1" name="submit" autocomplete="off">
            <div id="error2"></div>
        </form>
    </div>

</body>
<script>
    let tout = document.querySelector(".contain");
    let ajout = document.getElementById("ajout");
    let form = document.getElementById("div_ajout");
    let form_vol = document.getElementById("div_vol");
    let form_modifier_ofr = document.getElementById("div_modification");
    let form_modifier_vol = document.getElementById("div_modification_vol");
    let confirm_ajout = document.getElementById("confirm_ajout");
    var compteur = 0;
    var compteurv = 0;
    ajout.addEventListener("click", function() {
        form.style.display = "flex";
        tout.style.filter = "blur(2px)";
    });

    let ajout_vol = document.getElementById("ajout_vol");
    ajout_vol.addEventListener("click", function() {
        form_vol.style.display = "flex";
        tout.style.filter = "blur(2px)";
    })

    const modifier_ofr = document.querySelectorAll(".modifier");
    modifier_ofr.forEach(modif => {
        modif.addEventListener("click", function() {
            form_modifier_ofr.style.display = "flex";
            tout.style.filter = "blur(2px)";
        })
    })

    const modifier_vol = document.querySelectorAll(".modifier_vol");
    modifier_vol.forEach(vol => {
        vol.addEventListener("click", function() {
            form_modifier_vol.style.display = "flex";
            tout.style.filter = "blur(2px)";
        })
    })


    let form_clients = document.getElementById("clients");
    let form_offres = document.getElementById("offres");
    let form_gestion_vol = document.getElementById("vols");
    let form_messages = document.getElementById("messages");
    document.addEventListener("click", function(e) {
        if (e.target.className == "exit") {
            e.target.parentNode.parentNode.style.display = "none";
            tout.style.filter = "none";
        }
        if (e.target.id == "but_clients") {
            form_clients.style.display = "block";
            form_gestion_vol.style.display = "none";
            form_offres.style.display = "none";
            form_messages.style.display = "none";
            document.getElementById("but_vols").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_clients").style.backgroundColor = "#05d3e2";
            document.getElementById("but_offres").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_messages").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
        } else if (e.target.id == "but_offres") {
            form_clients.style.display = "none";
            form_gestion_vol.style.display = "none";
            form_offres.style.display = "block";
            form_messages.style.display = "none";
            document.getElementById("but_vols").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_clients").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_offres").style.backgroundColor = "#05d3e2";
            document.getElementById("but_messages").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
        } else if (e.target.id == "but_vols") {
            form_clients.style.display = "none";
            form_gestion_vol.style.display = "block";
            form_offres.style.display = "none";
            form_messages.style.display = "none";
            document.getElementById("but_vols").style.backgroundColor = "#05d3e2";
            document.getElementById("but_clients").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_offres").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_messages").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
        } else if (e.target.id == "but_messages") {
            form_clients.style.display = "none";
            form_gestion_vol.style.display = "none";
            form_offres.style.display = "none";
            form_messages.style.display = "block";
            document.getElementById("but_vols").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_clients").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_offres").style.backgroundColor = "rgba(0, 0, 0, 0.815)";
            document.getElementById("but_messages").style.backgroundColor = "#05d3e2";
        }
    })

    $(document).ready(function() {
        $("#ajouter_offre").submit(function(e) {
            e.preventDefault();
            var titre = $("#titre").val();
            var destination = $("#destination").val();
            var prix = $("#prix").val();
            var date_debut = $("#date_debut").val();
            var date_fin = $("#date_fin").val();
            var description = $("#description").val();
            var picture = $("#picture").val();


            $.ajax({
                url: "./gerer_offre/ajouter.php",
                method: "POST",
                data: {
                    ajouter: 1,
                    titrephp: titre,
                    destinationphp: destination,
                    prixphp: prix,
                    date_debutphp: date_debut,
                    date_finphp: date_fin,
                    descriptionphp: description,
                    picturephp: picture
                },
                success: function(response) {
                    if (response.indexOf("réussi") >= 0) {
                        window.location= './espace_admin.php';
                    } else {
                        $("div#error1").html(response);
                    }
                },
                dataType: "text"
            })
        })
        $("#ajouter_vol").submit(function(e) {
            e.preventDefault();
            var idofr = $("#idofr").val();
            var adep = $("#adep").val();
            var aariv = $("#aariv").val();
            var datedep = $("#datedep").val();
            var dateret = $("#dateret").val();
            var nbrplaces = $("#nbrplaces").val();
            var picture = $("#picture").val();
            var hdepart = $("#hdepart").val();
            var hretour = $("#hretour").val();
            $.ajax({
                url: "./gerer_vol/ajouter_vol.php",
                method: "POST",
                data: {
                    ajouter: 1,
                    idofrphp: idofr,
                    adepphp: adep,
                    aarivphp: aariv,
                    datedepphp: datedep,
                    dateretphp: dateret,
                    nbrplacesphp: nbrplaces,
                    picturephp: picture,
                    hdepart: hdepart,
                    hretour: hretour
                },
                success: function(response) {
                    $("div#error2").html(response);
                },
                dataType: "text"
            })
        })
        $(document).on("click", 'a[data-role=confirmer]', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "./gerer_client/confirmer.php",
                method: "POST",
                data: {
                    confirmer: 1,
                    idphp: id
                },
                success: function(response) {
                    alert('Client confirmé avec succés');
                    var etat = $('#' + id).children('td[data-target=etat]').text('validé');
                },
                dataType: "text"
            })
        })
        $(document).on("click", 'a[data-role=supprimer]', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "./gerer_client/supprimer.php",
                method: "POST",
                data: {
                    supprimer: 1,
                    idphp: id
                },
                success: function(response) {
                    alert('Client supprimé avec succés');
                    $('#' + id).hide();
                },
                dataType: "text"
            })
        })
        $(document).on("click", 'a[data-role=modifier_offre]', function() {
            var id = $(this).data('id');
            var nomofr = $('#' + id).children('td[data-target=nomofr]').text();
            var destofr = $('#' + id).children('td[data-target=destofr]').text();
            var prixofr = $('#' + id).children('td[data-target=prixofr]').text();
            var datedebut = $('#' + id).children('td[data-target=datedebut]').text();
            var datefin = $('#' + id).children('td[data-target=datefin]').text();
            var descriptionofr = $('#' + id).children('td[data-target=descriptionofr]').text();

            $('#titremod').val(nomofr);
            $('#destinationmod').val(destofr);
            $('#prixmod').val(prixofr);
            $('#date_debutmod').val(datedebut);
            $('#date_finmod').val(datefin);
            $('#descriptionmod').val(descriptionofr);
            $('#idutilisateur').val(id);
        })

        $("#modifier_ofr").submit(function(e) {
            e.preventDefault();
            var id = $("#idutilisateur").val();
            var nomofr = $("#titremod").val();
            var destofr = $("#destinationmod").val();
            var prixofr = $('#prixmod').val();
            var datedebut = $('#date_debutmod').val();
            var datefin = $('#date_finmod').val();
            var descriptionofr = $('#descriptionmod').val();
            var photo = $('#picturemod').val();

            $.ajax({
                url: './gerer_offre/modifier_ofr.php',
                method: "POST",
                data: {
                    modifier: 1,
                    nomofr: nomofr,
                    destofr: destofr,
                    prixofr: prixofr,
                    datedebut: datedebut,
                    datefin: datefin,
                    descriptionofr: descriptionofr,
                    photo: photo,
                    id: id
                },
                success: function(response) {
                    form_modifier_ofr.style.display = "none";
                    tout.style.filter = "none";
                    $('#' + id).children('td[data-target=nomofr]').text(nomofr);
                    $('#' + id).children('td[data-target=destofr]').text(destofr);
                    $('#' + id).children('td[data-target=prixofr]').text(prixofr);
                    $('#' + id).children('td[data-target=datedebut]').text(datedebut);
                    $('#' + id).children('td[data-target=datefin]').text(datefin);
                    $('#' + id).children('td[data-target=descriptionofr]').text(descriptionofr);
                    $('#' + id).children('td[data-target=photoofr]').text(photo);
                    $("div.message").html("offre modifié avec succés");
                }
            })
        })

        $(document).on("click", 'a[data-role=modifiervol]', function() {
            var id = $(this).data('id');
            var adep = $('#' + id).children('td[data-target=adep]').text();
            var aariv = $('#' + id).children('td[data-target=aariv]').text();
            var hdep = $('#' + id).children('td[data-target=hdep]').text();
            var datedep = $('#' + id).children('td[data-target=datedep]').text();
            var dateret = $('#' + id).children('td[data-target=dateret]').text();
            var hret = $('#' + id).children('td[data-target=hret]').text();
            var nbrplaces = $('#' + id).children('td[data-target=nbrplaces]').text();

            $('#idvol').val(id);
            $('#adepart').val(adep);
            $('#aarivee').val(aariv);
            $('#hdep').val(hdep);
            $('#hret').val(hret);
            $('#datedepv').val(datedep);
            $('#dateretv').val(dateret);
            $('#nbrplacesv').val(nbrplaces);
        })

        $("#modifier_le_vol").submit(function(e) {
            e.preventDefault();
            var id = $("#idvol").val();
            var adepart = $("#adepart").val();
            var aarivee = $("#aarivee").val();
            var hdepv = $('#hdep').val();
            var hretv = $('#hret').val();
            var datedepv = $('#datedepv').val();
            var dateretv = $('#dateretv').val();
            var nbrplacesv = $('#nbrplacesv').val();

            $.ajax({
                url: './gerer_vol/modifier_vol.php',
                method: "POST",
                data: {
                    modifier: 1,
                    adepart: adepart,
                    aarivee: aarivee,
                    hdepv: hdepv,
                    hretv: hretv,
                    datedepv: datedepv,
                    dateretv: dateretv,
                    nbrplacesv: nbrplacesv,
                    id: id
                },
                success: function(response) {
                    form_modifier_vol.style.display = "none";
                    tout.style.filter = "none";
                    $('#' + id).children('td[data-target=adep]').text(adepart);
                    $('#' + id).children('td[data-target=aariv]').text(aarivee);
                    $('#' + id).children('td[data-target=hdep]').text(hdepv);
                    $('#' + id).children('td[data-target=hret]').text(hretv);
                    $('#' + id).children('td[data-target=datedep]').text(datedepv);
                    $('#' + id).children('td[data-target=dateret]').text(dateretv);
                    $('#' + id).children('td[data-target=nbrplaces]').text(nbrplacesv);
                    $("div#messagevol").html("vol modifié avec succés");
                }
            })
        })
        $(document).on("click", 'a[data-role=supprimer_vol]', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "./gerer_vol/supprimer_vol.php",
                method: "POST",
                data: {
                    supprimer: 1,
                    idphp: id
                },
                success: function(response) {
                    compteurv += 1;
                    alert('Vol supprimé avec succés');
                    $('#' + id).hide();
                    <?php
                    $verificationvol = "SELECT * from vol";
                    $executionver = mysqli_query($conn, $verificationvol);
                    $linevol = mysqli_num_rows($executionver);
                    ?>
                    if (<?php echo $linevol ?> == compteurv) {
                        $("#tvol").children("tbody").append("<tr><td colspan='11' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucun vol</td></tr>");
                    }
                },
                dataType: "text"
            })
        })
        $(document).on("click", 'a[data-role=supprimer_offre]', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "./gerer_offre/supprimer_ofr.php",
                method: "POST",
                data: {
                    supprimer: 1,
                    idphp: id
                },
                success: function(response) {
                    compteur += 1;
                    alert(response);
                    $('#' + id).hide();
                    <?php
                    $verification = "SELECT * from offre";
                    $executionver = mysqli_query($conn, $verification);
                    $line = mysqli_num_rows($executionver);
                    ?>
                    if (<?php echo $line ?> == compteur) {
                        $("#tbl2").children("tbody").append("<tr><td colspan='9' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucune offre</td></tr>");
                    }

                },
                dataType: "text"
            })
        })
        $(document).on("click", 'button[data-role=ajout_confirm]', function() {
            <?php
            $get = "SELECT * from offre where id_ofr = (SELECT max(id_ofr) from offre)";
            $getexec = mysqli_query($conn, $get);
            while($line = mysqli_fetch_assoc($getexec)){
            $ido = $line['id_ofr'];
            }
            ?>
            ido = <?php echo $ido; ?>;
             $("#tbl2").children("tbody").append("<tr id='" + ido + "'><th scope='row'>" + ido + "</th><td data-target='nomofr'>" + titre + "</td><td data-target='destoft'>" + destination + "</td><td data-target='prixofr'>" + prix + "</td><td data-target='photoofr'>" + picture + "</td><td data-target='datedebut'>" + date_debut + "</td><td data-target='datefin'>" + date_fin + "</td><td data-target='descriptionofr'>" + description + "</td><td><a class='text-light modifier' data-role='modifier_offre' data-id=" + ido + "><button class='btn btn-primary'>Modifier</button></a></td><td><a class='text-light' data-role='supprimer_offre' data-id=" + ido + "><button class='btn btn-danger'>Supprimer</button></a></td></tr>");
        })
    });
</script>

</html>
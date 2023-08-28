<?php
    include "../configuration.php";
    if(isset($_POST['submit'])){
        $id_offre = $_POST['idofr'];
        $adep = $_POST['adep'];
        $aariv = $_POST['aariv'];
        $datedep = $_POST['datedep'];
        $dateret = $_POST['dateret'];
        $nbr = $_POST['nbrplaces'];
        $heuredep=$_POST['heuredep'];
        $heureret=$_POST['heureret'];
        $sql2 = "SELECT * from offre where id_ofr = $id_offre";
        $execution = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_assoc($execution);
        if($datedep < $row['date_debut'] || $datedep > $row['date_fin'] || $dateret < $row['date_debut'] || $dateret > $row['date_fin'] || $datedep > $dateret){ 
            header('Location:../espace_admin.php?error=La date de depart ou de retour de vol est incorrecte');
            exit();
        }else{
        $sql = "INSERT INTO vol(id_offre,aeroport_dep,aeroport_arv,date_dep,heure_dep,date_ret,heure_ret,nb_place) values('$id_offre','$adep','$aariv','$datedep','$heuredep','$dateret','$heureret','$nbr')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:http://localhost/final/espace_admin.php?succes=un vol est  ajouté ");
        }
    }
    }
?>
<?php 
session_start();
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "agence";
$x = is_uploaded_file($_FILES["picture"] ["tmp_name"]) ;
$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if(isset($_POST['submit'])){
  {
        $titre=htmlspecialchars($_POST['titre']);
        $destination=htmlspecialchars($_POST['destination']);
        $prix= $_POST['prix'];
        $picture= $_FILES["picture"] ["name"];
        $tempname=$_FILES["picture"] ["tmp_name"];
        $folder="./images".$picture;
        $datedebut=$_POST['date_debut'];
        $place=$_POST['place'];
        $datefin=$_POST['date_fin'];
        $description=nl2br(htmlspecialchars($_POST['description']));
        if($datedebut > $datefin){
            header("Location:../espace_admin.php?error=Date de fin de l'offre est avant son début");
        }else
        $sql2 ="INSERT INTO offre (nom_ofr,destination_ofr,prix_ofr,photo,date_debut,date_fin,description_ofr,place_res)
        values('$titre','$destination','$prix','$picture','$datedebut','$datefin','$description','$place')";
        $result2 = mysqli_query($conn, $sql2);
        move_uploaded_file($tempname, $folder);
        if ($result2) {
             header("Location:http://localhost/final/espace_admin.php?succes= une offre est ajoutée!");
          exit();
    }}

}

?>
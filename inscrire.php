<?php 
session_start(); 
include "configuration.php";

if (isset($_POST['submit']))
{

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$nom = validate($_POST['nom']);
   $prenom=validate($_POST['prenom']);
	$email = validate($_POST['email']);
   $phone= validate($_POST['phone']);
   $adresse= validate($_POST['addresse']);
	$naissance= validate($_POST['naissance']);
	$passeport = validate($_POST['passeport']);
   $password = validate($_POST['mdps']);
   $repassword = validate($_POST['confirmation']);
   $sexe = validate($_POST['sexe']);



	$user_data = 'nom='. $nom. '&prenom='. $prenom .'&email='. $email. '&email='. $prenom
   .'&phone='. $phone. '&adresse='. $adresse.'&naissance='.$naissance.'&passpeport='.$passeport
   .'&password='.$password.'&repass='.$repassword; 


   if(empty($nom) or empty($prenom) or empty($email) or empty($phone) or 
   empty($adresse) or empty($naissance) or empty($passeport) or empty($sexe) or empty($password)
   or empty($repassword)){
       header("location:inscription.php?error=tous les champs doivent être renseigné!&$user_data");
   }
   else if($naissance>2022){
	header("Location: inscription.php?error=la date de naissance n'est pas valide ! &$user_data");
   }
	else if($password !== $repassword){
        header("Location: inscription.php?error=la confirmation de mot de  passe est fausse! &$user_data");
	    exit();
	}
	else{       
        $sql = "SELECT * FROM client WHERE email_cl='$email' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			header("Location: inscription.php?error=email déjà utilisé réssayer un autre &$user_data");
	        exit();
		}else {
           $sql2 ="INSERT INTO client (nom_cl,prenom_cl,email_cl,sexe,n_tele,date_naiss,adresse,passeport,mot_passe)
           values('$nom','$prenom','$email','$sexe','$phone','$naissance','$adresse','$passeport','$password')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: inscription.php?succes=votre compte est crée!");
	         exit();
           }else {
	           	header("Location: inscription.php?error=une erreur inconnue ressayer&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: inscription.php");
	exit();
}
?>
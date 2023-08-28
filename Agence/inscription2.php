<?php
session_start();
include "configuration.php";

if (isset($_POST['insc'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$nom = validate($_POST['nomphp']);
	$prenom = validate($_POST['prenomphp']);
	$email = validate($_POST['emailphp']);
	$phone = validate($_POST['phonephp']);
	$adresse = validate($_POST['adressephp']);
	$naissance = validate($_POST['naissancephp']);
	$passeport = validate($_POST['passeportphp']);
	$password = validate($_POST['mdpsphp']);
	$repassword = validate($_POST['confirmationphp']);
	$sexe = validate($_POST['sexephp']);

	if (empty($nom)) {
		echo 'nom est requis!';
		exit();
	} else if (empty($prenom)) {
		echo 'prenom est requis!';
		exit();
	} else if (empty($email)) {
		echo 'email est requis';
		exit();
	} else if (empty($phone)) {
		echo 'votre numéro de téléphone est obligatoire';
		exit();
	} else if (empty($adresse)) {
		echo 'votre adresse est requise!';
		exit();
	} else if (empty($naissance)) {
		echo 'votre date de naissance est requise!';
		exit();
	} else if (empty($passeport)) {
		echo 'votre numéro de passeport est  obligatoire!';
		exit();
	} else if (empty($password)) {
		echo 'veuillez entrez un mot de passe!';
		exit();
	} else if (empty($sexe)){
		echo 'veuillez choisir votre sexe';
		exit();
	} else if (empty($repassword)) {
		echo 'veuillez confirmez votre mot de passe!';
		exit();
	} else if ($password !== $repassword) {
		echo 'la confirmation de mot de  passe est fausse!';
		exit();
	} else {

		// hashing the password

		$sql = "SELECT * FROM client WHERE email_cl='$email' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo 'email déjà utilisé, réessayer avec un autre';
			exit();
		} else {
			$sql2 = "INSERT INTO client (nom_cl,prenom_cl,sexe,email_cl,n_tele,date_naiss,adresse,passeport,mot_passe)
           values('$nom','$prenom','$sexe','$email','$phone','$naissance','$adresse','$passeport','$password')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				echo 'votre compte est crée avec succés!';
				exit();
			} else {
				echo 'une erreur inconnue, réessayer';
				exit();
			}
		}
	}
} else {
	// header("Location: inscription.php");
	// exit();
}

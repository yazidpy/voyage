<?php
session_start();
include "configuration.php";
$_SESSION['connected'] = FALSE;
if (isset($_POST['login'])) {

	// function validate($data)
	// {
	// 	$data = trim($data);
	// 	$data = stripslashes($data);
	// 	$data = htmlspecialchars($data);
	// 	return $data;
	// }
	$email = $_POST['emailphp'];
	$password = $_POST['mdpphp'];
		$sql = "SELECT * FROM client WHERE email_cl='$email' AND mot_passe='$password'";
		$result = mysqli_query($conn, $sql);
		if ($email == 'admin@gmail.com' && $password == 'admin'){
			exit('admin connecté');
		}else if (mysqli_num_rows($result) === 1) {

				$row = mysqli_fetch_assoc($result);
				if ($row['email_cl'] === $email && $row['mot_passe'] === $password) {
					$_SESSION['nom'] = $row['nom_cl'];
					$_SESSION['prenom'] = $row['prenom_cl'];
					$_SESSION['email'] = $row['email_cl'];
					$_SESSION['id'] = $row['id'];
					$x = $_SESSION['id'];
					$_SESSION['connected'] = TRUE;
					if ($_SESSION['offres'] == TRUE) {
						exit("$x"."&offre connecté");
					} else {
						exit("$x"."&connecté avec succés");
					}
				} else {
					echo "email ou mot de passe incorrect";
					exit();
				}
			} else {
				echo "email ou mot de passe incorrect";
				exit();
			}
	} else {
	// header("location:Acceuil.php");
	// exit();
}

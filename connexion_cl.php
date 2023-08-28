<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=agence;', 'root', '');
if (isset($_POST['submit']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (empty($email)  or empty($password))
	{
		header("Location:acceuil.php?error=veuillez remplir tous les champs!");
	}
	else{ 
		$select1 = $db->prepare("SELECT * FROM admin WHERE login= ? AND mot_passe=?");
$select1->execute(array($email,$password));
$select = $db->prepare("SELECT * FROM client WHERE email_cl= ? AND mot_passe=?");
$select->execute(array($email,$password));
$existance=$select->rowCount();
if ($existance==1){
$userinfo=$select->fetch();
if($userinfo['état']=='pas_validé'){
	header("location:acceuil.php?error=votre compte n'est pas encore validé pas les administrateurs veuillez patienter ou bien les contacter");
}
else{
$_SESSION['id_cl']=$userinfo['id'];
$x=$userinfo['id'];
header("location:acceuil.php?client=$x");
}

}
else{
	header("location:acceuil.php?error=email ou mot de passe incorrect");
}
}
$existance1=$select1->rowCount();
if($existance1==1){
	$admin=$select1->fetch();
	$_SESSION['id_adm']=$admin['id_adm'];
	header("location:espace_admin.php");
}
}

?>

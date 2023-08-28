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
	$login = validate($_POST['login']);
	$password = validate($_POST['password']);
	if (empty($login)) {
		header("Location: admin_login.php?error=pseudo est requis!");
	    exit();
	}else if(empty($password)){
        header("Location: admin_login.php?error=mot de passe est requis!");
	    exit();
	}
	else
	{
	
		$sql = "SELECT * FROM admin WHERE login='$login' AND mot_passe='$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)===1) {
			
			$row=mysqli_fetch_assoc($result);
			if($row['login']===$login && $row['mot_passe']===$password){
				$_SESSION['id']=$row['id_adm'];
				$_SESSION['nom']=$row['nom_adm'];
				$_SESSION['prenom']=$row['prenom_adm'];
				$_SESSION['login']=$row['login'];
                $_SESSION['mdps_admin']=$row['mot_passe'];
				header("location:espace_admin.php");			
			}
		     else{ 
			   header("location:admin_login.html?error=pseudo ou mot de passe incorrect");
			   exit();
		  
			}
		}
		else{
			header("location:admin_login.html?error=pseudo ou mot de passe incorrect");
			exit();
		}
	}
}
else 
{
	header("location:admin_login.html");
	exit();
}

?>


<?php
include "../configuration.php";
if(isset($_POST['confirmer'])){
$id = $_POST['idphp'];
$req= 'UPDATE client set état="validé" where id='.$id.'';
$result = mysqli_query($conn,$req);
if($result){
echo 'un memebre est validé'.$id;
}
} 
?>
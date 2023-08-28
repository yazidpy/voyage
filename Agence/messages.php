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
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Messages</title>
</head>

<body>
    <div class="container my-5">
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
                $sql = "SELECT * from messages";
                $result = mysqli_query($conn, $sql);
                $frow = mysqli_num_rows($result);
                if(!$frow) {
                    echo "<tr><td colspan='6' class='text-danger fs-1 fw-bold text-center'>Il n y'a aucun message</td></tr>";
                }
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idmes = $row['id_mes'];
                        $nom = $row['nom'];
                        $prenom = $row['prenom'];
                        $email = $row['email'];
                        $num = $row['num'];
                        $message = $row['message'];
                        echo '<tr>
                            <th scope="row">' . $idmes . '</th>
                            <td>' . $nom . '</td>
                            <td>' . $prenom . '</td>
                            <td>' . $email . '</td>
                            <td>' . $num . '</td>
                            <td>' . $message . '</td>
                            <td>
                            <a class="text-light" href="./supmes.php?idmes='.$idmes.'"><button class="btn btn-primary">Supprimer</button></a>
                            </td
                        </tr>';
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
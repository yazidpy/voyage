<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/inscription.css">
    <title>Administration</title>
</head>
<body>
    <div class="picture">
        <img src="./images/formulaire-inscription-bouton-concept-graphique_53876-101285.webp">
    </div>
    <section class="container inscription">
        <h1 class="heading">
            <span>A</span>
            <span>D</span>
            <span>M</span>
            <span>I</span>
            <span>N</span> 
            <span>I</span>
            <span>S</span>
            <span>T</span>
            <span>R</span>
            <span>A</span> 
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
        </h1>
        <form action="admin.php" method="POST" class="insc-form">
            <?php if(isset($_GET['error'])){
                      ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
            <div class="grid">
                <div class="part1">
                    <div class="inputBox">
                        <span>pseudo</span>
                        <input type="text" placeholder="insérer votre pseudo" name="login">
                    </div>
                    <div class="inputBox">
                        <span>Mot de passe :</span>
                        <input type="password" placeholder="insérer votre mot de passe" name="password">
                    </div>
                   
                <p>retour à la page d'acceuil ? <a href="Acceuil.php">cliquez ici</a></p>
               
            <input type="submit" value="envoyer" class="btn" name="submit">
            </div>
    </section>   
</html>
</body>
</html>
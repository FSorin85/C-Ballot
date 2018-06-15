<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 15/06/18
 * Time: 09:53
 */

session_start();
$question = $_POST['question'];
$choix1 = $_POST['choix1'];
$choix2 = $_POST['choix2'];
$choix3 = $_POST['choix3'];

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cballot", 'root', 'tamere');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'INSERT INTO sondage (iduser, questionsondage, choix1sondage, choix2sondage, choix3sondage) VALUES (( SELECT iduser FROM user WHERE email="' . ($_SESSION['email']) . '"), "' . ($question) . '", "' . ($choix1) . '", "' . ($choix2) . '", "' . ($choix3) . '")';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} catch (Exception $e) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sondage</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Sondage.css" type="text/css"/>
</head>
<body>
<header>
    <h1 align="center">Sondage</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="Accueil.html">C Ballot</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="Inscription.html">Inscription</a>
                <a class="nav-item nav-link active" href="Connexion.html">Connexion</a>
            </div>
        </div>
    </nav>
</header>
<div align="center" class="Question1">
</div>
<div align="center" class="bouton_val">
    <form action="ValiderSondage.php" method="post">
        <strong id="'question"><?php echo $question?></strong>
        <input type= "radio" name="Choix" value=""> <?php echo $choix1?>
        <input type= "radio" name="Choix" value=""> <?php echo $choix2?>
        <input type= "radio" name="choix" value=""> <?php echo $choix3?>
        <button type="submit"name="valider" value="valider">Valider Sondage</button>
    </form>
</div>
</body>
</html>

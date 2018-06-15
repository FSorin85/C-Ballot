<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste de contact</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
</head>
<body class="bg-primary text-white">
    <h3>Ma liste de contact</h3>
    <?php
    session_start();
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=cballot", 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare(' SELECT iduser FROM user WHERE email="' . (@$_SESSION['email']) . '" ');
        $stmt->execute(array(
            'email' => @$email));
        $iduser = $stmt->fetchColumn();

        $stmt2 = $pdo->prepare(' SELECT emailvoter FROM voter WHERE iduser="' . ($iduser) . '" ');
        $stmt2->execute();
        $emailsvoter = array();
        while ($data = $stmt2->fetch()) {

            $emailsvoter[] = $data['emailvoter'];

        }

        $number = $stmt2->rowCount();
        for ($i = 0; $i < $number; $i++) {
            echo $emailsvoter[$i], '<br>';
        }

    }
    catch (Exception $e) {
        echo 'Exception reçue : ', $e->getMessage(), "\n";
    }
    ?>
</body>
</html>
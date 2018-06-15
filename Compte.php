<?php

session_start();
try {
    $pdo = new PDO("mysql:host=localhost;dbname=cballot", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = 'INSERT INTO voter (iduser,emailvoter) VALUES (( SELECT iduser FROM user WHERE email="' . ($_SESSION['email']) . '"), "' . ($_POST['email']) . '")';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} catch (Exception $e){
    echo 'Exception reçue : ', $e->getMessage(), "\n";
}
header('Location: http://localhost/C-Ballot/Compte.html');

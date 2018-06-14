<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 12/06/18
 * Time: 15:17
 */
try {
    $mail = $_POST['email'];
    $mdp = $_POST['password'];

    $pdo = new PDO("mysql:host=localhost;dbname=cballot", 'root', 'tamere');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $pdo->prepare('SELECT iduser, password FROM user WHERE email="' . (@$_POST['email']) . '" ');
    $req->execute(array(
        'email' => $email));
    var_dump($req);
    $res = $req->fetch();
    var_dump($res);
    $verify = password_verify($_POST['password'], $res['password']);
    if ($verify)
    {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header('Location: http://localhost/C-Ballot/Compte.html');
        exit();
    }
    else
    {
        echo "rate";
    }
}
catch (Exception $e) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";
}
<?php
session_start();

$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cballot", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare(' SELECT iduser FROM user WHERE email="' . (@$_SESSION['email']) . '" ');
    $stmt->execute(array(
        'email' => @$email));
    $iduser = $stmt->fetchColumn();

    $stmt2 = $pdo->prepare(' SELECT emailvoter FROM voter WHERE iduser="' . ($iduser) . '" ');
    $stmt2->execute();
    $emailsvoter =array();
    while($data =$stmt2->fetch()){

        $emailsvoter[] =$data['emailvoter'];

    }

    $number = $stmt2->rowCount();
    $message='Coucou';
    for ($i=0; $i<$number; $i++) {
        echo $emailsvoter[$i];
        mail($emailsvoter[$i],'Répondez à mon sondage',$message,$headers);
    }

}
catch (Exception $e) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";
}

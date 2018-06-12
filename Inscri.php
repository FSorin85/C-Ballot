<?php


@$firstname = $_POST['firstname'];
@$lastname = $_POST['lastname'];
@$password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
@$email = $_POST['email'];

$connection = new PDO("mysql:host=localhost;dbname=cballot", 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = 'INSERT INTO cballot.user (firstname, lastname, password, email) VALUES (:firstname,:lastname, :password, :email)';
$stmt = $connection->prepare($query);
$stmt->bindValue('firstname', $firstname);
$stmt->bindValue('lastname', $lastname);
$stmt->bindValue('password', $password);
$stmt->bindValue('email', $email);
$stmt->execute();
//header('Location: http://localhost/umake/Carte.php');
exit();
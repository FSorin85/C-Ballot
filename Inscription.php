<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Inscription.css" type="text/css"/>
</head>
<body>
<fieldset>
    <legend>Inscription</legend>
    <form method="post" action="CoBDD.php"  class="inscription">
        <label for="firstname">Votre prénom :</label>
        <input type="text" name="firstname" id="firstname" maxlength="15" size="15" required autofocus />
        <label for="lastname">Votre nom :</label>
        <input type="text" name="lastname" id="lastname" maxlength="15" size="15" required />
        <label for="passwd">Votre mot de passe :</label>
        <input type="password" name="passwd" id="passwd"  maxlength="15" required />
        <label for="passwdVerif">Vérification de votre mot de passe :</label>
        <input type="password" name="passwdVerif" id="passwdVerif"  maxlength="15" required />
        <label for="email">Votre e-mail :</label>
        <input type="email" name="email" id="email"  maxlength="30" required />
        <label for="email">Vérification de votre e-mail :</label>
        <input type="email" name="emailVerif" id="emailVerif" maxlength="30" required />
        <input type="submit" value="S'inscrire">
    </form>
</fieldset>
<script type="text/javascript" src="Inscription.js"></script>
</body>
</html>
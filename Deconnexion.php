<?php
session_start();
session_destroy();
header('Location: http://localhost/C-Ballot/Accueil.html');
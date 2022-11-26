<?php
session_start();
//Déconnexion de l'utilisateur
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['connected']);

//Message de redirection
echo "Vous êtes déconnecté(e)";

sleep(3);
header('Location: log.php');
exit;
?>
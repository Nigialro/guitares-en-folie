<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['connected']);
echo "Vous êtes déconnecté(e)";
sleep(3);
header('Location: log.php');
exit;
?>
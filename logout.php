<?php
unset($_POST);
session_unset();
echo "Vous êtes déconnecté(e)";
header('Location: log.php');
exit;
?>
<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <?php require('meta_head.php') ?>
    <title>Compte</title>
</head>
<body>
<?php

require "connexion.php";

echo $_POST['nameUser'];
echo $_POST['surnameUser'];
echo $_POST['adressUser'];
echo $_POST['zipUser'];
echo $_POST['cityUser'];
echo $_POST['emailUser'];
echo $_POST['phoneUser'];
echo $_POST['mdpUser'];

?>
</body>
</html>

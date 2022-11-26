<?php
session_start();

//Connexion à a base de données
include('../Include/connexion.php');

try{
    //Paramètres de la requête
    $tableauParams = [
        'emailUser' => $_SESSION['email']
    ];
    //Rédaction de la requête
    $sqlQuery = "SELECT idUser, nameUser, surnameUser, adressUser, zipUser, cityUser, emailUser, phoneUser FROM Utilisateur WHERE emailUser=:emailUser";
    //Préparation de la requête
    $requete= $db->prepare($sqlQuery);
    //Execution de la requête
    $requete->execute($tableauParams);
    //Récupération des résultats
    $infosUser = $requete->fetch();

} catch(Exception $e){
    //Gestion d'erreur
    die("Erreur: ".$e->getMessage());

}

?>

<!doctype html>
<html lang="fr">
<head>
    <?php require('../Include/meta_head.php'); ?>
    <title>Compte</title>
</head>
<body>

<?php

//Page html du compte actif
echo
"
<form method='POST' action=account_modify.php>
    <div class='form-group'>
        <input type='hidden' name='idUser' value='" . $infosUser['idUser'] . "'>
        <label for='surname'>NOM</label><br>
        <input type='name' id='surname' name='surname' readonly value='" . $infosUser['surnameUser'] . "'><br>
        <label for='name'>PRÉNOM</label><br>
        <input type='name' id='name' name='name' readonly value='" . $infosUser['nameUser'] . "'><br>
        <label for='adress'>ADRESSE</label><br>
        <input type='text' id='adress' name='adress' readonly value='" . $infosUser['adressUser'] . "'><br>
        <label for='zip'>CODE POSTAL</label><br>
        <input type='number' id='zip' name='zip' readonly value='" . $infosUser['zipUser'] . "'><br>
        <label for='city'>VILLE</label><br>
        <input type='name' id='city' name='city' readonly value='" . $infosUser['cityUser'] . "'><br>
        <label for='email'>ADRESSE EMAIL</label><br>
        <input type='email' id='email' name='email' readonly value='" . $infosUser['emailUser'] . "'><br>
        <label for='tel'>NUMÉRO DE TÉLÉPHONE</label><br>
        <input type='tel' id='tel' name='tel' readonly value='" . $infosUser['phoneUser'] . "'><br>
        <input type='submit' value='Modifier Compte'>
    </div>
</form>
<form method='POST' action=password_change.php>
    <input type='hidden' name='idUser' value='" . $infosUser['idUser'] . "'>
    <input type='hidden' name='email' value='" . $infosUser['emailUser'] . "'>
    <input type='submit' value='Changer Mot de passe'>
</form>
<a href='log.php'><button type='button'>Retour</button></a>
";
?>

</body>
</html>

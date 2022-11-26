<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <?php require('../Include/meta_head.php'); ?>
    <title>Création Compte</title>
</head>
<body>
<!--Formulaire de création de compte-->
<form method="POST" action=account_create_insert.php>
    <div class='form-group'>
        <label for='surname'>NOM</label><br>
        <input type='name' id='surname' name='surname' required placeholder="Écrivez votre nom..."><br>
        <label for='name'>PRÉNOM</label><br>
        <input type='name' id='name' name='name' required placeholder="Écrivez votre prénom..."><br>
        <label for='adress'>ADRESSE</label><br>
        <input type='text' id='adress' name='adress' required placeholder="Écrivez votre adresse..."><br>
        <label for='zip'>CODE POSTAL</label><br>
        <input type='text' id='zip' name='zip' required placeholder="Écrivez votre code postal..."><br>
        <label for='city'>VILLE</label><br>
        <input type='name' id='city' name='city' required placeholder="Écrivez le nom de votre ville..."><br>
        <label for='tel'>NUMÉRO DE TÉLÉPHONE</label><br>
        <input type='text' id='tel' name='tel' required placeholder="Entrez votre numéro de téléphone..."><br>
        <label for='email'>ADRESSE EMAIL</label><br>
        <input type='email' id='email' name='email' required placeholder="Écrivez votre adresse email..."><br>
        <label for='email_check'>CONFIRMATION ADRESSE EMAIL</label><br>
        <input type='email' id='email_check' name='email_check' required placeholder="Confirmez votre adresse email..."><br>
        <label for='password'>MOT DE PASSE</label><br>
        <input type='password' id='password' name='password' required placeholder="Entrez votre mot de passe..."><br>
        <label for='password_check'>CONFIRMATION MOT DE PASSE</label><br>
        <input type='password' id='password_check' name='password_check' required placeholder="Confirmez votre mot de passe..."><br>
        <input type='submit' value='ENREGISTRER'>
    </div>
</form>
<a href='log.php'><button type="button">Annuler</button></a>

</body>
</html>

<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <?php require('../Include/meta_head.php'); ?>
    <title>Accueil</title>
</head>
<body>
    <h1 class='text-center'>Mot de passe oublié</h1><br>
    <!--Formulaire de mot de passe oublié-->
    <form action='password_send.php' method='POST'>
        <div class='form-group'>
            <label for='email'>Entrer adresse email</label><br>
            <input type='email' id='email' name='email' required><br>
            <label for='email_confirm'>Confirmer adresse email</label><br>
            <input type='email' id='email_confirm' name='email_confirm' required><br>           
            <input type='submit' value='Envoyer'>
        </div>
    </form>
    <a href='login.php'><button type="button">Annuler</button></a>
</body>
</html>
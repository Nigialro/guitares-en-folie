<!doctype html>
<html lang="fr">
<head>
    <?php require('meta_head.php') ?>
    <title>Modification du mot de passe</title>
</head>
<body>
<?php
    if (isset($_GET['id'])) {
        $selectedId = $_GET['idUser'];
    }
    else {
        $selectedId = $_POST['idUser'];
    }

    include('connexion.php');

    try{
        //Paramètres de la requête
        $tableauParams = [
            'idUser' => $selectedId,
        ];
        //Rédaction de la requête
        $sqlQuery = "SELECT idUser, emailUser FROM Utilisateur WHERE idUser=:idUser";
        //Préparation de la requête
        $requete= $db->prepare($sqlQuery);
        //Execution de la requête
        $requete->execute($tableauParams);
        //Récupération des résultats
        $user = $requete->fetch();

        echo
        "
        <h1 class='text-center'>Modification de mot de passe</h1><br>
        <form action='execute_change_password.php' method='POST'>
            <div class='form-group'>
                <input type='hidden' name='idUser' value=" . $user['idUser'] . ">
                <label for='email'></label><br>
                <input type='email' id='email' name='email' readonly value='" . $user['emailUser'] . "'><br>
                <label for='password'>Entrer le nouveau mot de passe</label><br>
                <input type='password' id='password' name='password' required>
                <label for='password_check'>Confirmer le nouveau mot de passe</label><br>
                <input type='password' id='password_check' name='password_check' required>
                <input type='submit' value='Envoyer'>
            </div>
        </form>
        ";

    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());

    }
?>
</body>
</html>
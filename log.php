<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <?php require('meta_head.php') ?>
    <title>Identification</title>
</head>

<body>
<?php
if(!isset($_SESSION['connected']) || $_SESSION['connected'] !== 1) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
    }

    include('connexion.php');

    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        try {

            //Rédaction de la requête
            $sqlQuery = "SELECT emailUser, mdpUser FROM Utilisateur";
            //Préparation de la requête
            $requete = $db->prepare($sqlQuery);
            //Execution de la requête
            $requete->execute();
            //Récupération des résultats
            $listUsers = $requete->fetchAll();

        } catch (Exception $e) {
            //Gestion d'erreur
            die("Erreur: " . $e->getMessage());

        }

        foreach ($listUsers as $userSelected) {
            //Connexion réussie
            if (($_SESSION['email'] == $userSelected['emailUser']) && password_verify($_SESSION['password'], $userSelected['mdpUser'])) {
                $_SESSION['connected'] = 1;
                header('Location: log.php');
                exit;
            } else {
                session_unset();
                include('login.php');
                echo "Désolé, votre connexion a échoué.";

            }
        }
    } else {
        session_unset();
        include('login.php');

    }
}
else {
    include('logged.php');
}
?>
</body>
</html>
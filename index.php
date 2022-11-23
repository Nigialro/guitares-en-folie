<?php session_start(); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Accueil</title>
</head>

<body>
<header>
    <h1>Accueil</h1>
</header>
<?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
}

include('connexion.php');

if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    try{
    
        //Rédaction de la requête
        $sqlQuery = "SELECT emailAdmin, mdpAdmin FROM Administrateur";
        //Préparation de la requête
        $requete= $db->prepare($sqlQuery);
        //Execution de la requête
        $requete->execute();
        //Récupération des résultats
        $listAdmins = $requete->fetchAll();
        
    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());
    
    }

    foreach($listAdmins as $adminSelected) {
        //Connexion réussie
        if (($_SESSION['email'] == $adminSelected['emailAdmin']) && (MD5($_SESSION['password']) == $adminSelected['mdpAdmin'])) {
            echo "Bonjour chef, vous êtes connecté(e) ^^<br><br>";
        }
        else {
            include ('login.php');
            echo "Désolé, votre connexion a échoué.";
            session_unset();
        }
    }
}
else {
    include ('login.php');
    session_unset();
}
?>
</body>
</html>
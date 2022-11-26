<?php
//Connexion à la base de données
include('../Include/connexion.php');

try {
    //Paramètres de la requête
    $tableauParams = [
        'emailUser' => $_SESSION['email']
    ];
    //Rédaction de la requête
    $sqlQuery = "SELECT nameUser, surnameUser FROM Utilisateur WHERE emailUser=:emailUser";
    //Préparation de la requête
    $requete = $db->prepare($sqlQuery);
    //Execution de la requête
    $requete->execute($tableauParams);
    //Récupération des résultats
    $infosUser = $requete->fetch();

    //Affichage prénom et nom
    echo
    "
    <h1 class='text-center'>" . $infosUser['nameUser'] . " " . $infosUser['surnameUser'] . "</h1><br>
    ";
?>
    <a href='account.php'><button type='button'>Accéder au compte</button></a>
    <a href='logout.php'><button type='button'>Se déconnecter</button></a>
<?php

} catch (Exception $e) {
    //Gestion d'erreur
    die("Erreur: " . $e->getMessage());

}

?>
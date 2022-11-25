<?php
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

    echo
    "
    <h1 class='text-center'>" . $infosUser['nameUser'] . " " . $infosUser['surnameUser'] . "</h1><br>
    <button href='account.php'>Accéder au compte</button>
    <button href='logout.php'>Se déconnecter</button>
    ";

} catch (Exception $e) {
    //Gestion d'erreur
    die("Erreur: " . $e->getMessage());

}

?>
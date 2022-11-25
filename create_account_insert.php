<?php

//Connexion à la base de données
include "connexion.php";

function insert()
{
//Insertion des données dans la BDD
    $insert_query = "INSERT INTO Utilisateur (nameUser, surnameUser, adressUser, zipUser, cityUser, emailUser, phoneUser, mdpUser) VALUES (:nameUser, :surnameUser, :adressUser, :zipUser, :emailUser, :phoneUser, :mdpUser);";
    $insert_statement = $db->prepare($insert_query);


    $insert_statement->bindParam(':nameUser', $nomUtilisateur);
    $insert_statement->bindParam(':surnameUser', $nomfamilleUtilisateur);
    $insert_statement->bindParam(':adressUser', $adressUser);
    $insert_statement->bindParam(':zipUser', $zipUser);
    $insert_statement->bindParam(':cityUser', $cityUser);
    $insert_statement->bindParam(':emailUser', $emailUser);
    $insert_statement->bindParam(':phoneUser', $phoneUser);
    $insert_statement->bindParam(':mdpUser', $mdpUser);


    $nameUser = $_POST['nameUser'];
    $surnameUser = $_POST['surnameUser'];
    $adressUser = $_POST['adressUser'];
    $zipUser = $_POST['zipUser'];
    $cityUser = $_POST['cityUser'];
    $emailUser = $_POST['emailUser'];
    $phoneUser = $_POST['phoneUser'];
    $mdpUser = $_POST['mdpUser'];

    $insert_statement->execute();
    $insert_statement = null;
}


//Préparation de la requête
$sqlQuery = "SELECT idUser, nameUser, surnameUser, adressUser, zipUser, cityUser, emailUser, phoneUser, mdpUser FROM utilisateur";
$requete = $db->prepare($sqlQuery);

//Execution de la requête
$requete->execute();

//Récupération des résultats
$resultats = $requete->fetchAll();

if ($resultats != false) {
    // echo "y'a une valeur";
    return $resultats;
} else {
    // echo "y'a pas de valeur";
}
?>
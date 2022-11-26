<?php
try{
    $db -> beginTransaction();

    //Sélection du fuseau horaire
    date_default_timezone_set('Europe/Paris');

    //Choix du temps limite de modification du mot de passe
    $minutes_to_add = 15;

    $time = new DateTime();
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

    $stamp = $time->format('Y-m-d H:i:s');

    //Paramètres de la requête
    $tableauParams2 = [
        'modifMdpUser' => $stamp,
        'emailUser' => $_POST['email']
    ];
    //Rédaction de la requête
    $sqlQuery2 = "UPDATE Utilisateur SET modifMdpUser = :modifMdpUser WHERE emailUser=:emailUser";
    //Préparation de la requête
    $requete2= $db->prepare($sqlQuery2);
    //Execution de la requête
    $requete2->execute($tableauParams2);

    $db -> commit();

} catch(Exception $e){
    //Gestion d'erreur
    die("Erreur: ".$e->getMessage());

    $db -> rollBack();

}

?>
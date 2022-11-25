<?php
try{
    $db -> beginTransaction();

    $minutes_to_add = 15;

    $time = new DateTime();
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

    $stamp = $time->format('Y-m-d H:i:s');

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

    //Message de validation
    echo "Votre demande de réinitialisation a été transmise à nos services et sera effective durant 15 minutes. Vous allez recevoir un email d'ici peu.";

    $db -> commit();

} catch(Exception $e){
    //Gestion d'erreur
    die("Erreur: ".$e->getMessage());

    $db -> rollBack();

}

?>
<?php
session_start();

include('connexion.php');

if ($_POST['password'] == $_POST['password_check']) {
    try{
        $db -> beginTransaction();

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Paramètres de la requête
        $tableauParams = [
            'mdpUser' => $password,
            'idUser' => $_POST['idUser']
        ];
        //Rédaction de la requête
        $sqlQuery = "UPDATE Utilisateur SET
                    mdpUser = :mdpUser
                WHERE idUser = :idUser";
        //Préparation de la requête
        $requete= $db->prepare($sqlQuery);
        //Execution de la requête
        $requete->execute($tableauParams);

        //Message de validation
        echo "La modification de votre mot de passe a bien été prise en compte.";
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['connected'] = 1;

        $db -> commit();

        sleep(3);
        header("Location: index.php");
        exit;

    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());

        $db -> rollBack();

    }
}
else {
    $returnIdUser = $_POST['idUser'];
    echo "Il y a eu une erreur dans les données saisies.";
    sleep(3);
    header("Location: password_change.php?idUser=$returnIdUser");
    exit;
}

?>
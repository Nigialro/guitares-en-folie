<?php
session_start();

include('connexion.php');

if (($_POST['email'] == $_POST['email_check']) && ($_POST['password'] == $_POST['password_check'])) {
    try{
        $db -> beginTransaction();

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Paramètres de la requête
        $tableauParams = [
            'nameUser' => $_POST['name'],
            'surnameUser' => $_POST['surname'],
            'adressUser' => $_POST['adress'],
            'zipUser' => $_POST['zip'],
            'cityUser' => $_POST['city'],
            'emailUser' => $_POST['email'],
            'mdpUser' => $password,
            'phoneUser' => $_POST['tel']
        ];
        //Rédaction de la requête
        $sqlQuery = "
                INSERT INTO Utilisateur (
                    nameUser,
                    surnameUser,
                    adressUser,
                    zipUser,
                    cityUser,
                    emailUser,
                    mdpUser,
                    phoneUser
                )
                VALUES (
                    :nameUser,
                    :surnameUser,
                    :adressUser,
                    :zipUser,
                    :cityUser,
                    :emailUser,
                    :mdpUser,
                    :phoneUser
                )
                ";
        //Préparation de la requête
        $requete= $db->prepare($sqlQuery);
        //Execution de la requête
        $requete->execute($tableauParams);

        //Message de validation
        echo "Votre compte a bien été enregistré.";
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['connected'] = 1;
        sleep(3);
        header("Location: index.php");
        exit;

        $db -> commit();

    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());

        $db -> rollBack();

    }
}
else {
    echo "Il y a eu une erreur dans les données saisies.";
    sleep(3);
    header("Location: create_account.php");
    exit;
}

?>
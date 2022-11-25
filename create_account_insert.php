<?php
session_start();

include('connexion.php');

if (($_POST['email'] == $_POST['email_check']) && ($_POST['password'] == $_POST['password_check'])) {

    $emailsFromUsers = [];

    try{
        //Rédaction de la requête
        $sqlQuery0 = "SELECT emailUser FROM Utilisateur";
        //Préparation de la requête
        $requete0= $db->prepare($sqlQuery0);
        //Execution de la requête
        $requete0->execute();
        //Récupération des résultats
        $usersEmails = $requete0->fetchAll();

        foreach($usersEmails as $userEmail) {
            array_push($emailsFromUsers, $userEmail['emailUser']);
        }

    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());

    }

    if(!in_array($_POST['email'], $emailsFromUsers)) {
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
                'phoneUser' => $_POST['tel'],
                'modifMdpUser' => date('Y-m-d H:i:s')
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
                    phoneUser,
                    modifMdpUser
                )
                VALUES (
                    :nameUser,
                    :surnameUser,
                    :adressUser,
                    :zipUser,
                    :cityUser,
                    :emailUser,
                    :mdpUser,
                    :phoneUser,
                    :modifMdpUser
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
        echo "Cette adresse email existe déjà dans notre base de données.";
    }

}
else {
    echo "Il y a eu une erreur dans les données saisies.";
    sleep(3);
    header("Location: create_account.php");
    exit;
}

?>
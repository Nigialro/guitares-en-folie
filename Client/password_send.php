<?php session_start();

//Connexion à la base de données
include('../Include/connexion.php');

try{
    //Tableau de récupération des emails
    $usersEmails = [];
    //Rédaction de la requête
    $sqlQuery = "SELECT emailUser FROM Utilisateur";
    //Préparation de la requête
    $requete= $db->prepare($sqlQuery);
    //Execution de la requête
    $requete->execute();
    //Récupération des résultats
    $users = $requete->fetchAll();

    //Transmission des résultats dans le tableau
    foreach ($users as $user) {
        array_push($usersEmails, $user['emailUser']);
    }

    //Test de l'existence de l'email renseigné
    if (in_array($_POST['email'], $usersEmails)) {
        //Cas où l'email existe en base de données
        try{
            //Paramètres de la requête
            $tableauParams = [
                'emailUser' => $_POST['email']
            ];
            //Rédaction de la requête
            $sqlQuery = "SELECT idUser FROM Utilisateur WHERE emailUser=:emailUser";
            //Préparation de la requête
            $requete= $db->prepare($sqlQuery);
            //Execution de la requête
            $requete->execute($tableauParams);
            //Récupération des résultats
            $idUser = $requete->fetch();

            //Transmission du message
            $to      = $_POST['email'];
            $subject = "Réinitialisation du mot de passe";
            $message = "Vous avez demandé la réinitialisation de votre mot de passe." . "\r\n" .
                "<a href='password_change.php?id=" . $idUser['idUser'] . "'>Merci de suivre ce lien</a>";
            $headers = "Content-type: text/html; charset=UTF-8"."\r\n";

            mail($to, $subject, $message, $headers);

            //Déclaration du temps limite de modification du mot de passe
            include('password_time.php');

            //Message de validation
            echo "Votre demande de réinitialisation a été transmise à nos services et sera effective durant 15 minutes. Vous allez recevoir un email d'ici peu.";

        } catch(Exception $e){
            //Gestion d'erreur
            die("Erreur: ".$e->getMessage());

        }

    }
    else {
        //Cas où l'email n'existe pas en base de données
        echo "Cette adresse email semble ne pas être enregistrée dans notre base de données.";
    }

} catch(Exception $e){
    //Gestion d'erreur
    die("Erreur: ".$e->getMessage());

}
?>
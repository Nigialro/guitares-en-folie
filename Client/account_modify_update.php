<?php
session_start();

//Connexion à la base de données
include('../Include/connexion.php');

        try{
            $db -> beginTransaction();

            //Paramètres de la requête
            $tableauParams = [
                'idUser' => $_POST['idUser'],
                'nameUser' => $_POST['name'],
                'surnameUser' => $_POST['surname'],
                'adressUser' => $_POST['adress'],
                'zipUser' => $_POST['zip'],
                'cityUser' => $_POST['city'],
                'emailUser' => $_POST['email'],
                'phoneUser' => $_POST['tel']
            ];

            //Rédaction de la requête
            $sqlQuery = "
                UPDATE Utilisateur SET
                    nameUser = :nameUser,
                    surnameUser = :surnameUser,
                    adressUser = :adressUser,
                    zipUser = :zipUser,
                    cityUser = :cityUser,
                    emailUser = :emailUser,
                    phoneUser = :phoneUser
                WHERE idUser = :idUser";


            //Préparation de la requête
            $requete= $db->prepare($sqlQuery);
            //Execution de la requête
            $requete->execute($tableauParams);

            //Message de validation
            echo "Votre compte a bien été modifié.";
            $_SESSION['email'] = $_POST['email'];

            $db -> commit();

            //Message de redirection
            sleep(3);
            header("Location: account.php");
            exit;

        } catch(Exception $e){
            //Gestion d'erreur
            die("Erreur: ".$e->getMessage());

            $db -> rollBack();

        }

?>
<?php
session_start();

//Connexion à la base de données
include('../Include/connexion.php');

    try{
        //Transmission du message
        $to      = "guitares.en.folie@gmail.com";
        $subject = "Message de " . $_POST['name'];
        $message = $_POST['message'];
        $headers = "From: " . $_POST['email'] . "\r\n";
        mail($to, $subject, $message, $headers);

        //Message de validation
        echo "Votre message a été transmis à nos services.";

    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());

    }
?>
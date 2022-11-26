<?php

    try{
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=guitares_en_folie;charset=utf8', 'root', 'root');
    } catch(Exception $e){
        //Gestion d'erreur
        die("Erreur: ".$e->getMessage());
    }

?>
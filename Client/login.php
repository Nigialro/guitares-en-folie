<?php
//Suppression des données de session
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['connected']);
//Formulaire de connexion
echo
    "
    <h1 class='text-center'>S'identifier</h1><br>
    <form action='log.php' method='POST'>
        <div class='form-group'>
            <label for='email'>Entrer adresse email</label><br>
            <input type='email' id='email' name='email' required><br>
            <label for='password'>Entrer mot de passe</label><br>
            <input type='password' id='password' name='password' required>
                        <input type='submit' value='Connexion'>
        </div>
    </form>
    <span><a href='password_forgotten.php'><button>Mot de passe oublié</button></a></span><br>
    <a href='account_create.php'><button>Créer un compte</button></a>
    ";
?>
<?php
echo
    "
    <h1 class='text-center'>S'identifier</h1><br>
    <form action='connected.php' method='POST'>
        <div class='form-group'>
            <label for='email'>Entrer adresse email</label><br>
            <input type='email' id='email' name='email' required><br>
            <label for='password'>Entrer mot de passe</label><br>
            <input type='password' id='password' name='password' required>
            <span><button href='forgotten_password.php'>Mot de passe oublié</button></span><br>
            <input type='submit' value='Connexion'>
        </div>
    </form>
    <button href='create_account.php'>Créer un compte</button>
    ";
?>
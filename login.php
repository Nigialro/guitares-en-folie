<?php
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
    <span><a href='forgotten_password.php'><button>Mot de passe oublié</button></a></span><br>
    <a href='create_account.php'><button>Créer un compte</button></a>
    ";
?>
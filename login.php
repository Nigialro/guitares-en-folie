<?php
echo
"
<form action='index.php' method='POST'>
    <div class='form-group'>
        <label for='email'>Login :</label><br>
        <input type='email' id='email' name='email' required><br>
        <label for='password'>Mot de passe :</label><br>
        <input type='password' id='password' name='password' required><br>
        <input type='submit' value='Connexion'>
    </div>
</form>
";
?>
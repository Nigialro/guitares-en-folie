<!DOCTYPE.html>
<?php require('meta_head.php') ?>
<html><head><title>Nous contacter</title></head>
<body> <h1 class='text-center'>Nous contacter</h1><br>
<!-- Formulaire utilisateur -->
<form action='send_message.php' method='POST'>
    <div class='form-control container d-flex flex-column'>
        <!-- Nom -->
        <label for='name'>Nom :</label>
        <input type='name' id='name' name='name' required><br><br>
        <!-- Email -->
        <label for='email'>Email :</label>
        <input type='email' id='email' name='email' required><br><br>
        <!-- Description -->
        <textarea type="text" name="message" required placeholder="Message..."></textarea><br><br>
        <!-- Bouton -->
        <input type='submit' value='Envoyer'>
    </div>
</form>
</body>
</html>
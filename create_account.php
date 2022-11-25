<!doctype html>
<html lang="fr">
<head>
    <?php require('meta_head.php') ?>
    <title>Connexion Compte</title>
</head>
<body>
<h1>
    Page de connexion <span>Clients</span>
</h1>


<form method="POST" action=create_account_insert.php>
    <div class="form-group">
        <label for="exampleInputFirstName">PRENOM</label>
        <input type="name" class="form-control" id="exampleInputName" aria-describedby="Name"
               placeholder="Entrez votre prenom">
        <small id="surnameHelp" class="form-text text-muted">Ecrivez votre prénom</small>
    </div>
    <div class="form-group">
        <label for="exampleInputSurname">NOM</label>
        <input type="surname" class="form-control" id="exampleInputSurname" aria-describedby="surname"
               placeholder="Entrez votre nom">
        <small id="surnameHelp" class="form-text text-muted">Ecrivez votre nom</small>
    </div>

    <div class="form-group">
        <label for="exampleInputStreet">RUE</label>
        <input type="street" class="form-control" id="exampleInputAdress" aria-describedby="street"
               placeholder="Entrez votre rue">
        <small id="streetHelp" class="form-text text-muted">Ecrivez votre nom de rue</small>
    </div>

    <div class="form-group">
        <label for="exampleInputAdress">CODE POSTAL</label>
        <input type="zip" class="form-control" id="exampleInputZip" aria-describedby="zip" placeholder="Entrez votre code Postal">
        <small id="zipHelp" class="form-text text-muted">Ecrivez votre Code Postal</small>
    </div>

    <div class="form-group">
        <label for="exampleInputCity">VILLE</label>
        <input type="adress" class="form-control" id="exampleInputCity" aria-describedby="city"
               placeholder="Enter your city">
        <small id="cityHelp" class="form-text text-muted">Ecrirez votre ville</small>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">ADRESSE EMAIL</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Entrez votre mail">
    </div>

    <div class="form-group">
        <label for="exampleInputPhone">NUMERO DE TELEPHONE</label>
        <input type="phone" class="form-control" id="exampleInputphone" aria-describedby="phoneHelp"
               placeholder="Entrez votre numéro de téléphone">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword">MOT DE PASSE</label>
        <input type="password" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp"
               placeholder="Entrez votre mot de passe">
        <small id="passwordHelp" class="form-text text-muted">Nous ne partagerons pas vos données personnelles avec des
            tiers.</small>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Me gardez connecté</label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

</body>
</html>

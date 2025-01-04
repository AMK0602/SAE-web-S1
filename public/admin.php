<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
</head>
<body>
<form class="form-admin" action="index.php?action=connect_admin" method="POST">

    <div class="wrapper-center">
        <label for="email">Email :</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="email@exemple.com"

        />

        <label for="password">Mot de passe :</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="mot de passe"
        />
    </div>
    <div class="btn-modal">
        <button type="button">retour</button>
        <button type="submit" class="btn-submit">Connexion</button>
    </div>
</form>
</body>
</html>
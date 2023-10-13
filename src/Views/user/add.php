<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <form method="POST" action="/mvc-tp/user/add">
        <p>Prénom : <input type="text" name="prenom" /> - 
        Nom : <input type="text" name="nom" /></p>
        <p>Email : <input type="email" name="email" /></p>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
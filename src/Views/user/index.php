<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>

<body>
    <h1>User List</h1>
    <?php foreach ($users as $user): ?>
        <div>
            <p>
                <?= $user->prenom ?>
                <?= $user->nom ?> (
                <?= $user->email ?>)<br />
                Habite au :
                <?= $user->adresse ?>
            </p>
        </div>
    <?php endforeach; ?>
</body>

<script>
    /*
    * Test d'une requête Ajax en utilisant notre contrôleur (UserControlleur viewAllAjax)
    */
    //Creation d'un objet Header
    let headers = new Headers();
    let requestParams = {
        method: "GET",
        headers: headers,
        mode: "cors",
        cache: "default",
    };

    fetch("/mvc-tp/json", requestParams).
        then(function (response) {
            if (response.ok) {
                return response.json();
            }
        }).then(function (articles) {
            articles.forEach(function (article) {
                console.log(article);
            });
        });
</script>
</html>
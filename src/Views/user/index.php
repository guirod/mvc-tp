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
                <p><?= $user->prenom ?> <?= $user->nom ?> (<?= $user->email ?>)<br/>
                Habite au : <?= $user->adresse ?></p>
            </div>
        <?php endforeach; ?>
</body>
</html>

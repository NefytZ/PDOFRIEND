<?php
require_once '_connec.php';
require 'add.php';
?>
<?php
$pdo = new PDO(DSN, USER, PASSWORD);
$query = 'SELECT * FROM friend';
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOS AMIGOS</title>
</head>

<body>
    <h1>LOS AMIGOS</h1>
    <?php foreach ($friends as $friend) : ?>
        <ul>
            <li><?= $friend['firstname'] . ' ' . $friend['lastname']; ?></li>
        </ul>
    <?php endforeach ?>
    <form action="" method="POST">
        <label for="firstname">Prénom</label>
        <input name="firstname" id="firstname">

        <label for="lastname">Nom</label>
        <input id="lastname" name="lastname" <></input>
        <button>Envoyer</button>
    </form>
    <div>
        <?php if (!empty($errors)) : ?>
            <ul class="errorList">
                <?php foreach ($errors as $error) : ?>
                    <li> <?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
</body>

</html>
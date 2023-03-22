<?php 

$db = new PDO('mysql:host=localhost;dbname=2p1', 'root', '');

$stmt = $db->query("SELECT * FROM uzytkownik");
$dane = $stmt->fetchAll();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane</title>
</head>
<body>
    <h2>Dane:</h2>
    <table border="3">
        <tr>
            <td>Id</td>
            <td>Nazwa</td>
            <td>Akcje</td>
        </tr>
        <?php foreach($dane as $d): ?>
            <tr>
                <td> <?= $d['id'] ?></td>
                <td> <?= $d['nazwa'] ?></td>
                <td> <a href="dane_usun.php?id=<?= $d['id'] ?>">Usuń</a>
                 <a href="dane_edytuj.php?id=<?= $d['id'] ?>">Edytuj</a></td>
            </tr>
        <?php endforeach ?>
    </table>

    <a href="index.php">Strona główna</a>
</body>
</html>


<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=kolbus_todo', 'root', '');

$id = $_GET['id'] ?? null;
$user_id = $_SESSION['user_id'] ?? null;

$stmt1 = $db->query("SELECT * FROM users WHERE `id`='$user_id'");


$users = $stmt1->fetch();



$task = $_POST['task'] ?? null;


if (isset($_SESSION['czyZalogowany']) && $_SESSION['czyZalogowany'] == true) {
    if ($task != null) {
        $db->query("INSERT INTO `tasks_todo` (`id`, `task`, `status`, `user_id`) VALUES (NULL, '$task', '0', '$user_id');");
        header("Location: index.php");
    }
} else {
    header("Location: logowanie.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="bg-dark">
        <h1 class="orange p-2 fw-bold">TO-DO LIST</h1>
    </nav>
    <h2 class="ms-3">Dodaj zadanie do swojej listy <?= $users['login'] ?></h2>

    <form action="" method="post" class="ms-3">
        

        <div class="row">
            <div class="col">
                <div class="input-group task_area m-0">
                    <span class="input-group-text">Zadanie</span>
                    <textarea name="task" class="form-control task_form" aria-label="With textarea"></textarea>  
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success m-2">Dodaj</button>
                <a href="index.php" class="btn btn-danger m-2">Anuluj</a>
            </div>
        </div>
            
            
       
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
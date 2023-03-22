<?php
session_start();

$login = $_SESSION['login'] ?? null;
$password = $_SESSION['password'] ?? null;
$user_id = $_SESSION['user_id'] ?? null;

$db = new PDO('mysql:host=localhost;dbname=kolbus_todo', 'root', '');

$stmt1 = $db->query("SELECT * FROM tasks_todo where user_id='$user_id' and  status=0;");
$stmt2 = $db->query("SELECT * FROM tasks_todo where user_id='$user_id' and  status=1;");

$tasks_todo = $stmt1->fetchAll();
$done_tasks = $stmt2->fetchAll();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
if ($czyZalogowany == false) {
  header("Location: logowanie.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
</head>
<body>
  <nav class="bg-dark position-relative d-flex justify-content-end">

          <h1 class="orange p-2 fw-bold m-0 position-absolute top-0 start-0">TO-DO LIST</h1>
          <a href="dane_dodaj.php" class="btn btn-outline-info p-2 dodawanie">Dodaj zadanie</a>
          <a href="wyloguj.php"  class="logout_link link-danger p-1"> <h3 class="fw-bold p-2">Log Out</h3> </a>
        
  </nav>
  <!-- <div class="position-absolute top-0 end-0 d-inline-block"> -->

  <div class="container text-center">
    <div class="row">

      <div class="col">
        <h2 class="fst-italic">Zaplanowane zadania</h2>
        <table class="table table-striped border border-dark border-2">
          <tr>
              <th class="align-middle">Twoje zadania</th>
              <th class="align-middle">Akcje</th>
              <th class="text-wrap" style="width: 6rem;">Usuń</th>
          </tr>
          <?php foreach($tasks_todo as $td): ?>
              <tr>
                  <td> <?= $td['task'] ?></td>
                  <td> <a href="dane_edytuj.php?id=<?= $td['id'] ?>"><button type="button" class="btn btn-primary">Edytuj</button></a>
                       <a href="move.php?id=<?= $td['id'] ?>"><button type="button" class="btn btn-success">Wykonane</button></a></td>
                  <td> <a href="dane_usun.php?id=<?= $td['id'] ?>"><button type="button" class="btn btn-danger">Usuń</button></a></td>
                  
              </tr>
        <?php endforeach ?>
      </table>
      </div>


      <div class="col">
        <h2 class="fst-italic">Wykonane zadania</h2>
        <table class="table table-striped border border-dark border-2">
        <tr>
        <th class="align-middle">Wykonane zadania</th>
            <th class="align-middle">Akcje</th>
            <th class="text-wrap" style="width: 6rem;">Usuń</th>
        </tr>
        <?php foreach($done_tasks as $do): ?>
            <tr>
                <td> <?= $do['task'] ?></td>
                <td> <a href="dane_edytuj.php?id=<?= $do['id'] ?>"><button type="button" class="btn btn-primary">Edytuj</button></a>
                     <a href="move.php?id=<?= $do['id'] ?>"><button type="button" class="btn btn-secondary">Nie wykonane</button></a></td>
                <td> <a href="dane_usun.php?id=<?= $do['id'] ?>"><button type="button" class="btn btn-danger">Usuń</button></a></td>
                
            </tr>
        <?php endforeach ?>
    </table>
      </div>

    </div>
  </div>
  








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
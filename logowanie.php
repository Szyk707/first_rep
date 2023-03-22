<?php
session_start();

$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

$_SESSION['login'] = $_POST['login'] ?? null;
$_SESSION['password'] = $_POST['password'] ?? null;

$blad = [];
if($login != null && $password != null) {
    $db = new PDO('mysql:host=localhost;dbname=kolbus_todo', 'root', '');

    $stmt = $db->query("select * from users where login='$login' and password='$password';");
    $uzytkownik = $stmt->fetch();

    if($uzytkownik) {
        $_SESSION['czyZalogowany'] = true;
        $_SESSION['user_id'] = $uzytkownik['id'];
        header('Location: index.php');
    }
    else {
        $blad[] = 'Błędne dane logowania';
    }
  
} else {
    $blad[] = 'Podaj hasło i login';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <nav class="bg-dark position-relative d-flex justify-content-end">
        <h1 class="orange p-2 fw-bold m-0 position-absolute top-0 start-0">TO-DO LIST</h1>
        <a href="rejestracja.php" class="btn btn-outline-info p-2 dodawanie">Zarejestruj się</a>
    </nav>

    <div class="container">
        <div class="row justify-content-md-center mt-5 p-5">
            <div class="col-md-5 border border-secondary rounded" style="--bs-border-opacity: .5;">
                <h2>Logowanie</h2>
                <form method="post" class="pb-2">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Login</label>
                        <input type="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="login" placeholder="Your login">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Hasło</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Your password">
                    </div>

                    <?php if(!empty($blad)): ?>
                    <p class="text-danger p-1 fst-italic"><?= implode('<br>', $blad) ?></p>
                    <?php endif; ?>

                    <button type="submit" class="orange_button btn btn-warning">Zaloguj</button>
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    </body>
    
    </html>
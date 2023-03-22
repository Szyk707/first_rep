<?php 
session_start();

$id = $_GET['id'] ?? null;

$db = new PDO('mysql:host=localhost;dbname=kolbus_todo', 'root', '');

$stmt = $db->query("SELECT * FROM tasks_todo where id='$id';");
$tasks = $stmt->fetch();



if (isset($_SESSION['czyZalogowany']) && $_SESSION['czyZalogowany'] == true) {
    if ($id != null) {
        if ($tasks['status'] == 0) {
            $db->query("UPDATE tasks_todo SET `status`=1 WHERE id='$id'");
            header("Location: index.php");
        } else if ($tasks['status'] == 1) {
            $db->query("UPDATE tasks_todo SET `status`=0 WHERE id='$id'");
            header("Location: index.php");
        }
        
    }
} else {
    header("Location: logowanie.php");
}


?>
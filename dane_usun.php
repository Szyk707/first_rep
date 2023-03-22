<?php 
session_start();



$db = new PDO('mysql:host=localhost;dbname=kolbus_todo', 'root', '');

$id = $_GET['id'] ?? null;

if (isset($_SESSION['czyZalogowany']) && $_SESSION['czyZalogowany'] == true) {
    if ($id != null) {
        $db->query("DELETE FROM tasks_todo WHERE id='$id'");
        header("Location: index.php");
    }
} else {
    header("Location: logowanie.php");
}


?>
<?php
include_once "conn.php";
session_start();
header('Content-Type: application/json');

$login = $_POST['login'];
$senha = $_POST['password'];
header("Location: ../view/tabelas.html");
$_SESSION['login'] = $login;

$stmt = $conn->query("SELECT * FROM admin");
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    if ($row->login != $login or $row->senha != $senha) {
        echo json_encode("Erro, suas credenciais estão erradas! Tente novamente...");
    } else {
        $_SESSION['admin'] = true;
        echo json_encode(true);
    }
}
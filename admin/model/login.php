<?php
include_once "conn.php";
session_start();
header('Content-Type: application/json');

$login = $_POST['login'];
$senha = $_POST['password'];
$_SESSION['login'] = $login;
$stmt = $conn->query("SELECT login, senha FROM admin WHERE login = '$login'");
$row = $stmt->fetch(PDO::FETCH_OBJ);
if ($row == false) {
    echo json_encode("[ERRO] Suas credencias estão erradas");
}

// TODO: Ajustar o else do While

while($row){
    if ($row->senha == $senha) {
        echo json_encode(true);
    } else {
        echo json_encode("[ERRO] Suas credencias estão erradas");
    }
}

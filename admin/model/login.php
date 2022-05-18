<?php
include_once "conn.php";
header('Content-Type: application/json');

$login = $_REQUEST['login'];
$senha = $_REQUEST['password'];

$stmt = $conn->query("SELECT login, senha FROM admin");
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    if ($row->login != $login or $row->senha != $senha) {
        echo json_encode("Erro, suas credenciais estão erradas! Tente novamente...");
    } else {
        echo json_encode(true);
    }
}
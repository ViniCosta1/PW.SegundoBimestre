<?php
include_once "conn.php";

$login = $_REQUEST['login'];
$senha = $_REQUEST['password'];

$stmt = $conn->query("SELECT login, senha FROM Login");
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    if ($row->login != $login or $row->senha != $senha) {
        echo "Erro, suas credenciais estão erradas! <br> Tente Novamente...";
    } else {
        header("Location: ../view/dashboard.html");
    }
}
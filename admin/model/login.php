<?php
include_once "conn.php";
session_start();
header('Content-Type: application/json');

$login = $_POST['login'];
$senha = $_POST['password'];
$_SESSION['login'] = $login;

// * Preparando e Executando Comando SQL
$stmt = $conn->prepare("SELECT login, senha FROM admin WHERE login = '$login'");
$stmt->execute();

// * Se não tiver uma linha no banco de dados...
if ($stmt->rowCount() < 1) {
    echo json_encode("[ERRO] Suas credencias estão erradas!");
} else {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // * O while está navegando por todos os itens da linha do banco de dados e transformando em uma array (cada chave é o nome da coluna)
        if ($login == $row['login'] && $senha == $row['senha']) {
            echo json_encode(true);
        } else {
            echo json_encode("[ERRO] Suas credencias estão erradas!");
        }
    }
}

<?php
include "conn.php";
session_start();
$a = $_SESSION['login'];
$stmt = $conn->query("SELECT nome FROM admin WHERE login = '$a'");
$name = $stmt->fetch(PDO::FETCH_OBJ);
echo json_encode($name->nome);

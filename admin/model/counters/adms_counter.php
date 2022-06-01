<?php
include "../conn.php";

// * Pesquisar total de administradores
$sql = "SELECT * FROM admin";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo json_encode($stmt->rowCount());
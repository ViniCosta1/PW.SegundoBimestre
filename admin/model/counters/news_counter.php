<?php
include "../conn.php";

// * Pesquisar total de noticias
$sql = "SELECT * FROM noticia";
$stmt = $conn->prepare($sql);
$stmt->execute();
echo json_encode($stmt->rowCount());
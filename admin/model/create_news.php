<?php
include "conn.php";

$titulo = $_REQUEST['title'];
$autor = $_REQUEST['author'];
$curso = $_REQUEST['course'];
$texto = $_REQUEST['text'];

$data = [
    'titulo' => $titulo,
    'autor' => $autor,
    'curso' => $curso,
    'texto' => $texto
];

$sql = "INSERT INTO noticia (titulo, autor, curso, texto) VALUES (:titulo, :autor, :curso, :texto)";
$stmt = $conn->prepare($sql);
$stmt->execute($data);
header("Location: ../view/dashboard.html");
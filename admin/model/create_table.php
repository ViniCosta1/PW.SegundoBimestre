<?php
require_once "conn.php";

$createAdmin = $_REQUEST['createAdmin'];
$createNoticia = $_REQUEST['createNoticia'];
$addAdminVini = $_REQUEST['addAdminVini'];
$addAdminPaulo = $_REQUEST['addAdminPaulo'];

class Tabelas {

    function tabelaNoticia() {
        global $conn;
        
        $statements = [
        	'CREATE TABLE noticia( 
                noticia_id INT AUTO_INCREMENT,
                titulo VARCHAR(255) NOT NULL, 
                autor VARCHAR(255) NOT NULL, 
                texto TEXT NOT NULL, 
                PRIMARY KEY(noticia_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
        ];
    
        try {
            foreach ($statements as $statement) {
                $conn->exec($statement);
            };
        } catch (Exception $e) {
            echo "deu merda: ".$e;
        };
    }
    
    function tabelaAdmin() {
        global $conn;
        
        $statements = [
            'CREATE TABLE `admin` (
                `login` varchar(255) NOT NULL,
                `senha` varchar(255) NOT NULL,
                `nome` varchar(255) NOT NULL,
                PRIMARY KEY (`login`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;'
        ];
    
        try {
            foreach ($statements as $statement) {
                $conn->exec($statement);
            };
        } catch (Exception $e) {
            echo "deu merda: ".$e;
        };
    }

    function addAdminVini() {
        global $conn;
        
        $data = [
            'login' => "adminVini",
            'senha' => "admin123",
            'nome' => "Vinicius"
        ];
        $sql = "INSERT INTO admin (login, senha, nome) VALUES (:login, :senha, :nome)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }

    function addAdminPaulo() {
        global $conn;
        
        $data = [
            'login' => "adminPaulo",
            'senha' => "admin123",
            'nome' => "Paulo Henrique"
        ];
        $sql = "INSERT INTO admin (login, senha, nome) VALUES (:login, :senha, :nome)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }
    
}

if (isset($createAdmin)) {
    $criar = new Tabelas();
    $criar->tabelaAdmin();
}

if (isset($createNoticia)) {
    $criar = new Tabelas();
    $criar->tabelaNoticia();
}

if (isset($addAdminVini)) {
    $criar = new Tabelas();
    $criar->addAdminVini();
}

if (isset($addAdminPaulo)) {
    $criar = new Tabelas();
    $criar->addAdminPaulo();
}

header("Location: ../view/tabelas.html");
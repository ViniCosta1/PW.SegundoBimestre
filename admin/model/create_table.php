<?php
require_once "conn.php";

$createAdmin = $_REQUEST['createAdmin'];
$createNoticia = $_REQUEST['createNoticia'];

$addAdminVini = $_REQUEST['addAdminVini'];
$addAdminPaulo = $_REQUEST['addAdminPaulo'];
$addNewsTeste = $_REQUEST['addNewsTeste'];

$deleteAdmins = $_REQUEST['deleteAdmins'];
$deleteNews = $_REQUEST['deleteNews'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// * Adicionar tabelas
class Tabelas {
    function tabelaNoticia() {
        global $conn;
        
        $statements = [
        	'CREATE TABLE noticia( 
                noticia_id INT AUTO_INCREMENT,
                titulo VARCHAR(255) NOT NULL, 
                autor VARCHAR(255) NOT NULL, 
                curso VARCHAR(255) NOT NULL, 
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
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// * Adicionar informações as tabelas
class Adicionar {
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

    function addNewsTeste() {
        global $conn;
        
        $data = [
            'titulo' => "Título do Texto",
            'autor' => "Autor da Notícia",
            'curso' => "Desenvolvimento de Sistemas",
            'texto' => "Texto teste... Texto teste... Texto teste... Texto teste... Texto teste... Texto teste... Texto teste... Texto teste... Texto teste... "
        ];
        $sql = "INSERT INTO noticia (titulo, autor, curso, texto) VALUES (:titulo, :autor, :curso, :texto)";
        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// * Deletar informações as tabelas
class DeletarInfos {
    // * Deletar informações
    function deleteAdmins() {
        global $conn;

        $sql = "DELETE FROM admin";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function deleteNews() {
        global $conn;

        $sql = "DELETE FROM noticia";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// * FUNÇÕES CRIAR
if (isset($createAdmin)) {
    $criar = new Tabelas();
    $criar->tabelaAdmin();
}

if (isset($createNoticia)) {
    $criar = new Tabelas();
    $criar->tabelaNoticia();
}


// * FUNÇÕES ADICIONAR
if (isset($addAdminVini)) {
    $adicionar = new Adicionar();
    $adicionar->addAdminVini();
}

if (isset($addAdminPaulo)) {
    $adicionar = new Adicionar();
    $adicionar->addAdminPaulo();
}

if (isset($addNewsTeste)) {
    $adicionar = new Adicionar();
    $adicionar->addNewsTeste();
}


// * FUNÇÕES DELETAR
if (isset($deleteAdmins)) {
    $deletar = new DeletarInfos();
    $deletar->deleteAdmins();
}

if (isset($deleteNews)) {
    $deletar = new DeletarInfos();
    $deletar->deleteNews();
}


header("Location: ../view/tabelas.html");
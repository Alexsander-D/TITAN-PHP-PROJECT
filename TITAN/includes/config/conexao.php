<?php
//CONEXÃO COM O BANCO DE DADOS, ONDE FOI UTILIZADO PDO
include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php");
class Conexao
{

    private $host = "localhost";
    private $user = "root";
    private $senha = "";

    public function conectarBD($dbname)
    {
        $pdo = new PDO(
            'mysql:host=' . $this->host .
                ';dbname=' . $dbname . '',
            $this->user,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

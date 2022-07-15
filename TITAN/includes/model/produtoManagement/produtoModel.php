<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php");
require_once($_SERVER["DOCUMENT_ROOT"] . Rotas::getConfigsRoutes()["conexao"]);
class produtoModel
{

    private $pdo;
    private $produto = "produtos";
    private $preco = "preco";

    public function __construct()
    {
        $conexaoModel = new Conexao;
        $this->pdo = $conexaoModel->conectarBD("TITAN");
    }

    //BUSCA TODOS OS PRODUTOS
    public function getProduto()
    {
        $produto = $this->pdo->prepare("SELECT P.IDPRODUTO, P.NOME, P.COR, V.PRECO FROM $this->produto AS P INNER JOIN $this->preco AS V ON P.IDPRODUTO = V.IDPRODUTO");
        $produto->execute();

        return $produto->fetchAll(PDO::FETCH_ASSOC);
    }

    //DELETA O PRODUTO DAS TABELAS PRODUTO E PRECO
    public function deleteProduto($id)
    {

        $produto = $this->pdo->prepare("DELETE FROM $this->preco WHERE IDPRODUTO = :id");
        $produto->bindValue(":id", $id);
        $produto->execute();

        $produto = $this->pdo->prepare("DELETE FROM $this->produto WHERE IDPRODUTO = :id");
        $produto->bindValue(":id", $id);
        $produto->execute();

        return true;
    }

    //BUSCA O PRODUTO DE ACORDO COM O IDPRODUTO
    public function getProdutoId($id)
    {
        $produto = $this->pdo->prepare("SELECT P.IDPRODUTO, P.NOME, P.COR, V.PRECO FROM $this->produto AS P INNER JOIN $this->preco AS V ON P.IDPRODUTO = V.IDPRODUTO WHERE P.IDPRODUTO = :id");
        $produto->bindValue(":id", $id);
        $produto->execute();

        return $produto->fetchAll(PDO::FETCH_ASSOC);
    }

    //ALTERA AS INFORMAÇÕES DO PRODUTO DE ACORDO COM O IDPRODUTO
    public function editProduto($dados)
    {
        $produto = $this->pdo->prepare("UPDATE $this->produto P INNER JOIN $this->preco V ON P.IDPRODUTO = V.IDPRODUTO SET P.NOME=:NOME, V.PRECO=:PRECO WHERE P.IDPRODUTO = :IDPRODUTO");
        $produto->bindValue(":IDPRODUTO", $dados['IDPRODUTO']);
        $produto->bindValue(":NOME", $dados['NOME']);
        $produto->bindValue(":PRECO", str_replace(",", ".", $dados['PRECO']));
        $produto->execute();

        return true;
    }

    //INSERE PRODUTO NAS TABELAS PRODUTO E PRECO
    public function createProduto($dados)
    {
        $produto = $this->pdo->prepare("INSERT INTO $this->produto SET NOME=:NOME, COR=:COR");
        $produto->bindValue(":COR", $dados['COR']);
        $produto->bindValue(":NOME", $dados['NOME']);        
        $produto->execute();

        $IDPRODUTO = $this->pdo->lastInsertId();

        $produto = $this->pdo->prepare("INSERT INTO $this->preco SET IDPRODUTO=:IDPRODUTO, PRECO=:PRECO");
        $produto->bindValue(":IDPRODUTO", $IDPRODUTO);
        $produto->bindValue(":PRECO", str_replace(",", ".", $dados['PRECO']));
        $produto->execute();

        return true;
    }

}

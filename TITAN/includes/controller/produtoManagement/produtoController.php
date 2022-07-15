<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php");
include_once($_SERVER["DOCUMENT_ROOT"] . Rotas::getModelsRoutes()["produto"]);


class produtoController
{

    public function getProduto()
    {
        $produtoModel = new produtoModel;
        $produto = $produtoModel->getProduto();

        echo json_encode($produto);
    }

    public function deleteProduto()
    {
        $produtoModel = new produtoModel;

        $produto = $produtoModel->deleteProduto($_GET['id']);

        if($produto){
            header("location:/TITAN/view");
        }
    }

    public function getProdutoId()
    {
        $produtoModel = new produtoModel;
        $produto = $produtoModel->getProdutoId($_GET['id']);

        echo json_encode($produto);
    }

    public function editProduto()
    {
        $produtoModel = new produtoModel;
        $dados = array(
            'IDPRODUTO' => $_GET['IDPRODUTO'],
            'NOME' => $_GET['NOME'],
            'PRECO' => $_GET['PRECO'],
        );
        $produto = $produtoModel->editProduto($dados);

        echo json_encode($produto);
    }

    public function createProduto()
    {
        $produtoModel = new produtoModel;
        $dados = array(
            'COR' => $_GET['COR'],
            'NOME' => $_GET['NOME'],
            'PRECO' => $_GET['PRECO'],
        );
        $produto = $produtoModel->createProduto($dados);

        echo json_encode($produto);
    }
}

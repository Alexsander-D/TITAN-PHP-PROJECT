<?php
//ARQUIVO DE ROTAS
include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php");
include_once($_SERVER["DOCUMENT_ROOT"] . Rotas::getControllersRoutes()["produto"]);

$acao = "";
$produtoController = new produtoController;
if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];

    switch ($acao) {
        case "deletar-produto":
            $produtoController->deleteProduto();
            break;
        case "cadastrar-produto":
            $produtoController->createProduto();
            break;
        case "editar-produto":
            $produtoController->editProduto();
            break;        
        case "pesquisar-todos-produto":
            $produtoController->getProduto();
            break;
        case "pesquisar-produto-id":
            $produtoController->getProdutoId();
            break;
        default:
            break;
    }
}

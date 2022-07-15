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
        //TRATANDO VALOR PARA INSERIR NO BANCO
        function CALCULA_DESCONTO($StringToNumber, $cor)
        {
            //FORMATA O VALOR RECEBIDO DA MASCARA JS COM VIRGULA PARA SALVAR NO BANCO
            $PRECO = str_replace('.', '', $StringToNumber);
            $PRECO = str_replace(',', '.', $PRECO);

            if ($cor === "Azul" || $cor === "Vermelho") {
                if ($cor === "Vermelho") {

                    if ($PRECO > 50) {
                        $PRECO = $PRECO - ($PRECO / 100) * 5;
                    } else {
                        $PRECO = $PRECO - ($PRECO / 100) * 20;
                    }
                } else {
                    $PRECO = $PRECO - ($PRECO / 100) * 20;
                }
            } elseif ($cor === "Amarelo") {
                $PRECO = $PRECO - ($PRECO / 100) * 10;
            }
            return $PRECO;
        }

        $produtoModel = new produtoModel;

        $COR = $_GET['COR'];
        $PRECO_ATUALIZADO = CALCULA_DESCONTO($_GET['PRECO'], $COR);

        $dados = array(
            'COR' => $COR,
            'NOME' => $_GET['NOME'],            
            'PRECO' => $PRECO_ATUALIZADO,
        );
        $produto = $produtoModel->createProduto($dados);

        echo json_encode($produto);
    }
}

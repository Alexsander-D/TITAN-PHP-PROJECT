<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php"); ?>

<!DOCTYPE html>
<html dir="ltr" lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Titan Project</title>
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <div id="main">
        <div class="wrapper">

            <div class="container">

                <a href="/TITAN/view/cadastrarProduto.php"><button type="button" id="button-create">CADASTRAR PRODUTO</button></a>

                <hr>

                <table id="tabela-produto" class="display responsive nowrap">
                    <thead>
                        <tr>
                            <th>IDPRODUTO</th>
                            <th>PRODUTO</th>
                            <th>COR</th>
                            <th>PREÇO</th>
                            <th>EDITAR</th>
                            <th>EXCLUIR</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="/TITAN/js/produtos.js"></script>
</body>

</html>
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/TITAN/includes/config/rotas.php"); ?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-Br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Titan Project</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <div id="main">
        <div class="wrapper">

            <div class="container">

                <form id="formEdita" autocomplete="off">

                    <label for="produto">PRODUTO</label><br>
                    <input type="text" id="produto" name="produto" value="" required><br><br>
                    
                    <label for="cor">COR:</label><br>
                    <select name="cor" id="cor" disabled>
                        <option value="" disabled></option>
                        <option value="AMARELO">AMARELO</option>
                        <option value="AZUL">AZUL</option>
                        <option value="VERMELHO">VERMELHO</option>
                    </select><br><br>

                    <label for="preco">PREÇO:</label><br>
                    <input type="text" id="preco" name="preco" value="" required><br><br>

                    <input type="submit" value="Submit">

                </form>

            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="/TITAN/js/editaProduto.js"></script>
</body>

</html>
//INICIANDO AO CARREGAR A PÁGINA
$(document).ready(function () {
//MASCARA PARA MOEDA BRASILEIRA
    $(function () {
        $("#preco").maskMoney({ thousands: ".", decimal: "," });
    });

    //DESABILITA A COR AO SELECIONAR (READONLY NÃO FUNCIONA NO SELECT)
    $("#cor").change(function () {
        $("#cor2").val($(this).val());
        $("#cor").prop('disabled', true);
    });

    //CADASTRAR PRODUTO
    $("#formEdita").submit(function (event) {
        let url = "/TITAN/includes/controller/produtoManagement/produtoScripts.php?acao=cadastrar-produto";

        let COR = $("#cor2").val();
        let PRECO = $("#preco").val();
        PRECO = PRECO.replace(",", ".");

        if (COR === "Azul" || COR === "Vermelho") {
            if (COR === "Vermelho") {

                if (PRECO > 50) {
                    PRECO = PRECO - (PRECO / 100) * 5;
                } else {
                    PRECO = PRECO - (PRECO / 100) * 20;
                }

            } else {
                PRECO = PRECO - (PRECO / 100) * 20;
            }

        } else if (COR === "Amarelo") {
            PRECO = PRECO - (PRECO / 100) * 10;
        }

        let formData = {
            NOME: $("#produto").val(),
            COR: COR,
            PRECO: PRECO,
        }
        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            success: function () {
                //REDIRECIONA PARA A PAGINA PRINCIPAL
                window.location.assign('/TITAN/view/');
            },
            error: function (textStatus) {
                alert(textStatus);
            }
        });
        event.preventDefault();
    });
});
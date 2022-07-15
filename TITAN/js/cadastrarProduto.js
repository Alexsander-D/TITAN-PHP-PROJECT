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
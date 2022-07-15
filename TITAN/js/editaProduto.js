//INICIANDO AO CARREGAR A PÁGINA
$(document).ready(function () {
    //MASCARA PARA REAL BRASILEIRO
    $(function () {
        $("#preco").maskMoney({ thousands: ".", decimal: "," });
    });

    //BUSCA AS INFORMAÇÕES DO PRODUTO SELECIONADO
    getProdutoDataById();
    function getProdutoDataById() {
        let url = "/TITAN/includes/controller/produtoManagement/produtoScripts.php?acao=pesquisar-produto-id";
        let formData = {
            id: new URL(window.location).searchParams.get("id")
        }
        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            dataType: 'json',
            encode: true,
            success: function (data) {
                
                $("#produto").val(data[0]['NOME']);
                $("#preco").val(data[0]['PRECO']);
                
                $("#cor").append($("<option>", {
                    value: data[0]['COR'],
                    text: data[0]['COR']
                }).attr('selected', 'selected'));   
            }
        });
    }

    //ENVIA AS ALTERAÇÕES REALIZADAS
    $("#formEdita").submit(function (event) {
        let url = "/TITAN/includes/controller/produtoManagement/produtoScripts.php?acao=editar-produto";
        let formData = {
            IDPRODUTO: new URL(window.location).searchParams.get("id"),
            NOME: $("#produto").val(),
            PRECO: $("#preco").val(),
        }
        console.log(formData);
        $.ajax({
            url: url,
            type: 'GET',
            data: formData,
            success: function () {
                //REDIRECIONA PARA INDEX
                window.location.assign('/TITAN/view/')          
            },
            error: function (textStatus) {
                alert(textStatus);
            }
        });
        event.preventDefault();
    });
});
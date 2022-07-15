//INICIANDO AO CARREGAR A PÁGINA
$(document).ready(function () {
    initialiseDataTable();

    //INICIA O DATATABLE
    function initialiseDataTable() {
        $("#tabela-produto").DataTable({
            //HABILITADO FILTRO DA TABELA
            bFilter: true,
            ajax: {
                url: "/TITAN/includes/controller/produtoManagement/produtoScripts.php?acao=pesquisar-todos-produto",
                type: 'GET',
                dataSrc: function (json) {
                    return json;
                },
                error: function (textStatus) {
                    console.log(textStatus);
                }
            },
            order: [[1, 'asc']],
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
            },
            { orderable: true, targets: "_all" }
            ],
            //SETA A INFORMAÇÃO DAS COLUNAS
            columns: [
                { data: 'IDPRODUTO' },
                { data: 'NOME' },
                { data: 'COR' },
                {
                    render: function (data, type, row, meta) {
                        //RENDERIZANDO A VIEW
                        return Intl.NumberFormat('pt-br', { style: 'currency', currency: 'BRL' }).format(row['PRECO'])
                    }
                },
                {
                    render: function (data, type, row, meta) {
                        return '<a href="/TITAN/view/editaProdutos.php?id=' + row['IDPRODUTO'] + '"><button type="button" id="button-edit" >' + 'EDIT' + '</button></a>'
                    }
                },
                {
                    render: function (data, type, row, meta) {
                        return '<a href="/TITAN/includes/controller/produtoManagement/produtoScripts.php?acao=deletar-produto&id=' + row['IDPRODUTO'] + '"><button type="button" id="button-edit" >' + 'DELETE' + '</button></a>'
                    }
                }
            ]
        });
    }    
});
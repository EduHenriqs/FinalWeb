<?php
//print_r($_POST);
date_default_timezone_set('America/Sao_Paulo');
ini_set('date.timezone', 'America/Sao_Paulo');
error_reporting(0);

session_name('mercado');
session_start();

include "includes/conect.php";

$acao = $_POST['valor'];
$id_prod = $_POST['id'];
$cont = $_POST['cont'];
$id_venda = $_POST['id_venda'];
$quantidade = $_POST['quantidade'];
$remove_tudo = $_POST['remove_tudo'];
$id_cli = $_POST['id_cli'];
$id_func = $_POST['id_func'];

$query = "SELECT preco_venda FROM produtos WHERE id = $id_prod";
$result = mysqli_query($conect, $query);
$dados = mysqli_fetch_array($result);
$valor_venda = $dados['preco_venda'];

$query = "SELECT * FROM venda_produto WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
$result = mysqli_query($conect, $query);
$dados_produto = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);


if ($acao == "adicionar") {
    $query_produtos2 = "SELECT produtos.id, quantidade, valor_total FROM venda_produto INNER JOIN produtos ON venda_produto.id_produtos = produtos.id WHERE id_vendas = $id_venda AND venda_produto.id_produtos = $id_prod";
    $result_produtos2 = mysqli_query($conect, $query_produtos2);
    $soma_quantidade = 0;
    while($dados_quant = mysqli_fetch_array($result_produtos2)){
        $soma_quantidade += $dados_quant['quantidade'];
    }
    $query_produtos = "SELECT estoque FROM produtos WHERE produtos.id = $id_prod ";
    $result_produtos = mysqli_query($conect, $query_produtos);
$dados = mysqli_fetch_array($result_produtos );
$quant_total = $dados['estoque'];

if(($quant_total - $quantidade) < 0 OR ($soma_quantidade + $quantidade) > $quant_total){
    ?>
    
<div class="card" id="card_produtos_venda">
    <div class="card-header">
        Produtos da Compra
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table table-bordered table-hover" id="venda">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Pre&ccedil;o de Venda</th>
                        <th scope="col">Código de Barras</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remover do Carrinho</th>
                    </tr>
                </thead>
                <tbody id="vendas_body">
                    <?php
                    $query = "SELECT produtos.*, venda_produto.quantidade FROM venda_produto INNER JOIN produtos ON venda_produto.id_produtos = produtos.id WHERE id_vendas = $id_venda";
                    $result = mysqli_query($conect, $query);
                    $CONT = 0;
                    $soma_valor = 0;
                    while ($dados = mysqli_fetch_array($result)) {
                        $CONT++;

                    ?>
                        <tr>
                            <th scope="row"><?php print $CONT ?></th>
                            <td><?php print $dados['nome'] ?></td>
                            <td><?php print $dados['marca'] ?></td>
                            <td>R$ <?php print str_replace(".", ",", $dados['preco_venda']); ?></td>
                            <td><?php print $dados['cod_barras'] ?></td>
                            <td><?php print number_format($dados['quantidade']) ?></td>
                            <td>R$ <?php print str_replace(".", ",", $dados['preco_venda'] * $dados['quantidade']); ?></td>
                            <td><button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Remover do Carrinho" onclick="removerCarrinho(<?php print $dados['id']; ?>)"><i class="fa fa-shopping-basket"></i></button></td>
                        </tr>
                    <?php
                        $soma_valor += $dados['preco_venda'] * $dados['quantidade'];
                    } ?>


                </tbody>
            </table>
        </div>
        <div class="row" style="padding-top: 40px">
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #1cc88a;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Valor Total</div>
                                <div class="h5 mb-0 font-weight-bold ">
                                    R$ <?php print str_replace(".", ",", $soma_valor) ?> </div>
                            </div>
                            <div class="col-auto">
                                <svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-danger" onclick="excluirVenda()" id="exclui_btn" name="exclui_btn">Cancelar Venda</button>
                <button class="btn btn-success" onclick="concluirVenda($('#funcionario_select').val(), $('#cliente_select').val())" id="conclui_btn" name="conclui_btn">Concluir Venda</button>
            </div>

        </div>
    </div>

    <script>
        $('#venda').DataTable({
            "language": {
                "sProcessing": "Processando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Não foram encontrados resultados",
                "sEmptyTable": "Sem dados disponíveis nesta tabela",
                "sInfo": "Mostrando registros de _START_ a _END_ em um total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
                "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Carregando...",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast": "Último",
                    "sNext": "Seguinte",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar de forma crescente",
                    "sSortDescending": ": Ordenar de forma decrescente"
                }
            }
        });
    </script>

</div>
    <script>
        Swal.fire({
            icon: 'error',
            html: 'Quantidade da compra maior que quantidade em estoque.'   
        })
    </script>    
    <?php
    exit();
}
    if ($num_rows > 0) {
        $query = "UPDATE venda_produto SET quantidade = " . $dados_produto['quantidade'] . "  + $quantidade, valor_unit = $valor_venda, valor_total = $valor_venda * (" . $dados_produto['quantidade'] . "  + $quantidade) WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
    } else {
        if ($quantidade != 0) {
            $query = "INSERT INTO venda_produto (quantidade, valor_unit, valor_total, id_vendas, id_produtos) VALUES 
            (
                $quantidade,
                $valor_venda,
                $valor_venda * $quantidade,
                $id_venda,
                $id_prod
            );
        ";
        }
    }
    //print $query;

} elseif ($acao == "remover") {
    if ($num_rows > 0) {

        if ($remove_tudo != '' or $dados_produto['quantidade'] - $quantidade <= 0) $query = "DELETE FROM venda_produto WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
        else $query = "UPDATE venda_produto SET quantidade = " . $dados_produto['quantidade'] . "  - $quantidade, valor_unit = $valor_venda, valor_total = $valor_venda * (" . $dados_produto['quantidade'] . "  - $quantidade) WHERE id_vendas = $id_venda AND id_produtos = $id_prod";
    }
} elseif ($acao == "checar") {
    print $dados_produto['quantidade'];
    exit();
} elseif ($acao == "concluir") {
    $agora = date("Y-m-d H:i:s");
    $query_produtos = "SELECT produtos.id, quantidade, valor_total FROM venda_produto INNER JOIN produtos ON venda_produto.id_produtos = produtos.id WHERE id_vendas = $id_venda";
    
    $result_produtos = mysqli_query($conect, $query_produtos);
    $valor_total = 0;
    while ($dados_prod = mysqli_fetch_array($result_produtos)) {
        $query_update_prod = "UPDATE produtos SET estoque = 
        CASE
            WHEN estoque - " . $dados_prod['quantidade'] . " < 0 THEN 0
            ELSE estoque - " . $dados_prod['quantidade'] . "
        END 
        WHERE id = " . $dados_prod['id'] . "";
        //print $query_update_prod;
        $result_update_prod = mysqli_query($conect, $query_update_prod);
        $valor_total += $dados_prod['valor_total'];
    }
    //exit();

    $query = "INSERT INTO vendas (id, data_venda, valor_total, id_funcionarios, id_clientes) VALUES 
    (
        '',
        '$agora',
        '$valor_total',
        '$id_func',
        '$id_cli'
    )            ";
    print $query;
    $result = mysqli_query($conect, $query);
    exit();
} elseif ($acao == "checar_rows") {

    $select_quant_prod = "SELECT * FROM venda_produto WHERE id_vendas = '$id_venda'";
    $result_quant_prod = mysqli_query($conect, $select_quant_prod);
    $num_rows_quant_prod = mysqli_num_rows($result_quant_prod);
    print $num_rows_quant_prod;
    exit();
} elseif ($acao == "excluir") {

    $query = "DELETE FROM venda_produto WHERE id_vendas = '$id_venda'";
    mysqli_query($conect, $query);
    exit();
}

mysqli_query($conect, $query);
?>
<div class="card" id="card_produtos_venda">
    <div class="card-header">
        Produtos da Compra
    </div>
    <div class="card-body">
        <div class="row">
            <table class="table table table-bordered table-hover" id="venda">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Pre&ccedil;o de Venda</th>
                        <th scope="col">Código de Barras</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remover do Carrinho</th>
                    </tr>
                </thead>
                <tbody id="vendas_body">
                    <?php
                    $query = "SELECT produtos.*, venda_produto.quantidade FROM venda_produto INNER JOIN produtos ON venda_produto.id_produtos = produtos.id WHERE id_vendas = $id_venda";
                    $result = mysqli_query($conect, $query);
                    $CONT = 0;
                    $soma_valor = 0;
                    while ($dados = mysqli_fetch_array($result)) {
                        $CONT++;

                    ?>
                        <tr>
                            <th scope="row"><?php print $CONT ?></th>
                            <td><?php print $dados['nome'] ?></td>
                            <td><?php print $dados['marca'] ?></td>
                            <td>R$ <?php print str_replace(".", ",", $dados['preco_venda']); ?></td>
                            <td><?php print $dados['cod_barras'] ?></td>
                            <td><?php print number_format($dados['quantidade']) ?></td>
                            <td>R$ <?php print str_replace(".", ",", $dados['preco_venda'] * $dados['quantidade']); ?></td>
                            <td><button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Remover do Carrinho" onclick="removerCarrinho(<?php print $dados['id']; ?>)"><i class="fa fa-shopping-basket"></i></button></td>
                        </tr>
                    <?php
                        $soma_valor += $dados['preco_venda'] * $dados['quantidade'];
                    } ?>


                </tbody>
            </table>
        </div>
        <div class="row" style="padding-top: 40px">
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2" style="border-left: solid 3px #1cc88a;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Valor Total</div>
                                <div class="h5 mb-0 font-weight-bold ">
                                    R$ <?php print str_replace(".", ",", $soma_valor) ?> </div>
                            </div>
                            <div class="col-auto">
                                <svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-danger" onclick="excluirVenda()" id="exclui_btn" name="exclui_btn">Cancelar Venda</button>
                <button class="btn btn-success" onclick="concluirVenda($('#funcionario_select').val(), $('#cliente_select').val())" id="conclui_btn" name="conclui_btn">Concluir Venda</button>
            </div>

        </div>
    </div>

    <script>
        $('#venda').DataTable({
            "language": {
                "sProcessing": "Processando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Não foram encontrados resultados",
                "sEmptyTable": "Sem dados disponíveis nesta tabela",
                "sInfo": "Mostrando registros de _START_ a _END_ em um total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros de 0 a 0 de um total de 0 registros",
                "sInfoFiltered": "(filtrado de um total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Carregando...",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast": "Último",
                    "sNext": "Seguinte",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar de forma crescente",
                    "sSortDescending": ": Ordenar de forma decrescente"
                }
            }
        });
    </script>

</div>
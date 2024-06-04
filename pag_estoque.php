<title>Mercado MELB | Estoque</title>
<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$query = "SELECT id,nome,marca,preco_venda,embalagem,estoque,unidade FROM produtos";

$sql_query_produtos = mysqli_query($conect, $query);
$num_result = mysqli_num_rows($sql_query_produtos);

$acao = $_POST['acao'];

if ($acao = 'deletar') {

    $query_delete = "DELETE FROM `produtos` WHERE id = '$_POST[id_produto]'";

    $deletar = mysqli_query($conect, $query_delete);
    header("location:pag_estoque.php");
}

?>
<main>
    <div class="container-fluid">

        <div class="col-md-12 listagem-produtos">
            <h1 class="mt-4">Produtos em Estoque</h1>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 pb-5">
                        <button class="btn btn-primary" onclick="window.location.href='pag_cadastro_produtos.php'"><i class="fa fa-plus"></i> Cadastrar Novo Produto</button>
                    </div>
                    <div class="row">
                        <table class="table table table-bordered table-hover" id="dados">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Pre&ccedil;o de Venda</th>
                                    <th scope="col">Embalagem</th>
                                    <th scope="col">Quantidade em Estoque</th>

                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($num_result == 0) { ?>

                                    <tr>
                                        <td colspan="7">N&atilde;o existem produtos cadastrados</td>
                                    </tr>
                                    <?php
                                } else {
                                    while ($dados = mysqli_fetch_array($sql_query_produtos)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php print $dados['id']; ?></th>
                                            <td><?php print $dados['nome']; ?></td>
                                            <td><?php print $dados['marca']; ?></td>
                                            <td>R$ <?php print $dados['preco_venda']; ?></td>
                                            <td><?php print $dados['embalagem']; ?> </td>
                                            <td><?php print $dados['estoque']; ?> Unidade<?php if ($dados['estoque'] > 1) print  "s" ?></td>

                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff" title="Editar" onclick="editaProduto(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

                                                <button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Editar" onclick="deletaProduto(<?php print $dados['id']; ?>)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>


<form name="edita_produto">
    <input type="hidden" name="id_produto" id="id_produto">
    <input type="hidden" name="acao" id="acao" value="editar">
</form>

<form name="deleta_produto">
    <input type="hidden" name="id_produto" id="deleta_produto">
    <input type="hidden" name="acao" id="acao" value="deletar">
</form>



<script>
    editaProduto = (id) => {
        document.edita_produto.id_produto.value = id;
        document.edita_produto.action = "edita_produto.php";
        document.edita_produto.method = "post";
        document.edita_produto.submit();
    }




    deletaProduto = (id) => {
        Swal.fire({
            text: "Tem certeza de que deseja excluir o produto ?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "N�o",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                document.deleta_produto.id_produto.value = id;
                document.deleta_produto.action = "pag_estoque.php";
                document.deleta_produto.method = "post";
                document.deleta_produto.submit();
            }
        });
        return false;
    }
</script>
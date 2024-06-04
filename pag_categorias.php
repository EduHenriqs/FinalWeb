<title>Mercado MELB | Estoque</title>
<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$query = "SELECT * FROM categorias";

$sql_query_categorias = mysqli_query($conect, $query);
$num_result = mysqli_num_rows($sql_query_categorias);

$acao = $_POST['acao'];

if ($acao = 'deletar') {

    $query_delete = "DELETE FROM `categorias` WHERE id = '$_POST[id_categoria]'";

    $deletar = mysqli_query($conect, $query_delete);
    header("location:pag_estoque.php");
}

?>
<main>
    <div class="container-fluid">

        <div class="col-md-12 listagem-categorias">
            <h1 class="mt-4">Categorias</h1>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 pb-5">
                        <button class="btn btn-primary" onclick="window.location.href='pag_cadastro_categorias.php'"><i class="fa fa-plus"></i> Cadastrar Nova Categoria</button>
                    </div>
                    <div class="row">
                        <table class="table table-bordered table-hover" id="dados">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($num_result == 0) { ?>

                                    <tr>
                                        <td colspan="7">N&atilde;o existem categorias cadastrados</td>
                                    </tr>
                                    <?php
                                } else {
                                    while ($dados = mysqli_fetch_array($sql_query_categorias)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php print $dados['id']; ?></th>
                                            <td><?php print $dados['categoria']; ?></td>
                                            <td><?php print $dados['descricao']; ?></td>

                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff" title="Editar" onclick="editaCategoria(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

                                                <button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Editar" onclick="deletaCategoria(<?php print $dados['id']; ?>)"><i class="fas fa-trash"></i></button>
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


<form name="edita_categoria">
    <input type="hidden" name="id_categoria" id="id_categoria">
    <input type="hidden" name="acao" id="acao" value="editar">
</form>

<form name="delete_categoria">
    <input type="hidden" name="id_categoria" id="delete_categoria">
    <input type="hidden" name="acao" id="acao" value="deletar">
</form>



<script>
    editaCategoria = (id) => {
        document.edita_categoria.id_categoria.value = id;
        document.edita_categoria.action = "pag_cadastro_categorias.php";
        document.edita_categoria.method = "post";
        document.edita_categoria.submit();
    }




    deletaCategoria = (id) => {
        Swal.fire({
            text: "Tem certeza de que deseja excluir o produto ?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "N�o",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                document.delete_categoria.id_categoria.value = id;
                document.delete_categoria.action = "pag_categorias.php";
                document.delete_categoria.method = "post";
                document.delete_categoria.submit();
            }
        });
        return false;
    }
</script>
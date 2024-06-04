<title>Mercado MELB | Cadastro de Produto</title>
<?php

session_name('mercado');
session_start();

include "includes/cabecalho.php";

$query_categorias = "SELECT id, categoria from categorias";
$resultado_categorias = mysqli_query($conect, $query_categorias);
?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Cadastro de Categorias</h1>
        <br>

        <form name="cadastro_produto" id="cadastro_produto">
            <div class="card">
                <div class="card-header">
                    Características
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-12">
                            <label for="nome_produto" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
                        </div>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-12">
                            <label for="marca_produto" class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricao" class="form-control"></textarea>
                        </div>
                    </div>


                </div>
                <div class="card-footer">

                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-danger me-3" type="button" onclick="window.location.href='pag_estoque.php'">Cancelar</button>
                        <button class="btn btn-success " type="button" onclick="verifica()">Cadastrar</button>  
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
</div>
</div>


<script>
    $(document).ready(function() {

        $('#preco_produto').mask('000.00');


        $('input[type=text]').on('focus', function() {
            const inputId = $(this).attr('id');
            const input = $('#' + inputId);
            input.on('input', function() {
                const value = input.val();
                const hasInvalidCharacters = /<|>|\(|\)|\/|\\|\.\.|\.|"|'|!|\?|\*|\-|\_|\+|@|#|%|¨|&|=|\[|\]|\|/.test(value);

                if (hasInvalidCharacters) {
                    Swal.fire("", 'O campo contém caracteres inválidos!', "warning");
                    // Se o campo contém caracteres inválidos, limpe o campo
                    input.val('');
                }
            });
        });
    });

    function verifica() {

        if (document.cadastro_produto.nome_produto.value == "") {

            Swal.fire("", "Preencha corretamente o campo Nome", "warning");
            document.cadastro.nome_produto.focus();
            return false;
        }

        if (document.cadastro_produto.marca_produto.value == "") {
            Swal.fire("", "Preencha corretamente o campo Marca", "warning");
            document.cadastro.marca_produto.focus();
            return false;
        }
        if (document.cadastro_produto.preco_produto.value == "") {
            document.cadastro_produto.preco_produto.focus();
            Swal.fire("", "Preencha corretamente o campo Preço Venda", "warning");
            return (false);
        }
        if (document.cadastro_produto.embalagem_produto.value == "") {
            document.cadastro_produto.embalagem_produto.focus();
            Swal.fire("", "Preencha corretamente o campo Embalagem", "warning");
            return (false);
        }
        if (document.cadastro_produto.codBarras_produto.value == "" || document.cadastro_produto.codBarras_produto.value < 9) {
            document.cadastro_produto.codBarras_produto.focus();
            Swal.fire("", "Verifique o campo Código de Barras", "warning");
            return (false);
        }
        if (document.cadastro_produto.estoque_produto.value == "") {
            document.cadastro_produto.estoque_produto.focus();
            Swal.fire("", "O campo Quantidade em Estoque não pode estar vazio", "warning");
            return (false);
        }
        if (document.cadastro_produto.unidade_produto.value == "") {
            document.cadastro_produto.unidade_produto.focus();
            Swal.fire("", "O campo Unidade não pode estar vazio", "warning");
            return (false);
        }

        if (document.cadastro_produto.categoria_produto.value == "") {
            document.cadastro_produto.categoria_produto.focus();
            Swal.fire("", "O campo Categoria do Protudo não pode estar vazio", "warning");
            return (false);
        }

        document.cadastro_produto.action = "insere_produto.php";
        document.cadastro_produto.method = "post";
        document.cadastro_produto.submit();
    }
</script>
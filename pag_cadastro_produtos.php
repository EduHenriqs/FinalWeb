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

        <h1 class="mt-4">Cadastro de Produtos</h1>
        <br>

        <form name="cadastro_produto" id="cadastro_produto">
            <div class="card">
                <div class="card-header">
                    Características
                </div>
                <div class="card-body">
                    <div class="row" style="padding: 10px;">

                        <div class="col-md-4">
                            <label for="nome_produto" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
                        </div>
                        <div class="col-md-4">
                            <label for="marca_produto" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca_produto" name="marca_produto">
                        </div>
                        <div class="col-md-4">
                            <label for="preco_produto" class="form-label">Preço Venda</label>
                            <input type="tel" class="form-control" id="preco_produto" name="preco_produto">
                        </div>



                        <div class="col-md-6">
                            <label for="embalagem_produto" class="form-label">Embalagem</label>
                            <input type="text" class="form-control" id="embalagem_produto" name="embalagem_produto">
                        </div>
                        <div class="col-md-6">
                            <label for="codBarras_produto" class="form-label">Código de Barras</label>
                            <input type="tel" class="form-control" id="codBarras_produto" name="codBarras_produto">
                        </div>



                        <div class="col-md-4">
                            <label for="estoque_produto" class="form-label">Quantidade em estoque</label>
                            <input type="tel" class="form-control" id="estoque_produto" name="estoque_produto">
                        </div>
                        <div class="col-md-4">
                            <label for="unidade_produto" class="form-label">Unidade</label>
                            <select class="form-select" aria-label="Default select example" id="unidade_produto" name="unidade_produto">
                                <option selected value="">Seleciona</option>
                                <option value="un">Unidade</option>
                                <option value="kg">Quilograma</option>
                                <option value="g">Grama</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="unidade_produto" class="form-label">Categoria do Produto</label>
                            <select class="form-select" aria-label="Default select example" id="categoria_produto" name="categoria_produto">
                                <option selected value="">Seleciona</option>
                                <?php while ($dados = mysqli_fetch_array($resultado_categorias)) { ?>
                                    <option value="<?php print $dados['id'] ?>"><?php print $dados['categoria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <input type="hidden" name="acao" id="acao" value="cadastrar">

                        <p>&nbsp;</p>
                        <div class="row buttons-cadastro">

                            <div class="col-md-12 d-flex justify-content-center">
                                <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>

                                <button class="btn btn-danger btn-lg" type="button" onclick = "window.location.href='pag_estoque.php'">Cancelar</button>
                            </div>
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
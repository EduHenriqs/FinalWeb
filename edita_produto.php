<?php
session_name('mercado');
session_start();
include "includes/cabecalho.php";
include "includes/conect.php";

$produto = $_POST['id_produto'];

if ($_POST['id_produto'] != "") {
    $query_busca = "SELECT 
                        produtos.nome, 
                        produtos.marca, 
                        produtos.preco_venda, 
                        produtos.embalagem, 
                        produtos.cod_barras, 
                        produtos.estoque, 
                        produtos.unidade, 
                        produtos.id_categorias, 
                        categorias.categoria 
                    FROM 
                        produtos 
                    INNER JOIN categorias 
                    ON produtos.id_categorias = categorias.id
                    WHERE 
                        produtos.id = $produto";
    $resultado_busca = mysqli_query($conect, $query_busca);
    $dados = mysqli_fetch_array($resultado_busca);
}

$query_categorias = "SELECT id, categoria from categorias";
$resultado_categorias = mysqli_query($conect, $query_categorias);

?>
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Atualização de Produto</h1>
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
                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php print $dados['nome'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="marca_prod" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca_prod" name="marca_produto" value="<?php print $dados['marca'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="preco_produto" class="form-label">Preço Venda</label>
                            <input type="tel" class="form-control" id="preco_produto" name="preco_produto" value="<?php print $dados['preco_venda'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="embalagem_produto" class="form-label">Embalagem</label>
                            <input type="text" class="form-control" id="embalagem_produto" name="embalagem_produto" value="<?php print $dados['embalagem'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="codBarras_produto" class="form-label">Código de Barras</label>
                            <input type="tel" class="form-control" id="codBarras_produto" name="codBarras_produto" value="<?php print $dados['cod_barras'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="estoque_produto" class="form-label">Quantidade em estoque</label>
                            <input type="tel" class="form-control" id="estoque_produto" name="estoque_produto" value="<?php print $dados['estoque'] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="unidade_produto" class="form-label">Unidade</label>
                            <select class="form-select" aria-label="Default select example" id="unidade_produto" name="unidade_produto">
                                <option selected value="<?php print $dados['unidade'] ?>">
                                    <?php
                                    if ($dados['unidade'] == 'un') {
                                        print "Unidade";
                                    } else if ($dados['unidade'] == 'kg') {
                                        print "Quilograma";
                                    } else {
                                        print "Grama";
                                    }
                                    ?>
                                </option>
                                <option>
                                <option value="un">Unidade</option>
                                <option value="kg">Quilograma</option>
                                <option value="g">Grama</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="categoria_produto" class="form-label">Categoria do Produto</label>
                            <select class="form-select" aria-label="Default select example" id="categoria_produto" name="categoria_produto">
                                <option selected value="<?php print $dados['id_categorias'] ?>"><?php print $dados['categoria'] ?></option>
                                <?php while ($dados_categoria = mysqli_fetch_array($resultado_categorias)) { ?>
                                    <option value="<?php print $dados_categoria['id'] ?>"><?php print $dados_categoria['categoria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="acao" id="acao" value="<?php print $acao ?>">
                        <input type="hidden" name="id_produto" id="id_produto" value="<?php print $produto ?>">            
                        <p>&nbsp;</p>
                        <div class="row buttons-cadastro">

                            <div class="col-md-12 d-flex justify-content-center">
                                <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>

                                <button class="btn btn-danger btn-lg" onclick='window.location.href="pag_estoque.php"' type="button">Cancelar</button>
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
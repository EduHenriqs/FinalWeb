<?php

include "includes/cabecalho.php";

?>


<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>
                <?php if ($_POST['id_produto'] != '') {
                    print "Editar";
                } else {
                    print "Cadastrar";
                } ?> Produto</h4>
        </div>
        <div class="card-body">
            <form name="cadastra_produto" id="cadastra_produto">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome_produto" id="nome_produto" require class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca_produto" id="marca_produto" require class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Categoria</label>
                        <select name="categoria_produto" id="categoria_produto" class="form-select">
                            <option value="">Selecione</option>
                            <?php

                            $query_categoria = "SELECT * FROM categorias";
                            $result_categoria = mysqli_query($conect, $query_categoria);

                            while ($dados_categoria = mysqli_fetch_array($result_categoria)) { ?>
                                <option value="<?php print $dados_categoria['id']; ?>"><?php print $dados_categoria['nome']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="id_produto" id="id_produto" value="<?php print $_POST['id']; ?>">
                    </div>
                    <div class="col-md-3 mt-3">
                        <label class="form-label">Valor</label>
                        <input type="text" name="valor_produto" id="valor_produto" require class="form-control">
                    </div>
                    <div class="col-md-9 text-end mt-5">

                        <button class="btn btn-primary" type="button" onclick="cadastrarProduto()">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php include "includes/rodape.php"; ?>

<script>
    cadastrarProduto = () => {

        var nome = $("#nome_produto").val();
        var marca = $("#marca_produto").val();
        var categoria = $("#categoria_produto").val();
        var valor = $("#valor_produto").val();
        var id_produto = $("#id_produto").val();

        if (nome == '') {
            Swal.fire("", "Favor preencher o campo Nome", "warning");
            return false;
        }

        if (marca == '') {
            Swal.fire("", "Favor preencher o campo Marca", "warning");
            return false;
        }

        if (categoria == '') {
            Swal.fire("", "Favor preencher o campo Categoria", "warning");
            return false;
        }

        if (valor == '' || valor == 0) {
            Swal.fire("", "Favor preencher o campo Valor", "warning");
            return false;
        }


        $.ajax({
            url: 'acao_produto.php',
            type: id_produto != "" ? 'put' : 'post',
            data: 'nome_produto=' + nome +
                '&marca_produto=' + marca +
                '&categoria_produto=' + categoria +
                '&valor_produto=' + valor +
                '&id_produto=' + id_produto,
            dataType: "html",
            success: function(resposta) {
                let response = (resposta).split("&");
                Swal.fire("", response[0], response[1])
                if (response[1] == 'success') {
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 1500);
                }
            }
        });



    }
</script>
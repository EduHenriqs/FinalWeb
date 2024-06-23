<?php include "includes/cabecalho.php";

if ($_POST['id'] != '') {
    $query = "SELECT nome FROM categorias WHERE id = '" . $_POST['id'] . "'";
    $result = mysqli_query($conect, $query);
    $dados = mysqli_fetch_array($result);
}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4><?php echo ($_POST['id'] != '') ? "Editar" : "Cadastrar"; ?> Categoria</h4>
        </div>
        <div class="card-body">
            <form name="cadastra_categoria" id="cadastra_categoria">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome_categoria" id="nome_categoria" class="form-control" value="<?php print $dados['nome'] ?>">
                        <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $_POST['id']; ?>">
                    </div>
                    <div class="col-md-6 mt-4 text-end">

                        <button class="btn btn-info" type="button" onclick="window.location.href='listagem_categorias.php'">Retornar</button>
                        <button class="btn btn-primary" type="button" onclick="cadastrarCategoria()">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "includes/rodape.php"; ?>

<script>
    function cadastrarCategoria() {
        var nome = $("#nome_categoria").val();
        var id_categoria = $("#id_categoria").val();
       
        if (nome == '') {
            Swal.fire("", "Favor preencher o campo Nome", "warning");
            return false;
        }

        $.ajax({
            url: 'acao_categoria.php',
            type: id_categoria ? 'PUT' : 'POST',
            data: {
                nome_categoria: nome,
                id_categoria: id_categoria
            },
            dataType: "html",
            success: function(resposta) {
                let response = resposta.split("&");
                Swal.fire("", response[0], response[1]);
                if (response[1] == 'success') {
                    setTimeout(function() {
                        window.location.href = "listagem_categorias.php";
                    }, 1500);
                }
            }
        });
    }
</script>
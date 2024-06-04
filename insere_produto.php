<?php
session_name('mercado');
session_start();

include "includes/cabecalho.php";
include "includes/conect.php";

$acao = $_POST['acao'];
$id_produto = $_POST['id_produto'];
$nome_produto = trim($_POST['nome_produto']);
$marca_produto = trim($_POST['marca_produto']);
$preco_produto = trim($_POST['preco_produto']);
$embalagem_produto = trim($_POST['embalagem_produto']);
$cod_barras = trim($_POST['codBarras_produto']);
$estoque_produto = trim($_POST['estoque_produto']);
$unidade_produto = trim($_POST['unidade_produto']);
$categoria_produto = trim($_POST['categoria_produto']);

if ($acao == 'cadastrar') {

    $query = "SELECT id FROM produtos WHERE cod_barras = '$cod_barras'";
    $result = mysqli_query($conect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        $erro = "Produto já cadastrado no sistema!";
    } else {

        $query_insere_produto = "INSERT INTO 
                                    produtos (id, nome, marca, preco_venda, embalagem, cod_barras, estoque, unidade, id_categorias)
                                VALUES('','$nome_produto','$marca_produto',$preco_produto,'$embalagem_produto',$cod_barras,$estoque_produto,'$unidade_produto',$categoria_produto)";                      
        $result_insere_produto = mysqli_query($conect, $query_insere_produto);
    }

} else{

        $query_ataliza_produto = "UPDATE 
                                    produtos 
                                SET 
                                    id = $id_produto, 
                                    nome = '$nome_produto',
                                    marca = '$marca_produto', 
                                    preco_venda = $preco_produto, 
                                    embalagem = '$embalagem_produto', 
                                    cod_barras = $cod_barras, 
                                    estoque = $estoque_produto,
                                    unidade = '$unidade_produto',
                                    id_categorias = $categoria_produto
                                WHERE id = $id_produto ";                        
        $result_atauliza_produto = mysqli_query($conect, $query_ataliza_produto);                            

}
?>

<form action="pag_estoque.php" method="post" name="volta" id="volta">
    <?php if ($erro != "") { ?>
        <input type="hidden" value="<?php $erro ?>" name="erro" id="erro">
    <?php } ?>
</form>

<script>
    $(document).ready(function() {
        Swal.fire("", "Produto cadastrado com sucesso", "success");
        setTimeout(function() {
            $('#volta').submit();
        }, 1500);

    });
</script>
<?php

include "includes/conect.php";

$id_produto = $_POST['id_produto'];
$produto = $_POST['nome_produto'];
$marca = $_POST['marca_produto'];
$categoria = $_POST['categoria_produto'];
$valor = str_replace(",", ".", $_POST['valor_produto']);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($produto == "") {
        print "Erro ao cadastrar produto no campo Nome !&warning";
        exit();
    }
    if ($marca == "") {
        print "Erro ao cadastrar produto no campo Marca !&warning";
        exit();
    }
    if ($categoria == "") {
        print "Erro ao cadastrar produto no campo Categoria !&warning";
        exit();
    }
    if ($valor == "") {
        print "Erro ao cadastrar produto no campo Valor !&warning";
        exit();
    }

    $query_atualiza_produto = "UPDATE produtos SET nome='produto', marca='$marca', categoria='$categoria', valor=$valor WHERE id = $id_produto";
    $result_atualiza_produto = mysqli_query($conect, $query_atualiza_produto);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($produto == "") {
        print "Erro ao cadastrar produto no campo Nome !&warning";
        exit();
    }
    if ($marca == "") {
        print "Erro ao cadastrar produto no campo Marca !&warning";
        exit();
    }
    if ($categoria == "") {
        print "Erro ao cadastrar produto no campo Categoria !&warning";
        exit();
    }
    if ($valor == "") {
        print "Erro ao cadastrar produto no campo Valor !&warning";
        exit();
    }

    $query_produto_existente = "SELECT COUNT(*) as existe FROM produtos WHERE nome = '$produto' and marca = '$marca' and categoria = '$categoria'";
    $result_produto_existente = mysqli_query($conect, $query_produto_existente);
    $dados_produto_existente = mysqli_fetch_array($result_produto_existente);

    if($dados_produto_existente['existe'] != 0){
        print 'Produto já cadastrado !&warning';
        exit();
    }


    $query_insere_produto = "INSERT INTO produtos (nome,marca,categoria,valor) VALUES('$produto', '$marca', '$categoria', '$valor')";

    $result_insere_produto = mysqli_query($conect, $query_insere_produto);

    $query_verifica_produto = "SELECT COUNT(*) as count FROM produtos WHERE nome = '$produto' and marca = '$marca'";
    $result_verifica_produto = mysqli_query($conect, $query_verifica_produto);
    $dados_verifica_produto = mysqli_fetch_array($result_verifica_produto);

    if ($dados_verifica_produto['count'] >= 1) {
        print 'Produto cadastrado com sucesso !&success';
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $query_deleta_produto = "DELETE FROM produtos WHERE id_produto = $id_produto";
    $result_deleta_produto = mysqli_query($conect, $query_deleta_produto);
}

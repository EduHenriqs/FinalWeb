<?php

include "includes/conect.php";


$_PUT = array();
$_DELETE = array();

function parse_raw_http_request($input)
{
    $a_data = array();
    $input = urldecode($input);
    parse_str($input, $a_data);
    return $a_data;
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'PUT') {
    $_PUT = parse_raw_http_request(file_get_contents('php://input'));
    $id_produto = $_PUT['id_produto'];
    $produto = $_PUT['nome_produto'];
    $marca = $_PUT['marca_produto'];
    $categoria = $_PUT['categoria_produto'];
    $valor = str_replace(",", ".", $_PUT['valor_produto']);
} elseif ($method == 'DELETE') {
    $_DELETE = parse_raw_http_request(file_get_contents('php://input'));

    $id_produto = $_DELETE['id'];
} elseif ($method == 'POST') {
    $id_produto = $_POST['id_produto'];
    $produto = $_POST['nome_produto'];
    $marca = $_POST['marca_produto'];
    $categoria = $_POST['categoria_produto'];
    $valor = str_replace(",", ".", $_POST['valor_produto']);
}



http_response_code(200);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($produto == "") {
        http_response_code(400);
        print "Erro ao atualizar produto no campo Nome!&warning";
        exit();
    }
    if ($marca == "") {
        http_response_code(400);
        print "Erro ao atualizar produto no campo Marca!&warning";
        exit();
    }
    if ($categoria == "") {
        http_response_code(400);
        print "Erro ao atualizar produto no campo Categoria!&warning";
        exit();
    }
    if ($valor == "") {
        http_response_code(400);
        print "Erro ao atualizar produto no campo Valor!&warning";
        exit();
    }

    $query_atualiza_produto = "UPDATE produtos SET nome='$produto', marca='$marca', categoria='$categoria', valor=$valor WHERE id = $id_produto";
    $result_atualiza_produto = mysqli_query($conect, $query_atualiza_produto);

    if ($result_atualiza_produto) {
        print 'Produto atualizado com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao atualizar produto!&warning';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($produto == "") {
        http_response_code(400);
        print "Erro ao cadastrar produto no campo Nome!&warning";
        exit();
    }
    if ($marca == "") {
        http_response_code(400);
        print "Erro ao cadastrar produto no campo Marca!&warning";
        exit();
    }
    if ($categoria == "") {
        http_response_code(400);
        print "Erro ao cadastrar produto no campo Categoria!&warning";
        exit();
    }
    if ($valor == "") {
        http_response_code(400);
        print "Erro ao cadastrar produto no campo Valor!&warning";
        exit();
    }

    $query_produto_existente = "SELECT COUNT(*) as existe FROM produtos WHERE nome = '$produto' and marca = '$marca' and categoria = '$categoria'";
    $result_produto_existente = mysqli_query($conect, $query_produto_existente);
    $dados_produto_existente = mysqli_fetch_array($result_produto_existente);

    if ($dados_produto_existente['existe'] != 0) {
        http_response_code(409);
        print 'Produto já cadastrado!&warning';
        exit();
    }

    $query_insere_produto = "INSERT INTO produtos (nome, marca, categoria, valor) VALUES ('$produto', '$marca', '$categoria', $valor)";
    $result_insere_produto = mysqli_query($conect, $query_insere_produto);

    $query_verifica_produto = "SELECT COUNT(*) as count FROM produtos WHERE nome = '$produto' and marca = '$marca'";
    $result_verifica_produto = mysqli_query($conect, $query_verifica_produto);
    $dados_verifica_produto = mysqli_fetch_array($result_verifica_produto);

    if ($dados_verifica_produto['count'] >= 1) {
        print 'Produto cadastrado com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao cadastrar produto!&warning';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (empty($id_produto)) {
        http_response_code(400);
        print "Erro ao deletar produto: ID do produto é obrigatório!&warning";
        exit();
    }

    $query_deleta_produto = "DELETE FROM produtos WHERE id = $id_produto";
    $result_deleta_produto = mysqli_query($conect, $query_deleta_produto);

    if ($result_deleta_produto) {
        print 'Produto deletado com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao deletar produto!&warning';
    }
}

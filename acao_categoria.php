<?php

include "includes/conect.php";
error_reporting(0);

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
    $id_categoria = $_PUT['id_categoria'];
    $nome_categoria = $_PUT['nome_categoria'];
} elseif ($method == 'DELETE') {
    $_DELETE = parse_raw_http_request(file_get_contents('php://input'));

    $id_categoria = $_DELETE['id'];
} elseif ($method == 'POST') {

    $nome_categoria = $_POST['nome_categoria'];
    $id_categoria = $_POST['id_categoria'];
}




http_response_code(200);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if (empty($id_categoria)) {
        http_response_code(400);
        print "Erro ao atualizar categoria: ID da categoria é obrigatório!&warning";
        exit();
    }
    if (empty($nome_categoria)) {
        http_response_code(400);
        print "Erro ao atualizar categoria no campo Nome!&warning";
        exit();
    }

    $query_atualiza_categoria = "UPDATE categorias SET nome='$nome_categoria' WHERE id = $id_categoria";
    $result_atualiza_categoria = mysqli_query($conect, $query_atualiza_categoria);

    if ($result_atualiza_categoria) {
        print 'Categoria atualizada com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao atualizar categoria!&warning';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($nome_categoria)) {
        http_response_code(400);
        print "Erro ao cadastrar categoria no campo Nome!&warning";
        exit();
    }

    $query_categoria_existente = "SELECT COUNT(*) as existe FROM categorias WHERE nome = '$nome_categoria'";
    $result_categoria_existente = mysqli_query($conect, $query_categoria_existente);
    $dados_categoria_existente = mysqli_fetch_array($result_categoria_existente);

    if ($dados_categoria_existente['existe'] != 0) {
        http_response_code(409);
        print 'Categoria já cadastrada!&warning';
        exit();
    }

    $query_insere_categoria = "INSERT INTO categorias (nome) VALUES('$nome_categoria')";
    $result_insere_categoria = mysqli_query($conect, $query_insere_categoria);

    $query_verifica_categoria = "SELECT COUNT(*) as count FROM categorias WHERE nome = '$nome_categoria'";
    $result_verifica_categoria = mysqli_query($conect, $query_verifica_categoria);
    $dados_verifica_categoria = mysqli_fetch_array($result_verifica_categoria);

    if ($dados_verifica_categoria['count'] >= 1) {
        print 'Categoria cadastrada com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao cadastrar categoria!&warning';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (empty($id_categoria)) {
        http_response_code(400);
        print "Erro ao deletar categoria: ID da categoria é obrigatório!&warning";
        exit();
    }

    $query_deleta_categoria = "DELETE FROM categorias WHERE id = $id_categoria";
    $result_deleta_categoria = mysqli_query($conect, $query_deleta_categoria);

    if ($result_deleta_categoria) {
        print 'Categoria deletada com sucesso!&success';
    } else {
        http_response_code(500);
        print 'Erro ao deletar categoria!&warning';
    }
}

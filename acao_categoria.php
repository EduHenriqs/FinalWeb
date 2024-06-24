<?php

include_once "includes/database.php";
include_once "src/Categoria.php";
include_once "includes/conect.php";
error_reporting(0);

$_PUT = array();
$_DELETE = array();

function parse_raw_http_request($input) {
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

$host = "localhost";
$username = "root";
$password = "";
$database = "cadastrinhocadastroso";

$db = new Database($host, $username, $password, $database);

$categoria = new Categoria($db);

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $resultado = $categoria->atualizarCategoria($id_categoria, $nome_categoria);
    print $resultado;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resultado = $categoria->cadastrarCategoria($nome_categoria);
    print $resultado;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $resultado = $categoria->deletarCategoria($id_categoria);
    print $resultado;
}

$db->__destruct();

?>
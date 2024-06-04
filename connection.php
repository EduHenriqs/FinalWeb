<?php

$host = "localhost";
$user = "root";
$password = "";
$bd = "teste";

$conn = mysqli_connect($host, $user, $password, $bd) or die(mysqli_connect_error());

mysqli_set_charset($conn, "utf8");

if (mysqli_connect_errno()) {
    echo "Falha na conexão com MySQL: " . mysqli_connect_error();
}

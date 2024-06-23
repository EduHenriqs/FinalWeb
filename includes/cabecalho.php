<?php
error_reporting(0);
include "conect.php";
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/fontawesome-all.min.css">

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom p-2">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Cadastrinho Cadastroso</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') print 'active'; ?>" aria-current="page">Produtos</a></li>
        <li class="nav-item"><a href="listagem_categorias.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'listagem_categorias.php') print 'active'; ?>">Categorias</a></li>
    </ul>
</header>
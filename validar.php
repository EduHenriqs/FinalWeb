<?php 
include "includes/conect.php";
session_name('mercado');
session_start();


 
$usuario = $_POST['id_usuario'];
$senha = ($_POST['senha_usuario']);


$query = "SELECT id, nome, senha FROM funcionarios WHERE id = ".$_POST['id_usuario']." ";


//print $query;

$result = mysqli_query($conect, $query);

$num_rows = mysqli_num_rows($result);
if ($num_rows >= 1 ) { 


$dados_usuario = mysqli_fetch_array($result);


if ($dados_usuario['id'] == $usuario &&  password_verify($senha,$dados_usuario['senha'])) {
    $_SESSION['usuario_id'] = $usuario; 
    $_SESSION['usuario_nome'] = $dados_usuario['nome'];
   
    if ($dados_usuario['id'] == 1000) {
        $_SESSION['admin'] = "s";
    } else {
        $_SESSION['admin'] = "n";
    }
    $_SESSION["logado"] = true;
   
    ?>
    <script>

        window.location.href= 'pag_estoque.php';
    </script>
    <?php
   
    //print_r($_SESSION);
} else {
    include "login.php";
    ?>
<script>
    Swal.fire("O login está incorreto", "", "warning");
    </script>
    <?php
}

} else {
    include "login.php";
 
    session_destroy();
 
    ?>
<script>
    Swal.fire("O login está incorreto", "", "warning");
    </script>
    <?php
}



?>


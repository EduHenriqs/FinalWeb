<title>Mercado MELB | Clientes</title>
<?php
session_name('mercado');
session_start();
include "includes/cabecalho.php";

$acao = $_POST['acao'];

if($acao = 'deletar'){

    $query_delete = "DELETE FROM clientes WHERE id = '" . $_POST["id_cli"]. "'";
    
    $deletar = mysqli_query($conect, $query_delete);
    header("Location: clientes.php");
}

?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-4">Clientes Cadastrados</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class = "col-md-12 pb-5">
                        <button class="btn btn-primary" onclick="window.location.href='pag_cadastro_cliente.php'"><i class ="fa fa-plus"></i> Cadastrar Novo Cliente</button>
                        </div>
                        <?php
                        include "includes/conect.php";
                        $query = "SELECT clientes.id,clientes.nome,cpf,telefone,email, cidades.cidade, cidades.estado FROM clientes 
                        INNER JOIN enderecos ON clientes.id_enderecos = enderecos.id
                        INNER JOIN cidades ON enderecos.id_cidades = cidades.id";

                        $result = mysqli_query($conect, $query);
                        $num_result = mysqli_num_rows($result);
                        ?>
                        <table class="table table table-bordered table-hover" id="dados">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">UF</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                                    while ($dados = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php print $dados['id']; ?></th>
                                            <td><?php print $dados['nome']; ?></td>
                                            <td><?php print $dados['cpf']; ?></td>
                                            <td><?php print $dados['telefone']; ?></td>
                                            <td><?php print $dados['email']; ?></td>
                                            <td><?php print $dados['cidade']; ?></td>
                                            <td><?php print $dados['estado']; ?></td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-warning btn-sm btn-circle" style="color: #fff; margin-right: 10px;" title="Editar" onclick="editaCliente(<?php print $dados['id']; ?>)"><i class="fas fa-pen"></i></button>

                                                <button type="button" class="btn btn-danger btn-sm btn-circle" style="color: #fff" title="Excluir" onclick="deletaCliente(<?php print $dados['id']; ?>)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>


<form name="edita_cliente">
    <input type="hidden" name="id_cli" id="id_cli">
    <input type="hidden" name="acao" id="acao" value="editar">
</form>

<form name="deleta_cliente">
    <input type="hidden" name="id_cli" id="deleta_cli">
    <input type="hidden" name="acao" id="acao" value="deletar">
</form>

<script>
    editaCliente = (id) => {
        document.edita_cliente.id_cli.value = id;
        document.edita_cliente.action = "pag_cadastro_cliente.php";
        document.edita_cliente.method = "post";
        document.edita_cliente.submit();
    }

    deletaCliente = (id) => {
        Swal.fire({
            text: "Tem certeza de que deseja remover esse cliente do sistema?",
            icon: 'question',
            showDenyButton: true,
            denyButtonText: "Não",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                document.deleta_cliente.id_cli.value = id;
                document.deleta_cliente.action = "clientes.php";
                document.deleta_cliente.method = "post";
                document.deleta_cliente.submit();
            }
        });
        return false;
    }

</script>
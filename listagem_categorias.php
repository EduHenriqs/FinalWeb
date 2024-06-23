<?php include "includes/cabecalho.php"; ?>

<div class="p-5 mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Listagem de Categorias
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <a class="btn btn-primary" href="cadastra_categoria.php"><i class="fa fa-plus"></i> Adicionar Categorias</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dados">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nome
                                </th>

                                <th>
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT id, nome 
                            FROM categorias                        ";
                            $result = mysqli_query($conect, $query);

                            while ($dados = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php print $dados['id']; ?>
                                    </td>
                                    <td>
                                        <?php print $dados['nome']; ?>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning" onclick="editar('<?php print $dados['id']; ?>');"><i class="fa fa-edit"></i> Editar</button>
                                        <button class="btn btn-danger" onclick="deletar('<?php print $dados['id']; ?>', 'categoria');"><i class="fa fa-trash"></i> Deletar</button>
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

<form id="form_editar" name="form_editar" method="post" action="cadastra_categoria.php">
    <input type="hidden" name="id" id="id">
</form>

<?php include "includes/rodape.php"; ?>
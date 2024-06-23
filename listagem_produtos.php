<div class="p-5 mt-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Listagem de Produtos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-end">
                        <button class="btn btn-primary" onclick="adicionarProduto()"><i class="fa fa-plus"></i> Adicionar Produto</button>
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
                                    Marca
                                </th>
                                <th>Categoria
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT produtos.id, produtos.nome AS nome_produto, marca, categorias.nome AS nome_categoria, valor 
                            FROM produtos 
                            INNER JOIN categorias 
                            ON produtos.categoria = categorias.id";
                            $result = mysqli_query($conect, $query);

                            while ($dados = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td>
                                        <?php print $dados['id']; ?>
                                    </td>
                                    <td>
                                        <?php print $dados['nome_produto']; ?>
                                    </td>
                                    <td>
                                        <?php print $dados['marca']; ?>
                                    </td>
                                    <td>
                                        <?php print $dados['nome_categoria']; ?>
                                    </td>
                                    <td>
                                        <?php print str_replace('.', ',', $dados['valor']); ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editarProduto('<?php print $dados['id']; ?>', 'produto');"><i class="fa fa-edit"></i> Editar</button>
                                        <button class="btn btn-danger" onclick="deletarProduto('<?php print $dados['id']; ?>', 'produto');"><i class="fa fa-trash"></i> Deletar</button>
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
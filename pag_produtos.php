<?php 

session_name('mercado');    
session_start();

include "includes/cabecalho.php";


?>

<link rel="stylesheet" href="css/pag_estoque.css">
<main>
<div class="container-fluid">
    
<h1 class="mt-4">Cadastro de Produtos</h1>
                      <br>
                      
    <form name = "cadastro" id = "cadastro" >
    <div class=  "card">
        <div class = "card-header">
            Características
        </div>
    <div class="card-body">
    <div class="row"  style="padding: 10px;">
    
        <div class="col-md-4">
            <label for="nome_prod" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome_prod" name = "nome_prod">
        </div>
        <div class="col-md-4">
            <label for="marca_prod" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca_prod" name = "marca_prod">
        </div>
        <div class="col-md-4">
            <label for="preco_prod" class="form-label">Preço Venda</label>
            <input type="text" class="form-control" id="preco_prod" name = "preco_prod">
        </div>


 
<div class="col-md-6">
            <label for="embalagem_prod" class="form-label">Embalagem</label>
            <input type="text" class="form-control"id="embalagem_prod" name="embalagem_prod">
        </div>
        <div class="col-md-6">
            <label for="codBarras_prod" class="form-label">Código de Barras</label>
            <input type="text" class="form-control"id="codBarras_prod" name="codBarras_prod">
</div>            
           
        
        
        <div class="col-md-6">
            <label for="estoque_prod" class="form-label">Estoque</label>
            <input type="text" class="form-control" id="estoque_prod" name="estoque_prod">
        </div>
        <div class="col-md-6">
            <label for="unidade_prod" class="form-label">Unidade</label>
            <select class="form-select" aria-label="Default select example" id="unidade_prod" name="unidade_prod">
                <option selected>Seleciona</options>    
                <option value="Un">Unidade</options>
                <option value="KG">Quilograma</options>
                <option              value="G">Grama</options>
            </select>
        </div>
        
       
        <p>&nbsp;</p>
    <div class="row buttons-cadastro">

            <div class="col-md-12 d-flex justify-content-center">
                <button class="btn btn-success btn-lg me-3" type="button" onclick="verifica()">Cadastrar</button>
        
                <button class="btn btn-danger btn-lg">Cancelar</button>
            </div>

  

        </div>
</div>
</div>
</form>
</div>
</main>
</div>
</div>


<script>


    verifica = () => {
	
		
    if (document.cadastro.nome_func.value == "" || document.cadastro.nome_func.value.length <= 3){
        document.cadastro.nome_func.focus();
        Swal.fire("", "Favor verificar o campo Nome!", "warning");
        return (false);
    }

    if (document.cadastro.cpf_func.value == "") {
        document.cadastro.cpf_func.focus();
        Swal.fire("", "Favor inserir um CPF válido!", "warning");
        return (false);
    }

    if (document.cadastro.rg_func.value == "" || document.cadastro.rg_func.value.length < 14) {
        document.cadastro.rg_func.focus();
        Swal.fire("", "Favor verificar com campo Telefone!", "warning");
        return (false);
    }

    if (document.cadastro.nascimento.func.value == "nada") {
        document.cadastro.nascimento.func.focus();
        Swal.fire("", "O campo Forma de Ingresso não pode estar em branco!", "warning");
        return (false);
    }	

    if (document.cadastro.sexo_func.value != "selecione") {
        document.cadastro.sexo_func.focus();
        Swal.fire("", "O campo Percentual não pode ser zero!", "warning");
        return (false);
    }
    
    if (document.cadastro.naturalidade.value == "" || document.cadastro.naturalidade.value.length <= 3) {
        document.cadastro.naturalidade.focus();
        Swal.fire("", "Favor verificar o campo Instituição anterior ou atual!", "warning");
        return (false);
    }

    if (document.cadastro.endereco.value == "" || document.cadastro.endereco.value.length <= 3) {
        document.cadastro.endereco.focus();
        Swal.fire("", "Favor verificar o campo Curso anterior ou atual!", "warning");
        return (false);
    }
    
    if (document.cadastro.nivel_ensino_func.value == "") {
        document.cadastro.nivel_ensino_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.celular_func.value == "") {
        document.cadastro.celular_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.email_func.value == "") {
        document.cadastro.email_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.senha_func.value == "") {
        document.cadastro.senha_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.obs_func.value == "") {
        document.cadastro.obs_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.efetivacao_func.value == "") {
        document.cadastro.efetivacao_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.departamento_func.value == "") {
        document.cadastro.departamento_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    if (document.cadastro.cargo_func.value == "") {
        document.cadastro.cargo_func.focus();
        Swal.fire("", "Favor selecionar Qual o curso pretendido!", "warning");
        return (false);
    }
    else{
        Swal.fire("", "Deu bom", "");
    }
}
</script>
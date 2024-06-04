<meta charset="iso-8859-i">
<link rel="stylesheet" href="css/login.css">
<script src= "includes/jquery/dist/jquery.js"></script>
<link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="includes/sb-admin/css/sb-admin-2.min.css">


<script src= "includes/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src = "includes/sb-admin/js/sb-admin-2.min.js"></script>

<script src="js/sweetalert2.all.min.js"></script>
<script src="https://kit.fontawesome.com/10a6d5e523.js" crossorigin="anonymous"></script>

<?php
// usuario = 1001
// senha = senha123

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
?>

<body class="bg-gradiente-login">
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="p-3">
                                    <div class="text-center">
                                        <span class="contact100-form-title">
                                <div class="css-1385o3z css-zjik7">
                                    <div class="css-1w47qe3 css-nocy99 css-zjik7">
                                        <div class="css-zxsb69" data-cy="explore-page-item">
                                            <div class="css-1dk7uo4">
                                                <img src="images/logo_melb.png" class="login-logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                           </span>
                                        <p style="height: 30px">&nbsp;</p>
                                    </div>
                                    <form id="form_login" action = "validar.php" method = "post"  name="form_login">
                                        <div class="form-group">
                                    
                                            <p style="height: 10px">&nbsp;</p>
                                            <div class="wrap-input100 " data-validate="Informe o Usu&aacute;rio">
                                                <label class="label-input100">Usu&aacute;rio</label>
                                                <input class="input100" required placeholder="Insira seu ID de Usu&aacute;rio" style="font-weight: normal" name="id_usuario" id="id_usuario" type="text" size="14">
                                                <span class="focus-input100"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p style="height: 10px">&nbsp;</p>
                                            <div class="wrap-input100" data-validate="Informe a Senha">
                                                <label class="label-input100">Senha</label>
                                                <input class="input100" required placeholder="Insira sua Senha" style="font-weight: normal" name="senha_usuario" id="senha_usuario" type="password">
                                                <span class="focus-input100"></span>
                                            </div>
                                        </div>
                                        <div class = "form-group">
                                            <p style = "height: 10px">&nbsp;</p>
                                                <div class = "container-contact100-form-btn"  >
                                                    <button  style = "font-weight: normal;" class = "contact100-form-btn" onclick="validar_login(); return false"  >Acessar</button>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 bg-login  d-lg-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</body>


<script type="text/javascript">
    validar_login = () => {
  
        if ($('#id_usuario').val() == "") {
            Swal.fire("O campo de Usu&aacute;rio n&atilde;o pode estar vazio", "", "warning");
            $('#id_usuario').focus(false);
            return false;
            
        }

        if ($('#senha_usuario').val() == "") {
            Swal.fire("O campo de Senha n&atilde;o pode estar vazio", "", "warning");
            $('#senha_usuario').focus(false);
            return false;
           
        }

        $('#form_login').submit();
    }

</script>


<?php 
if ($_GET['mensagem'] != "") {
    
    $_GET['mensagem'] = str_replace("%E3", "&atilde;", urlencode($_GET['mensagem']));
    $_GET['mensagem'] = str_replace('+', " ", $_GET['mensagem']);
?>
    <script type = "text/javascript">
        Swal.fire("<?php print $_GET['mensagem'] ?>", "", "error");
    </script>

<?php

}
?>
</meta>
<?php 
require_once('inc/header.php'); 
require_once('inc/usuario.php');
if(!$usuario->usuarioLogado()):
?>

<div class="container">

    <div class="col-xs-12">
        <h1>Cadastro</h1>        
    </div>

    <div class="col-xs-6">
        <form role="form" id="form-cadastro-usuario">
            <div class="form-group">
                <label for="user_nome" class="label-control">Nome:</label>
                <input type="text" placeholder="Digite seu nome" class="form-control" id="user_nome" name="user_nome" required>                    
            </div>
            <div class="form-group">
                <label for="user_sobrenome" class="label-control">Sobrenome:</label>
                <input type="text" placeholder="Digite seu sobrenome" class="form-control" id="user_sobrenome" name="user_sobrenome" required>
            </div>
            <div class="form-group has-feedback" id="form-group-email">
                <label for="user_email" class="label-control">E-mail:</label>
                <input type="email" placeholder="Digite seu e-mail" class="form-control" id="user_email" name="user_email" required>                    
                <span class="form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label for="user_idade" class="label-control">Idade:</label>
                <input type="text" placeholder="Digite sua idade" class="form-control" id="user_idade" name="user_idade">                    
            </div>
            <div class="form-group">
                <label for="user_sexo" class="label-control">Sexo:</label>
                <select class="form-control" id="user_sexo" name="user_sexo">
                    <option></option>
                    <option value="0">Masculino</option>
                    <option value="1">Feminino</option>
                </select>                
            </div>
            <div class="form-group">
                <label for="user_senha" class="label-control">Senha:</label>
                <input type="password" placeholder="Digite sua senha" class="form-control" id="user_senha" name="user_senha" required>                    
            </div>
            <div class="form-group">
                <input type="button" value="Cadastrar!" class="btn btn-success" id="btn_user_cadastro" />
            </div>
            <span class="help-block"></span>
        </form>
    </div>

</div><!-- /.container -->
<?php 
else:     
?>
<div class="container">
    <h1>Ops!</h1>
    <p>Você não tem acesso a essa página.</p>    
</div><!-- /.container -->
<?php
endif; //login check 

require_once('inc/footer.php'); 
?>
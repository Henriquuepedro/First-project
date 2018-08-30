<style type="text/css">
    .form-div label{
        text-align: left
    }
</style>
<div style="margin-top: 20px" align="center">
    <?php if(!empty($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
    <br>
	<fieldset class="central">
        <h2>Fazer Login</h2>
        <p><strong>Informe seus dados para acessar sua conta</strong></p>
        <form action="cad.php" method="post" enctype="multipart/form-data">
			<div class="form-div">
                <label class="form-label">Usuário</label><br>
                <input type="text" name="user" placeholder="Endereço de E-Mail ou Usuário" class="form-input">
                <div id="div_login"></div>
            </div>
            <div class="form-div">
            	<label class="form-label">Senha</label><br>
                <input type="password" name="senha" placeholder="Senha" class="form-input">
                <div id="div_senha"></div>
            </div>
            <br>
            <input type="submit" name="entrar" value="Entrar" class="botao">
        </form>
	</fieldset>
</div>
<?php
    unset($_SESSION['msg']);
?>
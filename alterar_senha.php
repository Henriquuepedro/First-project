<?php 
 if(isset($_SESSION['ID'])){
?>
<div style="margin-top: 20px" align="center">
    <?php if(!empty($_SESSION['msg_alt'])){ echo $_SESSION['msg_alt']; } ?>
    <br>
    <fieldset class="central">
        <h2>Alterar Senha</h2>
        <form action="cad.php" method="post" enctype="multipart/form-data">
            <div class="form-div">
                <label class="form-label" style="width: 30%;text-align: left;padding-left: 5px">Senha Atual</label><br>
                <input type="password" name="senha_atual" placeholder="Digite a Senha Atual" class="form-input">
            </div>
            <div class="form-div">
                <label class="form-label" style="width: 30%;text-align: left;padding-left: 5px">Nova Senha</label><br>
                <input type="password" name="nova_senha" placeholder="Digite a Nova Senha" class="form-input">
            </div>
            <br>
            <input type="submit" name="alt_senha" value="Alterar" class="botao">
        </form>
    </fieldset>
</div>
<?php
}else{
    header("Location: index.php?url=login");
}
unset($_SESSION['msg_alt']);
?>
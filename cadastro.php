<div style="margin-top: 20px" align="center">
	<fieldset class="central-cadastro">
        <h2>Cadastre uma nova conta</h2>
        <p>Preenche os campos com seus dados para completar o cadastro</p>
        <form onsubmit="return checkForm()" action="cad.php" method="post" enctype="multipart/form-data">
            <br>
            <p style="float: left;color: #fff;font-weight: bold;">Dados Pessoais</p>
            <hr style="border: 1px solid #fff; margin-top: 30px" width="90%" align="right">
            <br>
			<div class="form-div">
                <label class="form-label">Nome Completo <font color="red">*</font> </label>
                <input type="text" name="nome" id="nome" placeholder="Informe seu nome completo" class="form-input">
                <label class="form-label"></label>
                <div id="div_nome" class="div-erro"></div>
            </div>
            <div class="form-div">
                <label class="form-label">Telefone <font color="red">*</font></label>
                <input maxlength="12" type="text" name="tel" id="tel" placeholder="Informe seu Telefone" class="form-input">
                <label class="form-label"></label>
                <div class="div-erro" id="div_tel"></div>
            </div>
            <div class="form-div">
                <label class="form-label">CPF <font color="red">*</font></label>
                <input maxlength="11" type="text" name="cpf" id="cpf" placeholder="Informe seu CPF" class="form-input">
                <label class="form-label"></label>
                <div class="div-erro" id="div_cpf"></div>
            </div>
            <div class="form-div">
                <label class="form-label">E-mail <font color="red">*</font></label>
                <input type="text" name="email" id="email" placeholder="Informe seu E-mail" class="form-input">
                <label class="form-label"></label>
                <div class="div-erro" id="div_email"></div>
            </div>            
            <p style="float: left;color: #fff;font-weight: bold;">Dados Adicionais</p>
            <hr style="border: 1px solid #fff; margin-top: 45px" width="90%" align="right">
            <br>
            <div class="form-div">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" placeholder="Informe seu Endereço" class="form-input">
            </div>   
            <div class="form-div">
                <label class="form-label">Número</label>
                <input maxlength="10" type="text" name="num" placeholder="Informe o Número" class="form-input">
            </div>   
            <div class="form-div">
                <label class="form-label">CEP</label>
                <input maxlength="11" type="text" name="cep" placeholder="Informe seu CEP" class="form-input">
            </div>
            <div class="form-div">
                <label class="form-label">Bairro</label>
                <input type="text" name="bairro" placeholder="Informe seu Bairro" class="form-input">
            </div>
            <div class="form-div">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" placeholder="Informe seu Cidade" class="form-input">
            </div>  
            <div class="form-div">
                <label class="form-label">Estado</label>
                <input type="text" name="estado" placeholder="Informe seu Estado" class="form-input">
            </div>  
            <div class="form-div">
                <label class="form-label">País</label>
                <input type="text" name="pais" placeholder="Informe seu País" class="form-input">
            </div>   


            <p style="float: left;color: #fff;font-weight: bold;">Dados da Conta</p>
            <hr style="border: 1px solid #fff; margin-top: 45px" width="90%" align="right">
            <br>
            <div class="form-div">
                <label class="form-label">Usuário <font color="red">*</font></label>
                <input type="text" name="user" id="user" placeholder="Informe o nome de usuário" class="form-input">
                <label class="form-label"></label>
                <div class="div-erro" id="div_user"></div>
            </div>
            <div class="form-div">
                <label class="form-label">Senha <font color="red">*</font></label>
                <input type="password" name="senha" id="senha" placeholder="Informe uma senha" class="form-input">
                <label class="form-label"></label>
                <div class="div-erro" id="div_senha"></div>
            </div>
            <br>
            <input type="submit" name="cadastro" value="Cadastrar" class="botao" onclick="return checkForm()">
        </form>
	</fieldset>
</div>
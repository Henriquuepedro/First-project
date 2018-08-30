<?php 
	$cod_user = $_SESSION['ID'];

	if(isset($cod_user)){
		$sql_info = "SELECT NOME,TEL,CPF,ENDERECO,NUMERO,CEP,BAIRRO,CIDADE,ESTADO,PAIS,EMAIL,USER FROM USUARIO WHERE NCODUSER = '$cod_user'";
		$query_info = mysqli_query($conn, $sql_info);
		$resultado_info = mysqli_fetch_assoc($query_info);
		$nome = $resultado_info['NOME'];
		$tel = $resultado_info['TEL'];
		$cpf = $resultado_info['CPF'];
		$endereco = $resultado_info['ENDERECO'];
		$numero = $resultado_info['NUMERO'];
		$cep = $resultado_info['CEP'];
		$bairro = $resultado_info['BAIRRO'];
		$cidade = $resultado_info['CIDADE'];
		$estado = $resultado_info['ESTADO'];
		$pais = $resultado_info['PAIS'];
		$email = $resultado_info['EMAIL'];
		$user = $resultado_info['USER'];
	?>
	<h1 align="center">Bem vindo, <?php echo $user ?></h1>
	<div style="width: 20%;float: left;height: 400px" class="corpo">
		<h3 class="menu-acc-small">MENU</h3>
		<div class="menu-account">
			<a href="index.php?url=carrinho">Carrinho de Pedidos</a><br>
			<a href="index.php?url=pedidos">Histórico de Pedidos</a><br>
			<a href="index.php?url=alterar_senha">Alterar Senha</a><br>
			<a href="index.php?url=logout">Sair</a>
			<?php
				if($_SESSION['NIVEL'] == 2){
					echo '
			<hr>
			<p align="center" style="color: red;font-weight: bold">Acesso Administrador</p>
			<a href="index.php?url=mercadorias_adm">Mercadorias</a><br>
			<a href="index.php?url=clientes">Clientes</a><br>
			<a href="index.php?url=pedidos_adm">Pedidos Clientes</a>';
		}
			?>
		</div>
	</div>
	<div style="width: 80%;margin-top:40px;font-size: 15px" class="corpo">
		<p><u>Nome</u>: <?php echo $nome ?></p>
		<p><u>CPF</u>: <?php echo $cpf ?></p>
		<p><u>Telefone</u>: <?php echo $tel ?></p>
		<p><u>E-mail</u>: <?php echo $email ?></p>
		<p><u>CEP</u>: <?php echo $cep ?></p>
		<p><u>Endereço</u>: <?php echo $endereco ?></p>
		<p><u>Número</u>: <?php echo $numero ?></p>
		<p><u>Bairro</u>: <?php echo $bairro ?></p>
		<p><u>Cidade</u>: <?php echo $cidade ?></p>
		<p><u>Estado</u>: <?php echo $estado ?></p>
		<p><u>Pais</u>: <?php echo $pais ?></p>
	</div>
<?php
	}else{
		header("Location: index.php?url=login");
	}
	unset($_SESSION['msg']);
?>
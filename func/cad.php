<?php
	if(isset($_POST['cadastro'])){

		$nome = $_POST['nome'];
		$tel = $_POST['tel'];
		$cpf = $_POST['cpf'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$cep = $_POST['cep'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$pais = $_POST['pais'];
		$email = $_POST['email'];
		$user = $_POST['user'];
		$senha = $_POST['senha'];
		$senha_cryp = sha1($senha);

		$sql_cad_user = "INSERT INTO USUARIO (NOME,TEL,CPF,ENDERECO,NUMERO,CEP,BAIRRO,CIDADE,PAIS,EMAIL,USER,SENHA) VALUES ('$nome', '$tel', '$cpf', '$endereco', '$numero', '$cep', '$bairro', '$cidade', '$pais', '$email', '$user', '$senha_cryp')";
		$query_cad_user = mysqli_query($conn, $sql_cad_user);
	}

?>
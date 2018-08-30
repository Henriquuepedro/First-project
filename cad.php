<?php
	session_start();
	include('conexao.php');

	if(isset($_POST['cadastro'])){

		$nome = $_POST['nome'];
		$tel = $_POST['tel'];
		$cpf = $_POST['cpf'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['num'];
		$cep = $_POST['cep'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$pais = $_POST['pais'];
		$email = $_POST['email'];
		$user = $_POST['user'];
		$senha = $_POST['senha'];
		$senha_cryp = sha1($senha);

		$sql_cad_user = "INSERT INTO usuario (NOME,TEL,CPF,ENDERECO,NUMERO,CEP,BAIRRO,CIDADE,ESTADO,PAIS,EMAIL,USER,SENHA,NIVEL) VALUES ('$nome', '$tel', '$cpf', '$endereco', '$numero', '$cep', '$bairro', '$cidade', '$estado', '$pais', '$email', '$user', '$senha_cryp', '1')";
		$query_cad_user = mysqli_query($conn, $sql_cad_user);
		$_SESSION['msg'] = '<div align="center" class="msg-sucesso">Cadastro realizado com sucesso!</div>';
	    header("Location: index.php?url=login");
	}

	if(isset($_POST['entrar'])){
	  $usuario = $_POST['user'];
	  $senhaa = $_POST['senha'];
	  $senha = (sha1($senhaa));
	  if((isset($usuario)) AND (isset($senha))){
	    $result_usuario = "SELECT NCODUSER, NOME , EMAIL, USER, SENHA, NIVEL FROM usuario WHERE EMAIL='$usuario' OR USER='$usuario'";
	    $resultado_usuario = mysqli_query($conn, $result_usuario);
	    $count = mysqli_num_rows($resultado_usuario);
	    if($count > 0){
	      $row_usuario = mysqli_fetch_assoc($resultado_usuario);
	      if($senha == $row_usuario['SENHA']){
	        $_SESSION['ID'] = $row_usuario['NCODUSER'];
	        $_SESSION['USER'] = $row_usuario['USER'];
	        $_SESSION['NOME'] = $row_usuario['NOME'];
	        $_SESSION['NIVEL'] = $row_usuario['NIVEL'];
	        $_SESSION['EMAIL'] = $row_usuario['EMAIL'];
	        $_SESSION['msg'] = "";
	        header("Location: index.php?url=account");
	      }else{
	        $_SESSION['msg'] = '<div align="center" class="msg-erro">Senha digitada é inválida</div>';
	        header("Location: index.php?url=login");
	      }
	    }else{
	      $_SESSION['msg'] = '<div align="center" class="msg-erro">Nome de usuário ou E-mail não encontrado</div>';
	      header("Location: index.php?url=login");
	    }
	  }else{
	    $_SESSION['msg'] = '<div align="center" class="msg-erro">Dados incorretos, não foram encontrado registros!</div>';
	    header("Location: index.php?url=login");
	  }
	}

	if((isset($_POST['adicionar_cart'])) || (isset($_POST['adicionar_cart_prod'])) || (isset($_POST['adicionar_cart_home']))){

		$nome_merc = $_POST['nome_merc'];
		$ref = $_POST['ref'];
		$quantidade = $_POST['quantidade'];
		$valor = $_POST['valor'];
		$codmerc = $_POST['codmerc'];
		$coduser = $_POST['coduser'];
		$imagem = $_POST['imagem'];

		if(isset($_SESSION['ID'])){

			$sql_vef_qnt = "SELECT NCODCARRINHO,QUANTIDADE,NCODUSER FROM carrinho WHERE NCODUSER = $coduser AND NCODMERCADORIA = $codmerc";
			$query_verf_qnt = mysqli_query($conn, $sql_vef_qnt);
			$cont_qnt = mysqli_num_rows($query_verf_qnt);


			if($cont_qnt > 0){
				$resultado_qnt = mysqli_fetch_assoc($query_verf_qnt);
				$quantidade = ($quantidade + $resultado_qnt['QUANTIDADE']);
				$sql_cart = "UPDATE carrinho SET QUANTIDADE = '$quantidade' WHERE NCODCARRINHO = ".$resultado_qnt['NCODCARRINHO'];
				$querycart = mysqli_query($conn, $sql_cart);
			}else{
				$sql_cart = "INSERT INTO carrinho (NOME_CART,REF,QUANTIDADE,VALOR,NCODMERCADORIA,NCODUSER,IMAGEM) VALUES ('$nome_merc', '$ref', '$quantidade', '$valor', '$codmerc', '$coduser', '$imagem')";
				$querycart = mysqli_query($conn, $sql_cart);
			}
			if(isset($_POST['adicionar_cart'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-sucesso">Mercadoria adicionar com sucesso ao carrinho!</div>';
				header("Location: index.php?url=mercadoria&COD=".$codmerc);
			}elseif(isset($_POST['adicionar_cart_prod'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-sucesso">Mercadoria adicionar com sucesso ao carrinho!</div>';		
				header("Location: index.php?url=produtos");
			}elseif(isset($_POST['adicionar_cart_home'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-sucesso">Mercadoria adicionar com sucesso ao carrinho!</div>';		
				header("Location: index.php?url=home");
			}
		}else{
			if(isset($_POST['adicionar_cart'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-erro">Você precisa <a style="color:white" href="index.php?url=login">entrar</a> para adicionar ao carrinho!</div>';
				header("Location: index.php?url=mercadoria&COD=".$codmerc);
			}elseif(isset($_POST['adicionar_cart_prod'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-erro">Você precisa <a style="color:white" href="index.php?url=login">entrar</a> para adicionar ao carrinho!</div>';			
				header("Location: index.php?url=produtos");
			}elseif(isset($_POST['adicionar_cart_home'])){
				$_SESSION['msg_cart'] = '<div align="center" class="msg-erro">Você precisa <a style="color:white" href="index.php?url=login">entrar</a> para adicionar ao carrinho!</div>';			
				header("Location: index.php?url=home");
			}
		}
	}


	if(isset($_POST['del_cart'])){

		$id = $_POST['id_merc'];
		$sql_del_cart = "DELETE FROM carrinho WHERE NCODCARRINHO = $id";
		$query_del_cart = mysqli_query($conn, $sql_del_cart);
		header("Location: index.php?url=carrinho");
	}

	if(isset($_POST['fim_pedido'])){

		$coduser = $_SESSION['ID'];

		$sql_fim_pedido = "SELECT * FROM carrinho WHERE NCODUSER = $coduser";
		$query_fim_pedido = mysqli_query($conn, $sql_fim_pedido);

		$sql_ult = "SHOW TABLE STATUS LIKE 'pedido_finalizado'";
		$result_ultimo= mysqli_query($conn, $sql_ult);
		$resultado_ultimo = mysqli_fetch_assoc($result_ultimo);
		$ultimo = $resultado_ultimo['Auto_increment'];
		$vlr_final = 0;
		$qnt_final = 0; 

		while ($resultado_fim_pedido = mysqli_fetch_assoc($query_fim_pedido)){
			$id_cart = $resultado_fim_pedido['NCODCARRINHO'];
			$nome_merc = $resultado_fim_pedido['NOME_CART'];
			$ref = $resultado_fim_pedido['REF'];
			$quantidade = $resultado_fim_pedido['QUANTIDADE'];
			$valor = $resultado_fim_pedido['VALOR'];
			$codmerc = $resultado_fim_pedido['NCODMERCADORIA'];
			$imagem = $resultado_fim_pedido['IMAGEM'];

			$vlr_final = ($vlr_final + ($valor * $quantidade));
			$qnt_final = ($qnt_final + $quantidade);

			$sql_inc_fim_item = "INSERT INTO itens_pedido_finalizado (NCODPEDIDO, QNT_PEDIDO, VALOR_PEDIDO, NCODUSER, NCODMERCADORIA, NOME_MERC, REF, IMAGEM) VALUES ('$ultimo', '$quantidade', '$valor', '$coduser', '$codmerc', '$nome_merc', '$ref', '$imagem')";
			$query_inc_fim_item = mysqli_query($conn, $sql_inc_fim_item);

			$sql_del_fim = "DELETE FROM carrinho WHERE NCODCARRINHO = $id_cart";
			$query_del_fim = mysqli_query($conn, $sql_del_fim);
		}
		$sql_inc_fim = "INSERT INTO pedido_finalizado (VALOR_PEDIDO, QNT_PEDIDO, NCODUSER, DATA) VALUES ('$vlr_final', '$qnt_final', '$coduser', NOW())";
		$query_inc_fim = mysqli_query($conn, $sql_inc_fim);
		header("Location: index.php?url=pedidos");

	}

	if(isset($_POST['alt_senha'])){

		$coduser = $_SESSION['ID'];
		$senha_atual = $_POST['senha_atual'];
		$nova_senha = $_POST['nova_senha'];

		$senha_atual_cryp = sha1($senha_atual);
		$nova_senha_cryp = sha1($nova_senha);

		if(strlen($nova_senha) >= 6 ){
			$sql_verf_senha = "SELECT * FROM usuario WHERE NCODUSER = '$coduser' AND SENHA = '$senha_atual_cryp'";
			$query_verf_senha = mysqli_query($conn, $sql_verf_senha);
			$resultado = mysqli_num_rows($query_verf_senha);

			if($resultado > 0){

				$sql_alt_senha = "UPDATE usuario SET SENHA = '$nova_senha_cryp' WHERE NCODUSER = '$coduser'";
				$query_alt_senha = mysqli_query($conn, $sql_alt_senha);
				$_SESSION['msg_alt'] = '<div align="center" class="msg-sucesso">Senha alterada com sucesso!</div>';
				header("Location: index.php?url=alterar_senha");
			}else{
				$_SESSION['msg_alt'] = '<div align="center" class="msg-erro">As senhas não conferem!</div>';
				header("Location: index.php?url=alterar_senha");	
			}
		}else{
			$_SESSION['msg_alt'] = '<div align="center" class="msg-erro">A nova senha deve conter mais que 6 caracteres!</div>';
			header("Location: index.php?url=alterar_senha");
		}
	}

	if(isset($_POST['excluir_merc'])){

		$id = $_POST['codmerc'];
		$sql_del_merc = "DELETE FROM mercadoria WHERE NCODMERCADORIA = $id";
		$query_del_merc = mysqli_query($conn, $sql_del_merc);
		$_SESSION['msg_merc'] = '<div align="center" class="msg-sucesso">Mercadoria excluída com sucesso!</div>';
		header("Location: index.php?url=mercadorias_adm");
	}

	if(isset($_POST['alterar_merc'])){

		$id = $_POST['codmerc'];
		$nome_merc = $_POST['nome_merc'];
		$ref = $_POST['ref'];
		$valor = $_POST['valor'];
		$descricao = $_POST['descricao'];
		$imagem = $_POST['imagem'];

		$sql_alt_merc = "UPDATE mercadoria SET NOME_MERC = '$nome_merc', REF = '$ref', VALOR = '$valor', DESCRICAO = '$descricao', IMAGEM = '$imagem' WHERE NCODMERCADORIA  = '$id'";
		$query_alt_merc = mysqli_query($conn, $sql_alt_merc);
		$_SESSION['msg_merc'] = '<div align="center" class="msg-sucesso">Mercadoria alterada com sucesso!</div>';
		header("Location: index.php?url=mercadorias_adm");
	}

	if(isset($_POST['add_merc'])){

		$id = $_POST['codmerc'];
		$nome_merc = $_POST['nome_merc'];
		$ref = $_POST['ref'];
		$valor = $_POST['valor'];
		$descricao = $_POST['descricao'];
		$imagem = $_POST['imagem'];

		$sql_add_merc = "INSERT INTO mercadoria (NOME_MERC, REF, VALOR, DESCRICAO, IMAGEM) VALUES ('$nome_merc', '$ref', '$valor', '$descricao', '$imagem')";
		$query_add_merc = mysqli_query($conn, $sql_add_merc);
		$_SESSION['msg_merc'] = '<div align="center" class="msg-sucesso">Mercadoria Adicionada com sucesso!</div>';
		header("Location: index.php?url=mercadorias_adm");
	}

	if(isset($_POST['alt_cl'])){

		$id = $_POST['cod_user'];
		$nivel = 2;

		$sql_alt_user_c = "UPDATE usuario SET NIVEL = '$nivel' WHERE NCODUSER = '$id'";
		$query_alt_user_c = mysqli_query($conn, $sql_alt_user_c);
		$_SESSION['msg_user'] = '<div align="center" class="msg-sucesso">Usuário alterado com sucesso!</div>';
		header("Location: index.php?url=clientes");
	}

	if(isset($_POST['alt_adm'])){

		$id = $_POST['cod_user'];
		$nivel = 1;

		$sql_alt_user_a = "UPDATE usuario SET NIVEL = '$nivel' WHERE NCODUSER = '$id'";
		$query_alt_user_a = mysqli_query($conn, $sql_alt_user_a);
		$_SESSION['msg_user'] = '<div align="center" class="msg-sucesso">Usuário alterado com sucesso!</div>';
		header("Location: index.php?url=clientes");
	}

?>
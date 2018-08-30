	<?php 

	if(($_SESSION['NIVEL'] == 2)){

		if(isset($_GET['COD'])){
			$cod_merc = $_GET['COD'];
			$sql_merc = "SELECT NOME_MERC,REF,VALOR,DESCRICAO,IMAGEM FROM mercadoria WHERE NCODMERCADORIA = '$cod_merc'";
			$query_merc = mysqli_query($conn, $sql_merc);
			$resultado_merc = mysqli_fetch_assoc($query_merc);
			$nome_merc = $resultado_merc['NOME_MERC'];
			$ref = $resultado_merc['REF'];
			$valor = $resultado_merc['VALOR'];
			$descricao = $resultado_merc['DESCRICAO'];
			$imagem = $resultado_merc['IMAGEM'];
			$imagem_logo = $resultado_merc['IMAGEM'];
		}else{
			$nome_merc = '';
			$ref = '';
			$valor = '';
			$descricao = '';
			$imagem_logo = 'images/produtos/semfoto.jpg';
			$imagem = '';
		}
	?>
	<?php if(!empty($_SESSION['msg_cart'])){ echo $_SESSION['msg_cart']; } ?>
			<div class="corpo" style="margin-top: 20px">
				<a href="index.php?url=mercadorias_adm" class="botao"><i class="fa fa-chevron-left"></i> Voltar</a>
			</div>
		<div style="width: 32%;float: left;margin-bottom: 20px;margin-top: 30px" class="corpo">
			<div class="menu-account">
				<img width="400px" height="300px" src="<?php echo $imagem_logo ?>">
			</div>
		</div>
		<form action="cad.php" method="post" enctype="multipart/form-data">
			<div style="width: 95%;margin-top:30px;font-size: 20px;" class="corpo">
				<div>
					<label style="width: 7%;font-size:20px" class="form-label">Nome: </label> 
					<input type="text" name="nome_merc" value="<?php echo $nome_merc ?>" class="form-input" style="width: 40%" >
				</div>
				<div>
					<label style="width: 7%;font-size:20px" class="form-label">Ref: </label> 
					<input type="text" name="ref" value="<?php echo $ref ?>" class="form-input" style="width: 40%" >
				</div>
				<div>
					<label style="width: 7%;font-size:20px " class="form-label">Valor: </label>
					<input type="text" name="valor" value="<?php echo $valor ?>" class="form-input" style="width: 40%" >
				</div>
				<hr>
				<div>
					<label style="width: 7%;font-size:20px " class="form-label">Descrição: </label>
					<textarea type="text" name="descricao" class="form-input" style="width: 40%" rows="8" maxlength="400"><?php echo $descricao ?></textarea>
				</div>
				<div>
					<label style="width: 7%;font-size:20px " class="form-label">Imagem: </label>
					<input type="text" name="imagem" value="<?php echo $imagem ?>" class="form-input" style="width: 40%" ><br>
					<label style="width: 7%" class="form-label"></label>
					<label style="width: 7%;font-size:12px;color: red" class="form-input">Informe a URL da imagem</label>
				</div>
			</div>
			<input type="hidden" name="codmerc" value="<?php echo $cod_merc ?>">
			<?php
			if(isset($_GET['COD'])){
			?>
			<div align="" class="corpo" style="margin-top: 40px;float: left">
				<input class="botao-red" type="submit" name="excluir_merc" value="Excluir">
			</div>
			<div class="corpo" style="margin-top: 40px;margin-right: 17%" align="right">
				<input class="botao" type="submit" name="alterar_merc" value="Alterar">
			</div>
			<?php
		}else{
			?>
			<div class="corpo" style="margin-top: 40px;margin-right: 17%" align="right">
				<input class="botao" type="submit" name="add_merc" value="Adicionar">
			</div>
		<?php } ?>
		
		</form>
<?php
	}else{
		header("Location: index.php?url=account");
	}
	unset($_SESSION['msg_cart']);
?>
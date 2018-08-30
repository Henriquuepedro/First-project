<?php 
	$cod_merc = $_GET['COD'];

	if(isset($cod_merc)){
		$sql_merc = "SELECT NOME_MERC,REF,VALOR,DESCRICAO,IMAGEM FROM mercadoria WHERE NCODMERCADORIA = '$cod_merc'";
		$query_merc = mysqli_query($conn, $sql_merc);
		$resultado_merc = mysqli_fetch_assoc($query_merc);
		$nome_merc = $resultado_merc['NOME_MERC'];
		$ref = $resultado_merc['REF'];
		$valor = $resultado_merc['VALOR'];
		$descricao = $resultado_merc['DESCRICAO'];
		$imagem = $resultado_merc['IMAGEM'];
	?>
	<?php if(!empty($_SESSION['msg_cart'])){ echo $_SESSION['msg_cart']; } ?>
	<div style="min-height: 320px">
		<div style="width: 32%;float: left" class="corpo">
			<div class="menu-account">
				<img width="400px" height="300px" src="<?php echo $imagem ?>">
			</div>
		</div>
		<div style="width: 95%;margin-top:30px;font-size: 20px;" class="corpo">
			<p><?php echo $nome_merc ?></p>
			<form action="cad.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="nome_merc" value="<?php echo $nome_merc ?>">
				<input type="hidden" name="ref" value="<?php echo $ref ?>">
				<input type="hidden" name="quantidade" value="1">
				<input type="hidden" name="valor" value="<?php echo $valor ?>">
				<input type="hidden" name="codmerc" value="<?php echo $cod_merc ?>">
				<input type="hidden" name="coduser" value="<?php echo $_SESSION['ID']; ?>">
				<input type="hidden" name="imagem" value="<?php echo $imagem ?>">
				<input style="float: right;" type="submit" name="adicionar_cart" value="Adicionar ao Carrinho" class="botao">
			</form>
			<p style="color: #1d9d53;font-weight: bold">R$ <?php echo number_format($valor,2,',','.') ?></p>


			<p style="font-size: 15px">Ref: <?php echo $ref ?></p>
			<hr>
			<b>Descrição</b>
				<br>
			<p><?php echo $descricao ?></p>
		</div>
	</div>
<?php
	}else{
		header("Location: index.php?url=home");
	}
	unset($_SESSION['msg_cart']);
?>
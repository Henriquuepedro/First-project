<?php
	$sql_merc_rec = "SELECT NCODMERCADORIA, NOME_MERC, REF, VALOR, IMAGEM FROM mercadoria ORDER BY NCODMERCADORIA DESC limit 3";
	$query_merc_rec = mysqli_query($conn, $sql_merc_rec);

	$sql_merc_val = "SELECT NCODMERCADORIA, NOME_MERC, REF, VALOR, IMAGEM FROM mercadoria ORDER BY VALOR ASC limit 3";
	$query_merc_val = mysqli_query($conn, $sql_merc_val);
?>
<?php if(!empty($_SESSION['msg_cart'])){ echo $_SESSION['msg_cart']; } ?>
<h1 align="center"> Projeto PHP Môdulo 1</h1>
<div class="categorias">
	<a href="">
		<span class="categoria-inicio">MERCADORIAS RECENTES</span>
	</a>
</div>
<table class="tabela-prod" bgcolor="#f4b940" width="97%">
	<tr align="center" bgcolor="#fff">
		<?php
			while($resultado_merc_rec = mysqli_fetch_assoc($query_merc_rec)){
					$cod_merc = $resultado_merc_rec['NCODMERCADORIA'];
					$valor = $resultado_merc_rec['VALOR'];
					$nome_merc = $resultado_merc_rec['NOME_MERC'];
					$ref = $resultado_merc_rec['REF'];
					$imagem = $resultado_merc_rec['IMAGEM'];
				if (isset($resultado_merc_rec['NCODMERCADORIA'])){
		?>
		<td width="33%" style="padding: 10px"> 
			<a href="index.php?url=mercadoria&COD=<?php echo $cod_merc ?>">
				<img style="width:340px; height: 230px" src="<?php echo $imagem ?>"> 
				<p><?php echo $nome_merc ?></p>
				<p>R$ <?php echo $valor ?></p>
				<form action="cad.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="nome_merc" value="<?php echo $nome_merc ?>">
					<input type="hidden" name="ref" value="<?php echo $ref ?>">
					<input type="hidden" name="quantidade" value="1">
					<input type="hidden" name="valor" value="<?php echo $valor ?>">
					<input type="hidden" name="codmerc" value="<?php echo $cod_merc ?>">
					<input type="hidden" name="coduser" value="<?php echo $_SESSION['ID']; ?>">
					<input type="hidden" name="imagem" value="<?php echo $imagem ?>">
					<input type="submit" name="adicionar_cart_home" value="Adicionar ao Carrinho" class="botao">
				</form>
			</a>
		</td>
		<?php
		}}
		?>
	</tr>
</table>

<div class="categorias">
	<a href="">
		<span class="categoria-inicio">MELHORES PREÇOS</span>
	</a>
</div>
<table class="tabela-prod" bgcolor="#f4b940" width="97%">
	<tr align="center" bgcolor="#fff">
		<?php
			while($resultado_merc_val = mysqli_fetch_assoc($query_merc_val)){
					$cod_merc = $resultado_merc_val['NCODMERCADORIA'];
					$valor = $resultado_merc_val['VALOR'];
					$nome_merc = $resultado_merc_val['NOME_MERC'];
					$imagem = $resultado_merc_val['IMAGEM'];
				if (isset($resultado_merc_val['NCODMERCADORIA'])){
		?>
		<td width="33%" style="padding: 10px"> 
			<a href="index.php?url=mercadoria&COD=<?php echo $cod_merc ?>">
				<img style="width:340px; height: 230px" src="<?php echo $imagem ?>"> 
				<p><?php echo $nome_merc ?></p>
				<p>R$ <?php echo $valor ?></p>
				<form action="cad.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="nome_merc" value="<?php echo $nome_merc ?>">
					<input type="hidden" name="quantidade" value="1">
					<input type="hidden" name="valor" value="<?php echo $valor ?>">
					<input type="hidden" name="codmerc" value="<?php echo $cod_merc ?>">
					<input type="hidden" name="coduser" value="<?php echo $_SESSION['ID']; ?>">
					<input type="hidden" name="imagem" value="<?php echo $imagem ?>">
					<input type="submit" name="adicionar_cart_home" value="Adicionar ao Carrinho" class="botao">
				</form>
			</a>
		</td>
		<?php
		}}
		?>
	</tr>
</table>
<?php	
	unset($_SESSION['msg_cart']);
?>
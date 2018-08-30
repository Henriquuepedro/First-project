<?php
	$sql_merc_rec = "SELECT NCODMERCADORIA, NOME_MERC, REF, VALOR, IMAGEM FROM mercadoria ORDER BY NCODMERCADORIA DESC";
	$query_merc_rec = mysqli_query($conn, $sql_merc_rec);
	$qnt_merc = mysqli_num_rows($query_merc_rec);

	if($qnt_merc != 0){
?>
<?php if(!empty($_SESSION['msg_cart'])){ echo $_SESSION['msg_cart']; } ?>
<table class="tabela-prod" bgcolor="#f4b940" style="margin-top: 20px">
		<?php

		$b = 0;
		$x = $qnt_merc / 3 ;
		$y = (int) $x;
		for ($i = 0; $i <= $y; $i++ ) {

		?>
	<tr align="center" bgcolor="#fff">
		<?php 
			for ($a = 0; $a <= 2; $a++){
				if ($b != $qnt_merc){
					$b = $b + 1;
					$resultado_merc_rec = mysqli_fetch_assoc($query_merc_rec);
					$cod_merc = $resultado_merc_rec['NCODMERCADORIA'];
					$valor = $resultado_merc_rec['VALOR'];
					$nome_merc = $resultado_merc_rec['NOME_MERC'];
					$ref = $resultado_merc_rec['REF'];
					$imagem = $resultado_merc_rec['IMAGEM'];
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
					<input type="submit" name="adicionar_cart_prod" value="Adicionar ao Carrinho" class="botao">
				</form>
			</a>
		</td>
		<?php
		}elseif ($b >= $qnt_merc){
			?>
			<td> 
			</td>
			<?php
		}}
		?>
	</tr>
		<?php
		}
		?>
</table>
<?php
	}
	unset($_SESSION['msg_cart']);
	?>
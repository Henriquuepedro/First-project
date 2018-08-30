<?php 
if(isset($_SESSION['ID'])){
	$cod_user = $_SESSION['ID'];
	$sql_cart = "SELECT * FROM carrinho WHERE NCODUSER = $cod_user";
	$query_cart = mysqli_query($conn, $sql_cart);
	$resultado_cart = mysqli_fetch_assoc($query_cart);
	$qnt_merc_cart = mysqli_num_rows($query_cart);

	if($qnt_merc_cart > 0){
?>
<br>
<table class="tabela-prod">
	<thead class="head-cart">
		<tr bgcolor="#CD853F">
			<td style="padding:10px">IMAGEM</td>
			<td style="padding:10px">NOME</td>
			<td style="padding:10px">REFERÊNCIA</td>
			<td style="padding:10px">QUANTIDADE</td>
			<td style="padding:10px">VALOR</td>
			<td style="padding:10px">EXCLUIR</td>
		</tr>
	</thead>
	<tbody class="body-cart">
		<?php
		$a = 0;
		$vlr_total = 0;
			while (($a < 1) || ($resultado_cart = mysqli_fetch_assoc($query_cart))){
				$id_cart = $resultado_cart['NCODCARRINHO'];
				$nome_cart = $resultado_cart['NOME_CART'];
				$ref = $resultado_cart['REF'];
				$quantidade = $resultado_cart['QUANTIDADE'];
				$valor = $resultado_cart['VALOR'];
				$id_merc = $resultado_cart['NCODMERCADORIA'];
				$imagem = $resultado_cart['IMAGEM'];
				$a = $a + 1;

				$vlr_cont = ($quantidade * $valor);
				$vlr_total = ($vlr_total + $vlr_cont);
		?>
		<tr>
			<td width="20%"> 				
				<img style="width: 100px; height: 70px;" src="<?php echo $imagem ?>"> 					
			</td>
			<td width="55%"> 
				<p><a href="index.php?url=mercadoria&COD=<?php echo $id_merc ?>"><?php echo $nome_cart ?></a></p>
			</td>
			<td width="10%" style="padding:10px"> 
				<p><?php echo $ref ?></p>
			</td>
			<td align="center" width="5%" style="padding:10px"> 
				<p><?php echo $quantidade ?></p>
			</td>
			<td width="5%" style="padding:10px"> 
				<p><?php echo number_format($valor,2,',','.'); ?></p>
			</td>
			<td align="center" width="5%" style="padding:10px"> 
				<form action="cad.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_merc" value="<?php echo $id_cart ?>">
					<button type="submit" name="del_cart" style="background-color: transparent;border:0px"><i style="font-size: 20px;color: #CD0000" class="fa fa-trash"></i></button>
				</form>
			</td>
		</tr>
		<?php
			}
		?>
		<tr>
			<td align="RIGHT" colspan="4" width="85%" style="font-weight: bold">VALOR TOTAL						
			</td>
			<td width="5%" colspan="2"> 
				<p>R$ <?php echo number_format($vlr_total,2,',','.'); ?></p>
			</td>
		</tr>
	</tbody>
</table>
<div class="corpo" align="right" style="margin-top: 20px">
	<form action="cad.php" method="post" enctype="multipart/form-data">
		<input class="botao" type="submit" name="fim_pedido" value="Finalizar Pedido">
	</form>
</div>
	<?php
	}else{
		echo '<h3 align="center">Nenhuma mercadoria foi adicionada ao carrinho!</h3>
				<div align="center"><a class="botao" href="index.php?url=produtos">Adicionar Agora</a></div>';
	}
	}else{
		header("Location: index.php?url=login");
	}
	?>
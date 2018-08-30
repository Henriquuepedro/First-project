<?php 
if(($_SESSION['NIVEL'] == 2)){
	$cod_user = $_SESSION['ID'];
	$sql_merc = "SELECT * FROM mercadoria ORDER BY NOME_MERC ";
	$query_merc = mysqli_query($conn, $sql_merc);
	$resultado_merc = mysqli_fetch_assoc($query_merc);
	$qnt_merc = mysqli_num_rows($query_merc);

	if($qnt_merc > 0){
?>
<br>
	<?php if(!empty($_SESSION['msg_merc'])){ echo $_SESSION['msg_merc']; } ?>
<br>
<div class="corpo" align="left" style="margin-bottom: 10px;float: left">
	<a href="index.php?url=account" class="botao"><i class="fa fa-chevron-left"></i> Voltar</a>
</div>
<div class="corpo" align="right" style="margin-bottom: 10px">
	<a href="index.php?url=mercadoria_adm" class="botao"><i class="fa fa-plus"></i> Adicionar</a>
</div>
<table class="tabela-prod">
	<thead class="head-cart">
		<tr bgcolor="#CD853F">
			<td style="padding:10px">IMAGEM</td>
			<td style="padding:10px">NOME</td>
			<td style="padding:10px">VALOR</td>
			<td style="padding:10px">DESCRIÇÃO</td>
			<td style="padding:10px">AÇÃO</td>
		</tr>
	</thead>
	<tbody class="body-cart">
		<?php
		$a = 0;
			while (($a < 1) || ($resultado_merc = mysqli_fetch_assoc($query_merc))){
				$id_merc = $resultado_merc['NCODMERCADORIA'];
				$nome_merc = $resultado_merc['NOME_MERC'];
				$valor = $resultado_merc['VALOR'];
				$descricao = $resultado_merc['DESCRICAO'];
				$imagem = $resultado_merc['IMAGEM'];
				$a = $a + 1;
		?>
		<tr>
			<td width="5%"> 				
				<img style="width: 100px; height: 70px;" src="<?php echo $imagem ?>"> 					
			</td>
			<td width="40%">
				<div style="white-space: nowrap;width: 30em;overflow: hidden;"><a href="index.php?url=mercadoria&COD=<?php echo $id_merc ?>"><?php echo $nome_merc ?></a></div>
			</td>
			<td width="5%" style="padding:10px"> 
				<p>R$<?php echo number_format($valor,2,',','.'); ?></p>
			</td>
			<td width="45%" style="padding:10px"> 
				<div style="white-space: nowrap;width: 40em;overflow: hidden;"><?php echo $descricao ?></div>
			</td>
			<td width="5%" align="center">
				<a href="index.php?url=mercadoria_adm&COD=<?php echo $id_merc ?>"><i style="font-size: 26px" class="fa fa-pencil"></i></a>
			</td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
	<?php
	}else{
		echo '<h3 align="center">Nenhuma mercadoria foi adicionada na base de dados!</h3>
				<div align="center"><a class="botao" href="index.php?url=mercadoria_adm">Adicionar Agora</a></div>';
	}
	}else{
		header("Location: index.php?url=account");
	}
	unset($_SESSION['msg_merc']);
	?>
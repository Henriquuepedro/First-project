<?php 
if(isset($_SESSION['ID'])){
	$id_pedido = $_GET['COD'];
	$cod_user = $_SESSION['ID'];

	if($_SESSION['NIVEL'] == 2){
		$sql_ped = "SELECT * FROM itens_pedido_finalizado WHERE NCODPEDIDO = $id_pedido";
		$query_ped = mysqli_query($conn, $sql_ped);
		$resultado_ped = mysqli_fetch_assoc($query_ped);
		$qnt_merc_ped = mysqli_num_rows($query_ped);

		$sql_pedido = "SELECT * FROM pedido_finalizado WHERE NCODPEDIDO = $id_pedido";
		$query_pedido = mysqli_query($conn, $sql_pedido);
		$resultado_pedido = mysqli_fetch_assoc($query_pedido);
		$data = $resultado_pedido['DATA'];
	}else{
		$sql_ped = "SELECT * FROM itens_pedido_finalizado WHERE NCODUSER = $cod_user AND NCODPEDIDO = $id_pedido";
		$query_ped = mysqli_query($conn, $sql_ped);
		$resultado_ped = mysqli_fetch_assoc($query_ped);
		$qnt_merc_ped = mysqli_num_rows($query_ped);

		$sql_pedido = "SELECT * FROM pedido_finalizado WHERE NCODUSER = $cod_user AND NCODPEDIDO = $id_pedido";
		$query_pedido = mysqli_query($conn, $sql_pedido);
		$resultado_pedido = mysqli_fetch_assoc($query_pedido);
		$data = $resultado_pedido['DATA'];
	}
	if($qnt_merc_ped > 0){
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
		</tr>
	</thead>
	<tbody class="body-cart">
		<?php
		$a = 0;
		$vlr_total = 0;
			while (($a < 1) || ($resultado_ped = mysqli_fetch_assoc($query_ped))){
				$nome_cart = $resultado_ped['NOME_MERC'];
				$ref = $resultado_ped['REF'];
				$quantidade = $resultado_ped['QNT_PEDIDO'];
				$valor = $resultado_ped['VALOR_PEDIDO'];
				$id_merc = $resultado_ped['NCODMERCADORIA'];
				$imagem = $resultado_ped['IMAGEM'];
				$a = $a + 1;

				$vlr_cont = ($quantidade * $valor);
				$vlr_total = ($vlr_total + $vlr_cont);
		?>
		<tr>
			<td width="20%"> 				
				<img style="width: 100px; height: 70px;" src="<?php echo $imagem ?>"> 					
			</td>
			<td width="60%"> 
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
		</tr>
		<?php
			}
		?>
		<tr>
			<td align="RIGHT" colspan="3" width="85%" style="font-weight: bold">DATA DO PEDIDO						
			</td>
			<td width="5%" colspan="2"> 
				<p><?php echo date('d/m/Y H:i',  strtotime($data))?></p>
			</td>
		</tr>
		<tr>
			<td align="RIGHT" colspan="3" width="85%" style="font-weight: bold">VALOR TOTAL						
			</td>
			<td width="5%" colspan="2"> 
				<p>R$ <?php echo number_format($vlr_total,2,',','.'); ?></p>
			</td>
		</tr>
	</tbody>
</table>
<div class="corpo" align="left" style="margin-top: 20px">
	<a href="index.php?url=pedidos" class="botao">Voltar</a>
</div>
	<?php
	}else{		
		header("Location: index.php?url=pedidos");
	}
	}else{
		header("Location: index.php?url=login");
	}
	?>
<?php 
if(($_SESSION['NIVEL'] == 2)){
	$cod_user = $_SESSION['ID'];
	$sql_user = "SELECT * FROM usuario ORDER BY NOME ";
	$query_user = mysqli_query($conn, $sql_user);
	$resultado_user = mysqli_fetch_assoc($query_user);
	$qnt_user = mysqli_num_rows($query_user);

	if($qnt_user > 0){
?>
<br>
	<?php if(!empty($_SESSION['msg_user'])){ echo $_SESSION['msg_user']; } ?>
<br>
<div class="corpo" align="left" style="margin-bottom: 10px">
	<a href="index.php?url=account" class="botao"><i class="fa fa-chevron-left"></i> Voltar</a>
</div>
<table class="tabela-prod">
	<thead class="head-cart">
		<tr bgcolor="#CD853F">
			<td style="padding:10px">COD</td>
			<td style="padding:10px">NOME</td>
			<td style="padding:10px">CPF</td>
			<td style="padding:10px">EMAIL</td>
			<td style="padding:10px">USUARIO</td>
			<td style="padding:10px">NIVEL</td>
			<td style="padding:10px">AÇÃO</td>
		</tr>
	</thead>
	<tbody class="body-cart">
		<?php
		$a = 0;
			while (($a < 1) || ($resultado_user = mysqli_fetch_assoc($query_user))){
				$ncod_user = $resultado_user['NCODUSER'];
				$nome_user = $resultado_user['NOME'];
				$cpf_user = $resultado_user['CPF'];
				$email_user = $resultado_user['EMAIL'];
				$user = $resultado_user['USER'];
				$nivel = $resultado_user['NIVEL'];
				$a = $a + 1;
		?>
		<tr>
			<td width="5%" style="padding:10px"> 
				<p><?php echo $ncod_user ?></p>
			</td>
			<td width="30%" style="padding:10px"> 
				<p><?php echo $nome_user ?></p>
			</td>
			<td width="15%" style="padding:10px"> 
				<p><?php echo $cpf_user ?></p>
			</td>
			<td width="25%" style="padding:10px"> 
				<p><?php echo $email_user ?></p>
			</td>
			<td width="15%" style="padding:10px"> 
				<p><?php echo $user ?></p>
			</td>
			<td width="15%" style="padding:10px"> 
				<?php if($nivel == 1){
					echo 'Cliente';
				}elseif($nivel == 2){
					echo 'Administrador';
				} ?>
			</td>
			<td width="10%" style="padding:10px"> 
				<?php if($nivel == 1){
					echo '<form action="cad.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="cod_user" value="'.$ncod_user.'">
							<input type="submit" name="alt_cl" class="botao" value="MUDAR para ADM">
						</form>';
				}elseif($nivel == 2){
					echo '<form action="cad.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="cod_user" value="'.$ncod_user.'">
							<input type="submit" name="alt_adm" class="botao" value="MUDAR para CLIENTE">
						</form>';
				} ?>
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
	unset($_SESSION['msg_user']);
	?>
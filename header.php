<div style="margin-top: -20px">
	<img class="img-head" src="images/header.png">      
	<div class="menu menu-padrao">
		<div>
			<ul class="menu-table menu-lado" style="margin-top: 9px">
				<?php
					$qnt_carr = 0;

					if(isset($_SESSION['ID'])){
						echo '<div align="left" style="margin-left: 10px"><a style="color: #fff" href="index.php?url=account"><i class="fa fa-user"></i> Minha Conta</a> ou <a style="color: #fff" href="index.php?url=logout">Sair <i class="fa fa-user-times"></i></a></div>';

					$sql_carr = "SELECT QUANTIDADE FROM carrinho WHERE NCODUSER = ".$_SESSION['ID'];
					$query_carr = mysqli_query($conn, $sql_carr);

					while ($resultado_carr = mysqli_fetch_assoc($query_carr)){
						$qnt_carr = (($resultado_carr['QUANTIDADE']) + $qnt_carr);
					}

					}else{
						echo '<div align="left" style="margin-left: 10px"><a style="color: #fff" href="index.php?url=login"><i class="fa fa-user"></i> Entrar</a> ou <a style="color: #fff" href="index.php?url=cadastro">Cadastrar <i class="fa fa-user-plus"></i></a></div>';
					}
				?>
			</ul>
		</div>
		<div style="padding-left: 37%">
			<ul class="menu-table menu-lado">
				<li><a href="index.php?url=home"><span>INICIO</span></a></li>
				<li><a href="index.php?url=produtos"><span>MERCADORIAS</span></a></li>
				<li><a href="index.php?url=sobre"><span>SOBRE</span></a></li>
				<li><a href="index.php?url=contato"><span>CONTATO</span></a></li>   
			</ul>
			<div align="right" style="padding-top: 10px;margin-right: 20px">
				<a style="background-color: #f4b940;padding: 7px;border-radius: 5px;color: #fff" href="index.php?url=carrinho"><span>CARRINHO </span><span style="border-radius:100%;width:200px;height:200px;background-color:red;padding: 5px"><?php if($qnt_carr < 10){ echo '0'.$qnt_carr;}else{echo $qnt_carr;} ?></span></a>
			</div>
		</div>
	</div>
</div>
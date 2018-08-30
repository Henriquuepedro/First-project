<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Projeto</title>
	<link href="css/estilo.css" rel="stylesheet" />	
	<script type="text/javascript" src="js/validacao.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
</head>
<body>
	<?php
		include('conexao.php');
		include('header.php');
	?>
	<?php
	    if (isset($_GET["url"])){
	    	$url = $_GET["url"];
	        include($url.".php");
	    }else{
			include("home.php");
		}
    ?>
	<br>
	<?php
		include('footer.php');
	?>
</body>
</html>
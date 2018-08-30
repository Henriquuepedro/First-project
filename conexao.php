<?php
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'projeto';

	$conn = mysqli_connect($host, $usuario, $senha, $banco);
	
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, 'SET character_set_connection=utf8');
	mysqli_query($conn, 'SET character_set_client=utf8');
	mysqli_query($conn, 'SET character_set_results=utf8');

?>
<?php
unset($_SESSION['ID'] , $_SESSION['USER'], $_SESSION['NOME'], $_SESSION['NIVEL'], $_SESSION['EMAIL']);
$_SESSION['msg'] = '<div align="center" class="msg-sucesso">Você saiu da sua conta com sucesso</div>';
header("Location: index.php?url=login");
?>
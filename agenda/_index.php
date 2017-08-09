<?php

    session_start(); //

    if (!isset($_SESSION['usuario_online'])OR !$_SESSION['usuario_online'] == true){
        header('Location: login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

	<title>Document</title>

</head>
<body>

	<div class="social">

		<a href="verifica_usuario.php?acao=sair" class="sair">sair</a>

		<img src="https://static.tumblr.com/6d850d2d92ceffeb32ec8d23da982a1a/admygdo/SySocbow5/tumblr_static_tumblr_static__640.jpg" alt="" width="200" height="200">
		<h3>Bem vindo!</h3>
	</div>

</body>
</html>

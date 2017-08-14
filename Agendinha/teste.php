<?php
   session_start();
    if(!isset($_SESSION['usuario_online']) OR !($_SESSION['usuario_online'] == true) ){
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


        <a href="verifica_usuario.php?acao=sair">sair</a>

        <img src="http://www.dolphinmarinemagic.com.au/_System/images/bg-faq.jpg" alt="" width="200" height="200">
        <h3>Welcome to DolfhinLand!</h3>
        <h4>I will be your guide </h4>
	</div>

</body>
</html>
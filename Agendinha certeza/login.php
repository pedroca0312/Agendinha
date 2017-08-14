<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
	<title>login</title>
</head>
<body>
	
	<div class="form-login">

		<form method="post" action= "verifica_usuario.php" >

			<input type="text"     name="nome" placeholder="Digite seu nome">
			<br />
			<input type="text"     name="login" placeholder="Digite seu login - fulano">
			<br />
			<input type="password" name="senha" placeholder="Digite sua senha - 12345">
			<br />
			<input type="submit"   name="login_form" value="Acessar">

		</form>

	</div>
	
</body>
</html>
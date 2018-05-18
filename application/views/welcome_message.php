<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>
<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
<style>
#menu {
    float: right;
    margin: 10px;
}
#icone {
	margin-top: 1px;
	float: left;
	margin-left: 10px;
}
</style>
</head>
<body>

	<div id="container">
	<div id="menu" >
		
			<a href="./login">Login</a>
		
	</div>
		<img id="icone" src="<?= base_url();?>/iconeGerenciamento.png" alt="Smiley face" height="42" width="42"><h1>Sobre o PGM</h1>


		<div id="body">
		
			<p>Esta pagina é para descrever a ferramenta PGM.</p>

			<p>Esta ferramenta foi desenvolvida para o Gerenciamento de pequenas
				equipes de desenvolvimento de software!</p>
			<!--<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>-->

			<p>Utilizamos o framework CodeIgniter 2.3.X</p>

		</div>

		<p class="footer">
			Page rendered in <strong>{elapsed_time}</strong> seconds
		</p>
	</div>

</body>
</html>

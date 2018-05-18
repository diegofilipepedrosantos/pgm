<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url();?>/css/menu.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div id="container">
		<img id="icone" data-toggle="tooltip" title="PGM"  src="<?= base_url();?>/iconeGerenciamento.png" alt="Smiley face" height="42" width="42"><a href="<?= base_url();?>index.php/sobre"><img id="info" data-toggle="tooltip" title="Sobre" src="<?= base_url();?>/info.png" alt="Smiley face"  width="25"></a> <h1>PGM</h1>
		
<?php if(isset($criar)){ ?>
		<form method="post" action="<?=base_url()?>index.php/login/salvar" id="formlogin" name="formlogin">
		<?php }else{?>
		<form method="post" action="<?=base_url()?>index.php/login/logar" id="formlogin" name="formlogin">
		<?php }?>
			<fieldset id="fie">
				<legend>ENTRAR</legend>
				<br /> <label>LOGIN: &nbsp</label> <input type="text" name="login"
					id="login" /><br /> <br /> <label>SENHA: </label> <input
					type="password" name="senha" id="senha" /><br /> <br /> <input id="buttonlogin" style="float:right;"
					type="submit" value=" LOGAR " />
			</fieldset>
		</form>
		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>

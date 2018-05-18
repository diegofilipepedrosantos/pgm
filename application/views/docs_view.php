
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGM - Documentação</title>

<script type="text/javascript" src="http://localhost:8080/PGM/js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />


</head>
<body>

	<div id="container">
		<?php include 'menu.php';?>
		<center>
			<h1>Documentação</h1>
		</center>
		<div id="body">
		<?php echo form_open('documentacao/salvar'); ?>
			<textarea name="area2" cols="100%" rows="30%" style="width: 90%;"><?= $texto ?></textarea>
			<br />
			<input type="submit" value="Salvar" />
		<?php echo form_close(); ?>
		</div>
		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>


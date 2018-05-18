<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGM - Projetos</title>

<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../../js/jquery.mask.min.js">

$(document).ready(function () {
    $("#datafim").mask("99/99/9999");
});

</script> 
</head>
<body>

	<div id="container">
		<?php include 'menu.php';?>
		<center><h1>Incluir Novo Projeto</h1></center>
		<div id="body">
		
			<?php
			 echo form_open('projeto/salvar'); ?>

			<?php if (isset($message)){ ?>
			<h3 style="color: green;">Projeto Incluido com Sucesso</h3>
			<br>
			<?php } ?>
			<?php echo form_label('Nome do Projeto :'); ?>
			<?php echo form_error('dname'); ?>
			<br />
			<?php echo form_input(array('id' => 'dname', 'name' => 'dname' ,'maxlength'   => '30')); ?>
			<br />

			<?php echo form_label('Data Inicial :'); ?>
			<?php echo form_error('datainicial'); ?>
			<br />
			<?php echo form_input(array('id' => 'datainicial', 'name' => 'datainicial','maxlength'   => '10','placeholder' => 'Ex: 01/01/2001')); ?>
			<br />

			<?php echo form_label('Data Final :'); ?>
			<?php echo form_error('datafim'); ?>
			<br />
			<?php echo form_input(array('id' => 'datafim', 'name' => 'datafim','maxlength' => '10','placeholder' => 'Ex: 31/12/2001')); ?>
			<br />

			<?php echo form_label('Descrição do Projeto :'); ?>
			<?php echo form_error('daddress'); ?>
			<br />
			<?php echo form_textarea(array('id' => 'daddress', 'name' => 'daddress','maxlength'   => '300')); ?>
			<br /> <br />
			<?php echo form_submit(array('id' => 'submit', 'value' => 'Adicionar')); ?>
			<?php echo form_close(); ?>
			<br />

		</div>

		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>

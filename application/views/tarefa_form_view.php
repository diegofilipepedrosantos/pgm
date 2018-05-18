<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGM - Tarefas</title>

<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div id="container">
		<?php include 'menu.php';?>
		<center><h1>Incluir Nova Tarefa</h1></center>
		<div id="body">
		
			<?php
			 echo form_open('tarefa/salvar'); ?>

			<?php if (isset($message)){ ?>
			<h3 style="color: green;">Tarefa Incluida com Sucesso!</h3>
			<br>
			<?php } ?>
			<?php echo form_label('Titulo da Tarefa :'); ?>
			<?php echo form_error('dname'); ?>
			<br />
			<?php echo form_input(array('id' => 'dname', 'name' => 'dname')); ?>
			<br />

			<?php echo form_label('Tempo Estimado em Horas :'); ?>
			<?php echo form_error('dmobile'); ?>
			<br />
			<?php echo form_input(array('id' => 'dmobile', 'name' => 'dmobile', 'placeholder' => 'Ex: 10hrs')); ?>
			<br />

			<?php echo form_label('Pertence ao Projeto :'); ?>
			<?php echo form_error('daddress'); ?>
			<br />
			<?php echo form_dropdown('projetoid',$option); ?>
			<br />
						<?php echo form_label('Descrição :'); ?>
			<?php echo form_error('demail'); ?>
			<br />
			<?php echo form_textarea(array('id' => 'demail', 'name' => 'demail')); ?>
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

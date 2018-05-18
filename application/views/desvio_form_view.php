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
		<center><h1>Registro de Desvio</h1></center>
		<div id="body">
		
			<?php echo form_open('desvio/salvar'); ?>

			<?php if (isset($message)){ ?>
			<h3 style="color: green;">Desvio Registrado com Sucesso!</h3>
			<br>
			<?php }else if(isset($option)){ ?>
			<?php echo form_label('Tipo de desvio :'); ?>
			<?php echo form_error('tipodesvio'); ?>
			<br />
			<?php echo form_dropdown('tipodesvio',$option); ?>		
			<br />

			<?php echo form_label('Tempo utilizado do desvio em minutos'); ?>
			<?php echo form_error('tempodesvio'); ?>
			<br />
			<?php echo form_input(array('id' => 'tempodesvio', 'name' => 'tempodesvio', 'placeholder' => 'Ex: 10'))."min"; ?>
			<br />

			<?php echo form_label('Descrição do desvio :'); ?>
			<?php echo form_error('descdesvio'); ?>
			<br />
			<?php echo form_textarea(array('id' => 'descdesvio', 'name' => 'descdesvio')); ?>
			<br />
			<br /> <br />
			<?php echo form_submit(array('id' => 'submit', 'value' => 'Adicionar')); ?>
			<?php } echo form_close(); ?>
			<br />

		</div>

		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>

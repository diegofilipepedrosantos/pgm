<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGM - Projetos</title>

<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div id="container">
		<?php include 'menu.php';?>
		<center>
			<h1>Detalhes da Tarefa</h1>
		</center>
		<div id="body">

			<?php //print_r($_REQUEST);
			 echo form_open('tarefa/editar'); ?>

			<?php if(isset($message)){ ?>
			<h3 style="color: green;">Tarefa Editado com Sucesso</h3>
			<br>
			<?php } ?>
			<?php echo form_hidden('id', $id ); ?>
			<?php echo form_label('Titulo :'); ?>
			<?php echo form_error('dname'); ?>
			<br />
			<?php echo form_input(array('id' => 'dname', 'name' => 'dname', 'value' => $titulo )); ?>
			<br />
			<?php echo form_label('Projeto :'); ?>
			<?php echo form_error('dname'); ?>
			<br />
			<?php echo form_dropdown('projetoid',$option,$projeto_id); ?>
			<br />

			<?php echo form_label('Tempo Estimado :'); ?>
			<?php echo form_error('dmobile'); ?>
			<br />
			<?php echo form_input(array('id' => 'dmobile', 'name' => 'dmobile', 'maxlength'=>'3','value' => $tempoestimado,'style' => 'width:30px'))."Hrs"; ?>
			<br />
			<?php echo form_label('Atribuida para :'); ?>
			<br />
			
			<?php //echo form_input(array('id' => 'teste', 'name' => 'teste', 'value' => $usuario_id?'teste':'teste2' )); ?>
			<?php echo form_dropdown('usuario_id',$option_usuario,$usuario_id); ?>
			<br />

			<?php echo form_label('Estado :'); ?>
			<?php echo form_error('daddress'); ?>
			<br />
			<?php //echo form_input(array('id' => 'daddress', 'name' => 'daddress', 'value' => $estado)); ?>
			<?php echo form_dropdown('estado_tarefa_id',$option_estado,$estado_id); ?>
			<br /> 
			<?php echo form_label('Descrição :'); ?>
			<?php echo form_error('demail'); ?>
			<br />
			<?php echo form_textarea(array('id' => 'demail', 'name' => 'demail','value' => $descricao)); ?>
			<br /><br />

			<?php echo form_submit(array('id' => 'submit', 'value' => 'Editar')); ?>
			<?php// endforeach;?>
			<?php echo form_close(); ?>
			<br />

		</div>

		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>

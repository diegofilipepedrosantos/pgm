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
		<center><h1>Detalhes do Projeto</h1></center>
		<div id="body">
		
			<?php //print_r($_REQUEST);
			 echo form_open('projeto/editar'); ?>
			 
			<?php if(isset($message)){ ?>
			<h3 style="color: green;">Projeto Editado com Sucesso</h3>
			<br>			
			<?php } ?>
			<?php echo form_hidden('projeto_id', $projeto_id ); ?>
			<?php echo form_label('Nome do Projeto :'); ?>
			<?php echo form_error('dname'); ?>
			<br />
			<?php echo form_input(array('id' => 'dname', 'name' => 'dname', 'value' => $nome )); ?>
			<br />

			<?php echo form_label('Data Inicial :'); ?>
			<?php echo form_error('demail'); ?>
			<br />
			<?php echo form_input(array('id' => 'datainicial', 'name' => 'datainicial','value' => $datainicial, 'placeholder' => 'Ex: 24/12/2001')); ?>
			<br />

			<?php echo form_label('Data Final :'); ?>
			<?php echo form_error('datafim'); ?>
			<br />
			<?php echo form_input(array('id' => 'datafim', 'name' => 'datafim', 'value' => $datafim,'placeholder' => 'Ex: 24/12/2001')); ?>
			<br />

			<?php echo form_label('Descrição do Projeto :'); ?>
			<?php echo form_error('daddress'); ?>
			<br />
			<?php echo form_textarea(array('id' => 'daddress', 'name' => 'daddress', 'value' => $desc)); ?>
			<br />
			<?php echo form_label('Todas Tarefas Cadastradas :'); ?>
			<?php echo form_error('tarefascadastradas'); ?>
			<br />
			<?php echo form_checkbox(array('id' => 'tarefascadastradas', 'name' => 'tarefascadastradas', 'value'=> '1', 'checked'=> $todastarefas )); ?>
			<br /> <br />
			
			<?php echo form_submit(array('id' => 'submit', 'value' => 'Editar')); ?>
			<?php// endforeach;?>
			<?php echo form_close(); ?>
			<br />

		</div>
		<div>	
		<center><h2>Tarefas do Projeto: <?= $nome?></h2></center>		
		<?php echo form_open('tarefa/detalhes'); ?>
			<?php if(isset($option)){?>
			<?php foreach ($option as $key => $item):?>
			<figure id="containerimage">
				<input type="image" src="<?=base_url(); ?>postit.jpeg" id="centro"
					name="tarefa" value="<?= $key ?>">
				<figcaption>
					<?php echo "#".$key."<br>".$item;?>
				</figcaption>
			</figure>

			<?php endforeach;}else{ echo "Sem Tarefas";}?>
			<?php echo form_close(); ?>
		</div>

		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>

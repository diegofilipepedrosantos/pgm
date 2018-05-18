
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PGM - Perfil</title>

<link href="<?= base_url();?>/css/style.css" rel="stylesheet" type="text/css" />

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
}
.grid-item {
  --background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  text-align: center;
}
</style>
<script src="http://localhost:8080/timer/jquery.js"></script>

</head>
<body>

	<div id="container">
		<?php include 'menu.php';?>
		<center>
			<h1>Perfil</h1>
		</center>
		<div id="body" class="grid-container">
			<div style="float:left; margin-right:20%;" class="grid-item">
				<h2>Detalhes do Usuário</h2>
				<img width="160" src="<?=base_url()?>avatar_image/<?=$this->session->userdata('avatar')?>">
				<div style="display: inline-block; margin-left: 20px;">
					<?php echo 'Usuário : '.$this->session->userdata('username')."<br>";
				echo 'Horas por dia : '.$this->session->userdata('horas')." hrs<br>"; 
				echo "Tarefas Finalizadas ".$tarefasfinalizadas; ?>
				


					<?php echo form_open('desvio/index'); ?>
					<?php echo form_label('Algum Desvio?'); ?>
					<!--  <a href="desvio"><img width="60" src="../desvio.png" alt="Snow"></a>-->
					<?php echo form_submit(array('id' => 'submit', 'value' => 'Registrar')); ?>
					<?php echo "<br><br>"; 
					echo $this->load->library('table');
					echo $this->table->generate($tableprojetos);
						  echo form_close(); ?>
				</div>
			</div>
			<div style="float:left; margin-right:20%;" class="grid-item">
			<h2>Desvio(s)</h2>
			<?php echo $this->table->generate($tabledesvio);?>	
		</div>	
		<div class="grid-item">
			<h2>Tarefas em Andamento</h2>

			<?php echo form_open('tarefa/detalhes'); ?>
			<?php if(isset($tarefa)){ foreach ($tarefa as $key => $item):?>

			<?php echo $item; 
			include 'timer/timer.php';?>
		</div>		
			<?php  endforeach;  }?>
			<?php echo form_close(); ?>

		</div>
		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>


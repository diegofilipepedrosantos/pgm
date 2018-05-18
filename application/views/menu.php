<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link href="<?= base_url();?>/css/menu.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div class="top-bar">
<hr id="bordertop">
	<img id="icone" src="<?= base_url();?>/iconeGerenciamento.png" alt="Smiley face" height="42" width="42"> <h1 id="pgm">PGM</h1>
	<a class="sair" style="color:blue;" href="<?=base_url()?>index.php/login/sair"><?php echo $this->session->userdata('username'); ?>(sair)</a>
	 <a href="<?= base_url()?>index.php/perfil"><img class="avatarmenu" width="40" src="<?=base_url()?>avatar_image/<?=$this->session->userdata('avatar')?>"></a>
</div>
	<div id="menu">
		<ul>
			<!--  <li><a href="">Geral</a></li>-->
			<li><a href="<?=base_url()?>index.php/projeto">Projetos</a>
				<ul>
	                  <li><a href="<?=base_url()?>index.php/projeto/form">Novo Projeto</a></li>           
	       		</ul>
			</li>
			<li><a href="<?=base_url()?>index.php/tarefa/">Tarefas</a>
				<ul>
	                  <li><a href="<?=base_url()?>index.php/tarefa/form">Nova Tarefa</a></li>  
	                  <li><a href="<?=base_url()?>index.php/tarefa/equipe">Tarefas por Equipe</a></li>         
	       		</ul>
	       		
	       	</li>
			<li><a href="<?=base_url()?>index.php/perfil">Perfil</a></li>
			<li><a href="<?=base_url()?>index.php/documentacao">Docs</a></li>
		
			
		</ul>
	<hr>
	</div>
</body>
</html>
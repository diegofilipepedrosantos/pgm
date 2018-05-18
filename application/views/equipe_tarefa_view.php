
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
		<center>
			<h1>Tarefas por Equipe</h1>
		</center>
		<div id="body">
			<center>
				<table>
					<thead>

						<tr>

							<th>Nome</th>
							<th>Tarefa</th>
							<th>Titulo</th>


						</tr>
					</thead>
					
					<tbody>
						<?php $cont = 1; foreach ($equipeTarefas as $key =>$item):?>
						<tr>
						
							
							<?php foreach ($item as $key => $t ): ?>
							
							
							
							<?php  $t = $key == "Avatar"?"<img width='160' align='center' src='".base_url()."avatar_image/".$t.".' >":$t;
							
							echo "<td>".$t."</td>";?>

							<?php endforeach;?>
						</tr>
						<?php endforeach;?>
					</tbody>

				</table>
			</center>

		</div>
		<p class="footer">
			PGM renderizado em <strong>{elapsed_time}</strong> segundos
		</p>
	</div>

</body>
</html>


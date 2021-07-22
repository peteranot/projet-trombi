<html>
	<head>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<!-- CSS -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="assets/bootstrap/js/jquery-slim.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <title>Trombinoscope</title>
    </head>
<body>
	<?php 
	
		if (isset($erreur)){
			print $erreur;
		}
	?>
	<?php

		require  '../connexion.php';
		include  '../function.php';
		
	?>
	<a href="../../../index_admin.php">Retour</a>
	<div class="row">
		<div class="col-md-6" align="center" style="background-color: red">
			<label style="text-align:center">
				<u><b>Modifier la filiere</b></u>
			</label>
			<?php
				echo '<form method="POST" action="./../../../index_admin.php">';
					echo '<p>';
						echo '<input type="text" name="new_name" placeholder="Nom de la filiere" value="'.$_POST["nameFiliere"].'">';
					echo '</p>';
					echo '<p>';
						echo '<input type="text" name="new_description" placeholder="Description de la filiere" value="'.$_POST["descriptionFiliere"].'">';
					echo '</p>';
					echo '<p>';
						echo '<select id="select_listGrade" name="section" >';
							foreach ($resSection as $value) {
								echo '<option name="id_section" value="'.$value["id_section"].'">';
									echo $value["name"];   
								echo '</option>';
							}
						echo '</select>';
					echo '</p>';
					echo '<p>';
						echo '<input type="submit" name="btn_filiere" value="Mettre à jour">';
						echo "<input type='hidden' name='id_filiere' value=" .$_POST['id_filiere'] . ">";       
					echo '</p>';
				echo '</form>';
			?>
		</div>
	</div>
</body>
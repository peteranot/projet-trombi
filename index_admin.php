<html>
	<head>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<!-- CSS -->
		<link href="assets/css/style.css" rel="stylesheet">
		
		<!-- TITRE -->
        <title>Trombinoscope</title>
	</head>
	
	<body>
		<?php

			require('assets/php/connexion.php');
			include('assets/php/function.php');
			
		?>
		<p align='center' style='color: red'>
			<label>
				<u><b>PANNEL ADMINISTRATEUR</b></u>
			</label>
		</p>
		<div class="row" align="center">
			<div class="col-md-12 titleHead">
				<label style="text-align:center">
					<u><b>Ajouter une filière</b></u>
				</label>
			</div>
		</div>
		
		<section id="filiere">
		
			<!-- FORM ADD LANGUE -->
			<div class="row" align="center">
				<div class="col-md-12 divaddFiliere">
					<?php
					// <!-- ADD NEW LANGUE  -->
						echo '<form  method="POST">';
							echo '<br/>';
							echo '<p>';
								echo '<input type="text" name="name" placeholder="Nom de la filière">';
							echo '</p>';

							echo '<p>';
								echo '<input type="text" name="description" placeholder="Description de la filière">';
							echo '</p>';

							echo '<p>';
								echo '<input type="submit" name="btn" value="Valider">';
							echo '</p>';
						echo '</form>';
					?>
				</div>
			</div>
			
			
			<br/>
		
		
		<!-- LISTE DES FILIERES -->
			<div class="row" align="center">
				<div class="col-md-12 titleHead">
					<label style="text-align:center">
						<u><b>Les filière</b></u>
					</label>
				</div>
			</div>
			
			<div class="row"  align="center">
				<div class="col-md-12 divListeLangue">
					<?php
						if ($res->num_rows > 0) {
							echo "<table>";
								echo "<th>";
									echo "Name";
								echo "</th>";

								echo "<th>";
									echo "Description";
								echo "</th>";

								echo "<th>";
									echo "Actions";
								echo "</th>";
								echo "<th>";
								echo "</th>";

							foreach ($res as $valeur) { 

									echo '<form method="post">';
									
										echo "<tr>";

											echo "<td>";
												echo $valeur['name'];
											echo "</td>";

											echo "<td>";
												echo $valeur['description'];
											echo "</td>";

											echo "<td>";
													echo "<input type='submit' name='btn' value='Modifier'/>";
													echo "<input type='hidden' name='id_langue' value=" . $valeur['id_filiere'] . ">";
											echo "</td>";
											
											echo "<td>";
													echo "<input type='hidden' name='id_langue' value=" . $valeur['id_filiere'] . ">";
													echo "<input type='submit' name='btn' value='Supprimer'/>";
											echo "</td>";

										echo "</tr>";
										
									echo '</form>';	
							echo "</table>";
							}
						} 
						else { 
							
							echo "Il n'y a aucun résultats";
						}
					?>
				</div>
			</div>
		</section>
		
		
		<!-- Volontaire -->
		<section>
			<!-- FORM ADD VOLONTAIRE -->
			<div class="row" align="center">
				<div class="col-md-12 divaddFiliere">
					<?php
					// <!-- ADD NEW LANGUE  -->
						echo '<form  method="POST">';
							echo '<br/>';
							echo '<p>';
								echo '<input type="text" name="name" placeholder="Nom de la filière">';
							echo '</p>';

							echo '<p>';
								echo '<input type="text" name="description" placeholder="Description de la filière">';
							echo '</p>';

							echo '<p>';
								echo '<input type="submit" name="btn" value="Valider">';
							echo '</p>';
						echo '</form>';
					?>
				</div>
			</div>
			
			
			<br/>
		</section>
	</body>
</html>
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
		<style>
					
			.card{
				padding: 20px;
				border-radius: 50px;
				box-shadow: 2px 3px 10px grey;
			}

			.form-control{
				border-radius: 20px;
			}

			.btn{
				border-radius: 20px;
			}

			.card-img-top{
				border-radius: 20px;
			}

			h2{
				color: rebeccapurple;
				font-family: 'Baloo Tammudu 2', cursive;
			}

			tr,td{
				text-align: center;
				padding: 40px;
			}

			.addVolontaire{
				background-color: lightgrey;
			}

			.list-group-item{
				background-color: grey;
				color: white
			}
			.list-group-item:hover{
				background-color: blue
			}

		</style>
		<!-- TITRE -->
        <title>Trombinoscope</title>
	</head>
	
	<body>
		
		<?php

			require('assets/php/connexion.php');
			include('assets/php/function.php');
			if (isset($erreur)){
				print $erreur;
			}
		?>

		<p align='center'>
			<a href="index.php">Page d'accueil</a>
		</p>
		<p align='center' style='color: red'>
			<label>
				<u><b>PANNEL ADMINISTRATEUR</b></u>
			</label>
		</p>

	
		<div class="row d-flex justify-content-center">
			<div class="col-md-2">
				<div class="list-group" id="list-tab" role="tablist">
				<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Compagnie</a>
				<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Section</a>
				<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Filière</a>
				<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Grade</a>
				<a class="list-group-item list-group-item-action" id="list-volontaire-list" data-toggle="list" href="#list-volontaire" role="tab" aria-controls="settings">Volontaire</a>
				</div>
			</div>
			<div class="col-md-10">
				<div class="tab-content" id="nav-tabContent">
					<!-- ********************** -->
						<!-- COMPAGNIE -->
					<!-- ********************** -->
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						<div class="row">
							<div class="col-md-6" align="center" style="background-color: red">
								<label style="text-align:center">
									<u><b>Ajouter une compagnie</b></u>
								</label>
								<?php
								// <!-- ADD NEW COMPAGNIE  -->
									echo '<form  method="POST">';
										echo '<br/>';
										echo '<p>';
											echo '<input type="text" name="name" placeholder="Compagnie">';
										echo '</p>';

										echo '<p>';
											echo '<input type="submit" name="btn_compagnie" value="Valider">';
										echo '</p>';
									echo '</form>';
								?>
							</div>
							<div class="col-md-6" align="center" style="background-color: yellow">
								<label style="text-align:center">
									<u><b>Les Compagnies</b></u>
								</label>
								<?php
									if ($resCompagnie->num_rows > 0) {
										echo "<table>";
											echo "<th>";
												echo "Name";
											echo "</th>";

											echo "<th>";
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

											foreach ($resCompagnie as $valeur) { //Boucle : Pour chaque resultat 

												if (($etat == "ouvrir") && ($id_clique == $valeur['id_compagnie'])) {
													
													echo '<form action="index_admin.php" method="post">';
														echo "<input type='hidden' name='id_compagnie' value=" . $valeur['id_compagnie'] . ">";
														echo "<tr>";

															echo "<td>";
																echo "<input type='text' name='new_nom'  value='" . $valeur['name'] . "'>";
															echo "</td>";

															echo "<td>";
																echo "<input type='submit' name='btn_compagnie' value='Confirmer'/>";
															echo "</td>";

														echo "<tr>";
													echo '</form>';

												} else {

													echo "<tr>";

														echo "<td>";
															echo $valeur['name'];
														echo "</td>";

														echo "<td>";

																echo '<form action="index_admin.php" method="post">';

																		echo "<input type='submit' name='btn_compagnie' value='Modifier'/>";
																		echo "<input type='hidden' name='id_compagnie' value=" . $valeur['id_compagnie'] . ">";

																// echo '</form>';

																// echo '<form action="index_admin.php" method="post">';

																		echo "<input type='hidden' name='id_compagnie' value=" . $valeur['id_compagnie'] . ">";
																		echo "<input type='submit' name='btn_compagnie' value='Supprimer'/>";											
																
																echo '</form>';
															
														echo "</td>";
																
													echo "</tr>";
												
												}
											}
										echo "</table>";
									}
								else { 
											
									echo "Il n'y a aucun résultats";
								}
								?>
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- SECTION -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						<div class="row">
							<div class="col-md-6" align="center" style="background-color: red">
								<label style="text-align:center">
									<u><b>Ajouter une section</b></u>
								</label>
								<?php
									echo '<form  method="POST">';
										echo '<p>';
											echo '<select id="select_listGrade" name="compagnie" class="form-control">';
												foreach ($resCompagnie as $value) {
													echo '<option name="id_compagnie" value="'.$value["id_compagnie"].'">';
														echo $value["name"];   
													echo '</option>';
												}
											echo '</select>';
										echo '</p>';
										echo '<br/>';
										echo '<p>';
											echo '<input type="text" name="name" placeholder="Nom de la Section">';
										echo '</p>';

										echo '<p>';
											echo '<input type="submit" name="btn_section" value="Valider">';
										echo '</p>';
									echo '</form>';
								?>
							</div>
							<div class="col-md-6" style="background-color: yellow">
								<label style="text-align:center">
										<u><b>Les Sections</b></u>
								</label>
								<?php
									if ($resSection) {
										echo "<table>";
											echo "<th>";
												echo "Nom de la section";
											echo "</th>";

											echo "<th>";
												echo "id_Compagnie";
											echo "</th>";

											echo "<th>";
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

											foreach ($resSection as $valeur) { 

													echo "<tr>";
														echo "<td>";
															echo $valeur['name'];
														echo "</td>";

														echo "<td>";
															echo $valeur['id_compagnie'];
														echo "</td>";
														echo '<form action="assets/php/form/form_section.php" method="POST">';
															echo "<td>";
																	echo "<input type='submit' name='btn_section' value='Modifier'/>";
																	echo "<input type='hidden' name='id_section' value=" . $valeur['id_section'] . ">";
																	echo "<input type='hidden' name='nameSection' value=" . $valeur['name'] . ">";
															echo "</td>";
														echo '</form>';
														echo '<form method="POST" action="index_admin.php">';
															echo "<td>";
																	echo "<input type='hidden' name='id_section' value=" . $valeur['id_section'] . ">";
																	echo "<input type='submit' name='btn_section' value='Supprimer'/>";
															echo "</td>";
														echo '</form>';
													echo "</tr>";
													
											}
										echo "</table>";
									} 
									else { 
										
										echo "Il n'y a aucun résultats";
									}
								?>
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- FILIERE -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
						<div class="row">
							<!-- CREER UNE FILIERE -->
							<div class="col-md-6" align="center" style="background-color: red">
								<label style="text-align:center">
									<u><b>Ajouter une filière</b></u>
								</label>
								<?php
								//FORM ADD NEW FILIERE
									echo '<form  method="POST">';
										echo '<br/>';
										echo '<p>';
											echo '<input type="text" name="name" placeholder="Nom de la filière">';
										echo '</p>';

										echo '<p>';
											echo '<input type="text" name="description" placeholder="Description de la filière">';
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
											echo '<input type="submit" name="btn_filiere" value="Valider">';
										echo '</p>';
									echo '</form>';
								?>
							</div>
							<!-- LISTE DES FILIERE -->
							<div class="col-md-6" align="center" style="background-color: yellow">
								<label style="text-align:center">
									<u><b>Les filière</b></u>
								</label>
								<?php
									if ($resFiliere->num_rows > 0) {
										echo "<table>";
											echo "<th>";
												echo "Name";
											echo "</th>";

											echo "<th>";
												echo "Description";
											echo "</th>";

											echo "<th>";
												echo "Section";
											echo "</th>";

											echo "<th>";
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

											foreach ($resFiliere as $valeur) { 

												echo "<tr>";
													echo "<td>";
														echo $valeur['name'];
													echo "</td>";

													echo "<td>";
														echo $valeur['description'];
													echo "</td>";

													echo "<td>";
														foreach($resSection as $section){
															if($section['id_section'] == $valeur['id_section']){
																echo $section['name'];
															}
															
														}
														
													echo "</td>";
													echo "<td>";
														echo '<form action="assets/php/form/form_filiere.php" method="POST">';	
															echo "<input type='submit' name='btn_filiere' value='Modifier'/>";
															echo "<input type='hidden' name='id_filiere' value=" . $valeur['id_filiere'] . ">";
															echo "<input type='hidden' name='nameFiliere' value=" . $valeur['name'] . ">";
															echo "<input type='hidden' name='descriptionFiliere' value=" . $valeur['description'] . ">";
														echo '</form>';
														echo '<form method="POST" action="index_admin.php">';
															echo "<input type='hidden' name='id_filiere' value=" . $valeur['id_filiere'] . ">";
															echo "<input type='submit' name='btn_filiere' value='Supprimer'/>";
														echo '</form>';
													echo "</td>";
													
												echo "</tr>";
												
											}
										echo "</table>";
									} 
									else { 
										
										echo "Il n'y a aucun résultats";
									}
								?>
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- GRADE -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
						<div class="row">
							<div class="col-md-6" align="center" style="background-color: grey">
								<label style="text-align:center">
									<u><b>Ajouter un nouveau grade</b></u>
								</label>
								<?php
									echo '<form  method="POST">';
										echo '<br/>';
										echo '<p>';
											echo '<input type="text" name="name" placeholder="Libelle du grade">';
										echo '</p>';

										echo '<p>';
											echo '<input type="submit" name="btn_grade" value="Valider">';
										echo '</p>';
									echo '</form>';

								?>
							</div>
							<div class="col-md-6" align="center" style="background-color: yellow">
							<label style="text-align:center">
									<u><b>Les Grades</b></u>
								</label>
								<?php
									if ($resGrade->num_rows > 0) {
										echo "<table>";
											echo "<th>";
												echo "Name";
											echo "</th>";

											echo "<th>";
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

											foreach ($resGrade as $valeur) { //Boucle : Pour chaque resultat 

												if (($etatGrade == "ouvrir") && ($id_clique == $valeur['id_grade'])) {
													
													echo '<form action="index_admin.php" method="post">';
														echo "<input type='hidden' name='id_grade' value=" . $valeur['id_grade'] . ">";
														echo "<tr>";

															echo "<td>";
																echo "<input type='text' name='new_nom'  value='" . $valeur['name'] . "'>";
															echo "</td>";

															echo "<td>";
																echo "<input type='submit' name='btn_grade' value='Confirmer'/>";
															echo "</td>";
														echo "<tr>";
													echo '</form>';
												} else {

													echo "<tr>";

														echo "<td>";
															echo $valeur['name'];
														echo "</td>";

														echo "<td>";

																echo '<form method="post">';

																		echo "<input type='submit' name='btn_grade' value='Modifier'/>";
																		echo "<input type='hidden' name='id_grade' value=" . $valeur['id_grade'] . ">";

																		echo "<input type='hidden' name='name' value=" . $valeur['name'] . ">";
																		echo "<input type='submit' name='btn_grade' value='Supprimer'/>";											
																
																echo '</form>';
														echo "</td>";
													echo "</tr>";
												}
											}
										echo "</table>";
									}
							else { 			
								echo "Il n'y a aucun résultats";
							}
							?>
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- VOLONTAIRE -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-volontaire" role="tabpanel" aria-labelledby="list-volontaire-list">
						<div class="row addVolontaire">
							<div class="col-md-6">
								<label style="text-align:center">
									<u><b>Créer un nouveau Volontaire</b></u>
								</label>
								<div class="container">
									<?php
									// <!-- ADD NEW VOLONTAIRE  -->
										echo '<form enctype="multipart/form-data" action="index_admin.php" method="POST" class="form-control">';
											
											echo '<p>';
												echo '<input name="imgVolontaire" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Importer">';
											echo '</p>';
										
											echo '<p>';
												echo '<input type="text" class="form-control" name="firstname" placeholder="Nom du volontaire">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="lastname" placeholder="Prénom du volontaire">';
											echo '</p>';

											echo '<p>';
												echo '<input type="date" class="form-control" name="birthday" placeholder="Date de naissance du volontaire">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="phone" placeholder="Tel du volontaire">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="home" placeholder="Lieux de résidance">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="contact_firstname" placeholder="Nom du contact">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="contact_lastname" placeholder="Prénom du contact">';
											echo '</p>';

											echo '<p>';
												echo '<input type="text" class="form-control" name="contact_phone" placeholder="Tél du contact">';
											echo '</p>';

											echo '<p>';
												echo '<select id="select_listGrade" name="grade" class="form-control" >';
													foreach ($resGrade as $value) {
														echo '<option name="id_grade" value="'.$value["id_grade"].'">';
															echo $value["name"];   
														echo '</option>';
													}
												echo '</select>';
											echo '</p>';

											echo '<p>';
												echo '<select id="select_listFiliere" name="filiere" class="form-control">';
													foreach ($resFiliere as $value) {
														echo '<option name="id_filiere" value="'.$value["id_filiere"].'">';
															echo $value["name"];    
														echo '</option>';
													}
												echo '</select>';
											echo '</p>';
											echo '<p>';
												echo '<input class="btn btn-outline-info" type="submit" name="btn_volontaire" id="inputGroupFileAddon04" value="Valider"></input>';
											echo '</p>';
										echo '</form>';
									?>
								</div>
							</div>
							<div class="col-md-6" align="center">
								<label style="text-align:center">
									<u><b>Les Volontaires</b></u>
								</label>
								<?php
									if ($resFiliere->num_rows > 0) {
										echo "<table>";
											echo "<th>";
												echo "Nom";
											echo "</th>";

											echo "<th>";
												echo "Prénom";
											echo "</th>";

											echo "<th>";
												echo "Filière";
											echo "</th>";

											echo "<th>";
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

										foreach ($resVolontaire as $valeur) { 
											echo "<tr>";
												echo "<td>";
													echo $valeur['firstname'];
													
												echo "</td>";

												echo "<td>";
													echo $valeur['lastname'];
												echo "</td>";

												echo "<td>";
													foreach($resFiliere as $filiere){
														if($filiere['id_filiere'] == $valeur['id_filiere']){
															echo $filiere['name'];
														}
														
													}
												echo "</td>";

												echo "<td>";
													echo '<form action="assets/php/form/form_volontaire.php" method="POST">';
														echo "<input type='submit' name='btn' value='Mettre à jour'/>";
														
														echo "<input type='hidden' name='id_volontaire' value=" . $valeur['id_volontaire'] . ">";
														echo "<input type='hidden' name='firstname' value=" . $valeur['firstname'] . ">";
														echo "<input type='hidden' name='lastname' value=" . $valeur['lastname'] . ">";
														echo "<input type='hidden' name='birthday' value=" . $valeur['birthday'] . ">";
														echo "<input type='hidden' name='phone' value=" . $valeur['phone'] . ">";
														echo "<input type='hidden' name='home' value=" . $valeur['home'] . ">";
														echo "<input type='hidden' name='contact_firstname' value=" . $valeur['contact_firstname'] . ">";
														echo "<input type='hidden' name='contact_lastname' value=" . $valeur['contact_lastname'] . ">";
														echo "<input type='hidden' name='contact_phone' value=" . $valeur['contact_phone'] . ">";
													echo '</form>';
												echo "</td>";
											echo "</tr>";
										}
										echo "</table>";
									} 
									else { 
										
										echo "Il n'y a aucun résultats";
									}
								?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<br/>
		
	</body>
</html>
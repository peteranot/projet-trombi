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

		</style>
		<!-- TITRE -->
        <title>Trombinoscope</title>
	</head>
	
	<body>
	<?php 
	
			if (isset($erreur)){
				print $erreur;
			}
		?>
		<?php

			require('assets/php/connexion.php');
			include('assets/php/function.php');
			
		?>
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
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-profile-list">
						<div class="row">
							<div class="col-md-6" style="background-color: red">
								<label style="text-align:center">
									<u><b>Ajouter une compagnie</b></u>
								</label>
							</div>
							<div class="col-md-6" style="background-color: yellow">
								
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- SECTION -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						<div class="row">
							<div class="col-md-6" style="background-color: red">
								<label style="text-align:center">
									<u><b>Ajouter une section</b></u>
								</label>
							</div>
							<div class="col-md-6" style="background-color: yellow">
								
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
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

										foreach ($resFiliere as $valeur) { 

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
							<div class="col-md-6" style="background-color: grey">
								<label style="text-align:center">
									<u><b>Ajouter un grade</b></u>
								</label>
							</div>
							<div class="col-md-6" style="background-color: yellow">
								
							</div>
						</div>
					</div>


					<!-- ********************** -->
						<!-- VOLONTAIRE -->
					<!-- ********************** -->
					<div class="tab-pane fade" id="list-volontaire" role="tabpanel" aria-labelledby="list-volontaire-list">
						<div class="row">
							<div class="col-md-6" style="background-color: grey">
								<label style="text-align:center">
									<u><b>Créer un nouveau Volontaire</b></u>
								</label>
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

										//display iles into select
										

										echo '<p>';
											echo '<button class="btn btn-outline-info" type="submit" id="inputGroupFileAddon04">Valider</button>';
										echo '</p>';
									echo '</form>';
								?>
							</div>
							<div class="col-md-6" style="background-color: grey">
								<label style="text-align:center">
									<u><b>Les Volonotaires</b></u>
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
												echo "Actions";
											echo "</th>";
											echo "<th>";
											echo "</th>";

										foreach ($resVolontaire as $valeur) { 

												echo '<form method="post">';
												
													echo "<tr>";

														echo "<td>";
															echo $valeur['firstname'];
														echo "</td>";

														echo "<td>";
															echo $valeur['lastname'];
														echo "</td>";

														echo "<td>";
																echo "<input type='submit' name='btn' value='Modifier'/>";
																echo "<input type='hidden' name='id_langue' value=" . $valeur['id_volontaire'] . ">";
														echo "</td>";
														
														echo "<td>";
																echo "<input type='hidden' name='id_langue' value=" . $valeur['id_volontaire'] . ">";
																echo "<input type='submit' name='btn' value='Supprimer'/>";
														echo "</td>";

													echo "</tr>";
													
												echo '</form>';	
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
	
		<div class="container">
			<!-- 2snd row -->
			<form method="post">
				<div class="row d-flex justify-content-around">
					<?php 
						foreach ($list_volontaire as $value) {
							print '<div class="col-md-4 mb-3">';
								print '<div class="card" style="width: 15rem;height:25rem">';
									print '<img src="assets/img/'.$value['img'].'" class="card-img-top" style="width:12.5rem; height:10rem" alt="...">';
									print $value['firstname'].' ';
									print $value['lastname'].'<br/>';
									print $value['birthday'].'<br/>';
									print $value['phone'].'<br/>';
									print $value['home'].'<br/>';
									print $value['contact_firstname'];
									print $value['contact_lastname'];
									print $value['contact_phone'];
								print '</div>';   
							print '</div>';
							
						}
					?>
				</div>
			</form>
		</div>
		
	</body>
</html>
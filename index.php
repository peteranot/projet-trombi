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
		<!-- TITRE -->
        <title>Trombinoscope</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
		<script>
			function onClick() {
				var pdf = new jsPDF('p', 'pt', 'letter');
				pdf.canvas.height = 72 * 11;
				pdf.canvas.width = 72 * 8.5;

				pdf.fromHTML(document.body);

				pdf.save('test.pdf');
				};

				var element = document.getElementById("clickbind");
				element.addEventListener("click", onClick);
		</script>
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

			/* back  hover */

			.zoom div img {
				-webkit-transform: scale(1);
				transform: scale(1);
				-webkit-transition: .3s ease-in-out;
				transition: .3s ease-in-out;
			}
			.zoom div:hover img {
				-webkit-transform: scale(1.3);
				transform: scale(1.3);
			}

			/*   trombi hover   */


			@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
			.snip1504 {
			font-family: 'Source Sans Pro', sans-serif;
			position: relative;
			overflow: hidden;
			margin: 10px;
			min-width: 240px;
			max-width: 200px;
			width: 100%;
			color: #000000;
			text-align: left;
			font-size: 16px;
			background-color: #fff;
			}

			.snip1504 * {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
			-webkit-transition: all 0.45s ease;
			transition: all 0.45s ease;
			}

			.snip1504 img {
			vertical-align: top;
			max-width: 100%;
			backface-visibility: hidden;
			}

			.snip1504 figcaption {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			z-index: 1;
			align-items: center;
			bottom: 0;
			display: flex;
			flex-direction: column;
			justify-content: center;
			}

			.snip1504 h2,
			.snip1504 h3,
			.snip1504 h5 {
			margin: 0;
			opacity: 0;
			letter-spacing: 1px;
			}

			.snip1504 h2 {
			-webkit-transform: translateY(-100%);
			transform: translateY(-100%);
			text-transform: uppercase;
			font-weight: 80;
			}

			.snip1504 h3 {
			-webkit-transform: translateY(-100%);
			transform: translateY(-100%);
			text-transform: capitalize;
			font-weight: 60;
			}

			.snip1504 h5 {
			font-weight: normal;
			font-style: italic;
			color: #888;
			-webkit-transform: translateY(100%);
			transform: translateY(100%);
			}

			.snip1504 a {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			z-index: 1;
			}

			.snip1504:hover > img,
			.snip1504.hover > img {
			opacity: 0.1;
			}

			.snip1504:hover h2,
			.snip1504.hover h2,
			.snip1504:hover h3,
			.snip1504.hover h3,
			.snip1504:hover h5,
			.snip1504.hover h5 {
			-webkit-transform: translateY(0);
			transform: translateY(0);
			opacity: 1;
			}


		</style>
	</head>
	
	<body>
		<?php

			require('assets/php/connexion.php');
			
			include('assets/php/function.php');

		?>
		
		<div class="container" align="center">
			<p><a href="index_admin.php">Pannel ADMINISTRATEUR</a></p>
			<p>Selectionné une filière: </p>
			<?php
			echo '<form method="POST">';
				echo '<p>';
					echo '<select id="select_listFiliere" name="filiere" class="form-control">';
						foreach ($resFiliere as $value) {
							echo '<option name="id_filiere" value="'.$value["id_filiere"].'">';
								echo $value["name"].' - '.$value["description"];    
							echo '</option>';
						}
					echo '</select>';
					echo '<br/><input type="submit" value="Rechercher" name="SearchVolontaire"></input>';
					echo '<input type="hidden" value="'.$value["id_filiere"].'" name="id_filiere_vol"></input>';
					if (isset($_POST['SearchVolontaire'])) {
						print '<div class="col-md-2">';
							print '<input type="submit" value="Exporter en PDF" onClick="onClick()"></input>';
						print '</div>';
					}
				echo '</p>';
			echo '<form>';
			?>
		</div>

		<!-- TROMBINOSCOPE -->
		<div class="container" id="">
			<form method="post">
				<div class="row justify-content-center" id="trombinoscope">
					<?php 
						if (isset($_POST['SearchVolontaire'])) {

							$id_filiere = $_POST['id_filiere_vol'];
							$resVolontaireFiliere = $volontaire->getVolontaireFiliere($id_filiere);
						
							foreach ($resVolontaireFiliere as $value) {
								print '<div class="col-md-4 mb-3" >';
									print '<figure class="snip1504" >';
										// print '<div class="card" style="width: 15rem;height:25rem">';
											print '<img src="assets/img/'.$value['img'].'" class="card-img-top" style="width:400px; height: 250px;" alt="...">';
												print '<figcaption>';
													print '<h2>'.$value['firstname'].'</h2> ';
													print '<h3>'.$value['lastname'].'</h3> ';
													print '<h5>'.$value['birthday'].'</h5> ';
													print '<h5>'.$value['phone'].'</h5> ';
													print '<h5>'.$value['home'].'</h5> ';
													print '<h5>'.$value['contact_firstname'].'</h5> ';
													print '<h5>'.$value['contact_lastname'].'</h5> ';
													print '<h5>'.$value['contact_phone'].'</h5> ';
												print '</figcaption>';			
											print '<a href="#"></a>';
										// print '</div>';
									print '</figure>';  
								print '</div>';
							}
						}
					?>
				</div>
			</form>
		</div>





























		<!-- <ul class="nav justify-content-center">
			<li class="nav-item">
				<a class="nav-link active" href="#">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
		</ul>


		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Compagnie">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Section">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Filiere">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
		</form> -->
	</body>
</html>
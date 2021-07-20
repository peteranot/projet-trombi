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


		<script language="javascript">
            $(document).ready(function(){
                //get values Iles into select
                $("#select_listIles").on("change", function(){
                    jsIles = $("#select_listIles").val();
                    getIles(jsIles);
                })
            })


            //function ajax : get Ville by Iles
            function getCompagnie(jsIles){
                $.ajax({
					//method POST
                    type: 'post',
                    url: 'assets/php/ajax.php',
                    data: {
                        'getCompagnie': jsIles
                    },
					//json format data
                    datatype: 'json',
                    success: function(data) {
                        data = JSON.parse(data);
						//clear #affiche
                        $('#affiche').empty(); 
						//display #affiche
                        $('#affiche').append 
						('<p><b><u>Les villes: </b></u></p><select id="show_ville"></select>');
                        $.each(data.data,function(idx,el){
                            
                            $('#show_ville').append('<option value="">'+el+'</option>');

                        })
                    }
                });
            }
        </script>

	</head>
	
	<body>
		<?php

			require('assets/php/connexion.php');
			
			include('assets/php/function.php');


		?>


		<p>Selectionné une compagnie: </p>
			<?php

				require('assets/php/connexion.php');
					//display iles into select
					echo '<select id="select_listCompagnie">';
						foreach ($resCompagnie as $value) {
							echo '<option value="'.$value["name"].'">';
								echo $value["name"];    
							echo '</option>';
						}
					echo '</select>';
					
					
					//display data 
					echo '<div id="affiche">';
						
					echo '</div>';
			?>





























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
<html>
	<head>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<!-- CSS -->
		<link href="../css/style.css" rel="stylesheet">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="../bootstrap/js/jquery-slim.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
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
            include('../function.php');

        ?>
        <a href="../../../index_admin.php">Retour</a>
        <?php
        // <!-- UPDATE FORM VOLONTAIRE  -->
            echo '<form enctype="multipart/form-data" align="center" action="../../../index_admin.php" method="POST" class="form-control">';
                echo "<input type='hidden' class='form-control' name='id_volontaire' placeholder='Nom du volontaire' value=" . $_POST['id_volontaire'] . ">";
                echo '<p>';
                    echo '<input name="imgVolontaire" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Importer">';
                echo '</p>';
            
                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_firstname' placeholder='Nom du volontaire' value=" . $_POST['firstname'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_lastname' placeholder='Prénom du volontaire' value=" . $_POST['lastname'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='date' class='form-control' name='new_birthday' placeholder='Date de naissance du volontaire' value=" . $_POST['birthday'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_phone' placeholder='Tel du volontaire' value=" . $_POST['phone'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_home' placeholder='Lieux de résidance' value=" . $_POST['home'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_contact_firstname' placeholder='Nom du contact' value=" . $_POST['contact_firstname'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_contact_lastname' placeholder='Prénom du contact' value=" . $_POST['contact_lastname'] . ">";
                echo '</p>';

                echo '<p>';
                    echo "<input type='text' class='form-control' name='new_contact_phone' placeholder='Tél du contact' value=" . $_POST['contact_phone'] . ">";
                echo '</p>';

                echo '<p>';
                    echo '<select id="select_listGrade" name="new_grade" class="form-control" >';
                        foreach ($resGrade as $value) {
                            echo '<option name="id_grade" value="'.$value["id_grade"].'">';
                                echo $value["name"];   
                            echo '</option>';
                        }
                    echo '</select>';
                echo '</p>';

                echo '<p>';
                    echo '<select id="select_listFiliere" name="new_filiere" class="form-control">';
                        foreach ($resFiliere as $value) {
                            echo '<option name="id_filiere" value="'.$value["id_filiere"].'">';
                                echo $value["name"];    
                            echo '</option>';
                        }
                    echo '</select>';
                echo '</p>';
                echo '<p>';
                    echo '<input class="btn btn-outline-info" type="submit" name="btn_volontaire" value="Modifier"></input>';
                    echo '<input class="btn btn-outline-info" type="submit" name="btn_volontaire" value="Supprimer"></input>';
                echo '</p>';
            echo '</form>';
        ?>
</body>
</html>
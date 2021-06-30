
	
<?php
	//server name
	$host = "localhost";
	//user admin
	$username = "root";
	//user password
	$password = "";
	//database name
	$dbname = "rsma_trombi";
	// Create connexion
	$connect_db = new mysqli($host, $username, $password, $dbname);

	// verify connexion
	if ($connect_db->connect_error) {
		die("Connection failed: " . $connect_db->connect_error);
	}else{
		//echo "BDD connecté";
		//echo "Base de données connecté: ".$dbname;
	}
	
	


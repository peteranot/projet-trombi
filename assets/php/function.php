<?php
include('class/filiere.class.php');

$filiere = new filiere();

if (isset($_POST['btn'])) {

    // if btn == supprimer
    if ($_POST['btn'] == "Valider") {
		//get name
        $name = $_POST['name']; 
		
		//get translate
        $description = $_POST['description'];
		
		// execute sql requete
        $filiere->create($name, $description);
		echo "La filière à bien été ajouter";
		//echo $name.' '.$description;
    }
}
else {
	// etat change
    //$etat = "fermer";
}

// display all langues 
//$res_lang = $langues->getLang();
$res = $filiere->get();
?>
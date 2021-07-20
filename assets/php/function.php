<?php
include('class/filiere.class.php');
include('class/grade.class.php');
include('class/volontaire.class.php');
include('class/compagnie.class.php');
$compagnie = new compagnie();
$filiere = new filiere();
$grade = new grade();
$volontaire = new volontaire();

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
$resFiliere = $filiere->get();
$resGrade = $grade->get();
$resVolontaire = $volontaire->get();
$resCompagnie = $compagnie->get();


//  IMPORT IMAGE

//si $_FILES n'est pas vide
if (!empty($_FILES)) {

    //upload img
    $img = $_FILES['imgVolontaire'];
    $volontaire->img_name = $img['name'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $home = $_POST['home'];
    $contact_firstname = $_POST['contact_firstname'];
    $contact_lastname = $_POST['contact_lastname'];
    $contact_phone = $_POST['contact_phone'];
    $contact_phone = $_POST['contact_phone'];
    $grade = $_POST['grade'];
    $filiere = $_POST['filiere'];


    
    
    
    $ext = strtolower(substr($img['name'],-3));
    $allow_ext = array('jpg', 'png','gif');
    
    //Verifie si c'est une image 
    if (in_array($ext,$allow_ext)){
        move_uploaded_file($img['tmp_name'],"assets/img/".$img['name']);
    }else{
        $erreur = "Votre fichier n'est pas pris en charge";
    }

    //create image
    $volontaire->create($firstname,$lastname,$birthday,$phone,$home,$contact_firstname,$contact_lastname,$contact_phone, $grade, $filiere);
}

//get list images
$list_volontaire = $volontaire->get();




?>
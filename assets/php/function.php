<?php
include('class/filiere.class.php');
include('class/grade.class.php');
include('class/volontaire.class.php');
include('class/compagnie.class.php');
include('class/section.class.php');
$compagnie = new compagnie();
$filiere = new filiere();
$grade = new grade();
$volontaire = new volontaire();
$section = new section();

$resFiliere = $filiere->get();
$resGrade = $grade->get();
$resVolontaire = $volontaire->get();
$resCompagnie = $compagnie->get();
$list_volontaire = $volontaire->get();
$resSection = $section->get();



if (isset($_POST['btn_compagnie'])) {

    // if btn == supprimer
    if ($_POST['btn_compagnie'] == "Valider") {
		//get name
        $name = $_POST['name']; 

        $etat = "fermer";
		
		// execute sql requete
        $compagnie->create($name);
		echo "La compagnie à bien été ajouter";
		//echo $name.' 
    }

    if ($_POST['btn_compagnie'] == "Modifier") {
        $etat = "ouvrir";
        $id_clique = $_POST['id_compagnie'];
    }
    
    if ($_POST['btn_compagnie'] == "Confirmer") {
        $etat = "fermer";
        $new_nom = $_POST['new_nom'];
        $id_compagnie = $_POST['id_compagnie'];
    
        $compagnie->update($new_nom, $id_compagnie);
    }
    
    // si bouton == supprimer
    if ($_POST['btn_compagnie'] == "Supprimer") {
        $etat = "fermer";
    
        // je récupère mon formulaire supprimer
        $id = $_POST['id_compagnie'];
    
        // j"execute ma requête supprimer
        // dans ma fonction delete
        $compagnie->delete($id);
    }
}
else {
	// etat change
    $etat = "fermer";
}



if (isset($_POST['btn_section'])) {

    if ($_POST['btn_section'] == "Valider") {
        //get section
        $name = $_POST['name'];
        $id_compagnie = $_POST['compagnie'];
        // execute sql requete
        $section->create($name,$id_compagnie);
        //echo "La section à bien été ajouter";
    }
    if ($_POST['btn_section'] == "Supprimer") {
        //get section
        $id_section = $_POST['id_section'];
        // execute sql requete
        $section->delete($id_section);
        //echo "La section à bien été ajouter";
    }
    if ($_POST['btn_section'] == "Mettre à jour"){

        $id_section = $_POST['id_section'];
        $new_name = $_POST['new_name'];
        $new_id_compagnie = $_POST['new_compagnie'];
        $req = $section->update($new_name,$new_id_compagnie,$id_section);
    }
}
else {
	// etat change
    // $etat = "fermer";
}


if (isset($_POST['btn_filiere'])) {

    if ($_POST['btn_filiere'] == "Valider") {
        //get name
        $name = $_POST['name']; 
		
		//get translate
        $description = $_POST['description'];

        $id_section = $_POST['section'];
		
		// execute sql requete
        $filiere->create($name, $description,$id_section);
		echo "La filière à bien été ajouter";
    }
    if ($_POST['btn_filiere'] == "Supprimer") {
        //get section
        $id_filiere = $_POST['id_filiere'];
        // execute sql requete
        $filiere->delete($id_filiere);
        //echo "La section à bien été ajouter";
    }
    if ($_POST['btn_filiere'] == "Mettre à jour"){

        $id_filiere = $_POST['id_filiere'];
        $new_name = $_POST['new_name'];
        $new_description = $_POST['new_description'];
        $id_section = $_POST['section'];
        $req = $filiere->update($new_name,$new_description,$id_section,$id_filiere);
    }
}
else {
	// etat change
    // $etat = "fermer";
}



// BTN GRADE
if (isset($_POST['btn_grade'])) {

    // if btn == supprimer
    if ($_POST['btn_grade'] == "Valider") {
		//get name
        $name = $_POST['name']; 

        $etatGrade = "fermer";
		
		// execute sql requete
        $grade->create($name);
		echo "Le grade à bien été ajouter";
		//echo $name.' 
    }

    if ($_POST['btn_grade'] == "Modifier") {
        $etatGrade = "ouvrir";
        $id_clique = $_POST['id_grade'];
    }
    
    if ($_POST['btn_grade'] == "Confirmer") {
        $etatGrade = "fermer";
        $new_nom = $_POST['new_nom'];
        $id_grade = $_POST['id_grade'];
    
        $grade->update($new_nom, $id_grade);
    }
    
    // si bouton == supprimer
    if ($_POST['btn_grade'] == "Supprimer") {
        $etatGrade = "fermer";
    
        // je récupère mon formulaire supprimer
        $id = $_POST['id_grade'];
    
        // j"execute ma requête supprimer
        // dans ma fonction delete
        $grade->delete($id);
    }
}
else {
	// etat change
    $etatGrade = "fermer";
}








//Bouton volontaire
if (isset($_POST['btn_volontaire'])) {

    // if btn == valider
    if ($_POST['btn_volontaire'] == "Valider" && !empty($_FILES)) {
            //si $_FILES n'est pas vide

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

            //create new volontaire
            $volontaire->create($firstname,$lastname,$birthday,$phone,$home,$contact_firstname,$contact_lastname,$contact_phone, $grade, $filiere);
    }
    //DELETE VOLONTAIRE
    if ($_POST['btn_volontaire'] == "Supprimer") {
		//get id_volontaire
        $id_volontaire = $_POST['id_volontaire']; 
		// execute sql requete
        $volontaire->delete($id_volontaire);
		echo "Le volontaire a bien été supprimer";
    }
    //UPDATE VOLONTAIRE
    if ($_POST['btn_volontaire'] == "Modifier") {
		
        $img = $_FILES['imgVolontaire'];
        $volontaire->img_name = $img['name'];
        $id_volontaire = $_POST['id_volontaire']; 
        $new_firstname = $_POST['new_firstname']; 
        $new_lastname = $_POST['new_lastname']; 
        $new_birthday = $_POST['new_birthday']; 
        $new_phone = $_POST['new_phone']; 
        $new_home = $_POST['new_home']; 
        $new_contact_firstname = $_POST['new_contact_firstname']; 
        $new_contact_lastname = $_POST['new_contact_lastname']; 
        $new_contact_phone = $_POST['new_contact_phone']; 
        $new_grade = $_POST['new_grade'];
        $new_filiere = $_POST['new_filiere'];
		// execute sql requete
        $volontaire->update($id_volontaire,$new_firstname,$new_lastname,$new_birthday,$new_phone,$new_home,$new_contact_firstname,$new_contact_lastname,$new_contact_phone,$new_grade,$new_filiere);
		echo "Le volontaire a bien été modifier";
    }
}











?>
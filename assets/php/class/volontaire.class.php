<?php
include __DIR__."./../connexion.php";

class volontaire {
    public $img_name;
    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function get(){
        global $connect_db; 
        //$req : sql requete get all volontaire 
        $req = "SELECT * from volontaire ORDER BY `firstname` ASC" ; 
		//$resIles : execute sql requete
        $resVolontaire = $connect_db->query($req); 

        return $resVolontaire;
    }


    public function getVolontaireFiliere($id_filiere){
        global $connect_db; 
        //$req : sql requete get all volontaire 
        $id_filiere = $_POST['filiere'];
        $req = "SELECT * from volontaire WHERE id_filiere=".$id_filiere; 
		//$resIles : execute sql requete
        $resVolontaireFiliere = $connect_db->query($req); 

        return $resVolontaireFiliere;
    }

    /**s
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create($firstname,$lastname,$birthday,$phone,$home,$contact_firstname,$contact_lastname,$contact_phone,$grade, $filiere){
        global $connect_db;
		//$sql : sql requete insert new volontaire
        $sql = "INSERT INTO `volontaire`(`img`,`firstname`,`lastname`,`birthday`,`phone`,`contact_firstname`,`contact_lastname`,`contact_phone`, `id_grade`,`id_filiere`) 
                VALUES ('".$this->img_name."','$firstname','$lastname','$birthday','$phone','$contact_firstname','$contact_lastname','$contact_phone','$grade', '$filiere')";
        $connect_db->query($sql);

    }
	
	

    /**
     * function delete 
     * 
	 * @param
     * @return 
     */
    public function  delete($id_volontaire){  
        global $connect_db; 
        //$req_delete : sql requete delete volontaire by id
        $req_delete = "DELETE FROM volontaire WHERE id_volontaire=".$id_volontaire;

        // execute sql requete
        $connect_db->query($req_delete);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($id_volontaire,$new_firstname,$new_lastname,$new_birthday,$new_phone,$new_home,$new_contact_firstname,$new_contact_lastname,$new_contact_phone,$new_grade,$new_filiere){
        global $connect_db;
        $req_update =   "UPDATE `volontaire` SET 
                        `img`= '$this->img_name',
                        `firstname`= '$new_firstname',
                        `lastname`= '$new_lastname',
                        `birthday`= '$new_birthday',
                        `phone`= '$new_phone',
                        `home`= '$new_home',
                        `contact_firstname`= '$new_contact_firstname',
                        `contact_lastname`= '$new_contact_lastname',
                        `contact_phone`= '$new_contact_phone',
                        `id_grade`= '$new_grade',
                        `id_filiere`= '$new_filiere'

                        WHERE id_volontaire =".$id_volontaire;
        $connect_db->query($req_update);
		
    }

	
}	
 



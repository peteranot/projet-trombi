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
        $req = "SELECT * from volontaire" ; 
		//$resIles : execute sql requete
        $resVolontaire = $connect_db->query($req); 

        return $resVolontaire;
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
    public function  delete(){  
        global $connect_db; 
		

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update(){
        global $connect_db;
		
		
    }

	
}	
 



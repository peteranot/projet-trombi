<?php
include __DIR__."./../connexion.php";

class filiere {
    
    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function get(){
		global $connect_db; 

        $req = "SELECT * from filiere" ; 
        $resFiliere = $connect_db->query($req); 

        return $resFiliere;
    }

	

    /**
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create($name,$description){
        global $connect_db;
		
		$req = "INSERT INTO `filiere`(`name`,`description`) VALUES ('$name' , '$description')";
        $connect_db->query($req);

    }
	
	

    /**
     * function delete 
     * 
	 * @param
     * @return 
     */
    public function  delete($id){  
        global $connect_db; 
		
		$req = "DELETE FROM filiere WHERE id=".$id;
        $connect_db->query($req);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($id,$new_name,$new_description,$new_id_section){
        global $connect_db;
		
		$sql_update = "UPDATE `filiere` SET `name`= '$new_name',`description`= '$new_description', `id_section`= '$new_id_section'  WHERE id =".$id;
        $connect_db->query($sql_update);

    }

	
}	
 



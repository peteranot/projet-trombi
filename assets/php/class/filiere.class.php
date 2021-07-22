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

        $req = "SELECT * from filiere ORDER BY `name` ASC" ; 
        $resFiliere = $connect_db->query($req); 

        return $resFiliere;
    }

	

    /**
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create($name,$description,$id_section){
        global $connect_db;
		
		$req = "INSERT INTO `filiere`(`name`,`description`,`id_section`) VALUES ('$name' , '$description', '$id_section')";
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
		
		$req = "DELETE FROM filiere WHERE id_filiere=".$id;
        $connect_db->query($req);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($new_name,$new_description,$id_section,$id_filiere){
        global $connect_db;
		$sql_update = "UPDATE `filiere` SET `name`= '$new_name',`description`= '$new_description',`id_section`= '$id_section' WHERE id_filiere=".$id_filiere;
        $connect_db->query($sql_update);

    }

	
}	
 



<?php
include __DIR__."./../connexion.php";

class section {
    
    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function get(){
        global $connect_db;
        $req = "SELECT * from section ORDER BY `name` ASC" ; 
        $resSection = $connect_db->query($req); 

        return $resSection; 
    }


    /**
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create($name,$id_compagnie){
        global $connect_db;
		
        $req = "INSERT INTO `section`(`name`,`id_compagnie`) VALUES ('$name','$id_compagnie')";
        $connect_db->query($req);

    }
	
	

    /**
     * function delete 
     * 
	 * @param
     * @return 
     */
    public function delete($id_section){  
        global $connect_db; 
        $sql_delete = "DELETE FROM section WHERE id_section=".$id_section;
        $connect_db->query($sql_delete);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($new_name,$new_id_compagnie,$id_section){
        global $connect_db;
		$req = "UPDATE `section` SET `name`='$new_name',`id_compagnie`='$new_id_compagnie' WHERE `id_section`=".$id_section;
        $connect_db->query($req);

    }

	
}	
 



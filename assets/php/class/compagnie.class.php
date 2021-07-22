<?php
include __DIR__."./../connexion.php";

class compagnie {
    
    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function get(){
        global $connect_db;
        $req = "SELECT * from compagnie ORDER BY `name` ASC" ; 
        $resCompagnie = $connect_db->query($req); 

        return $resCompagnie; 

    }




    /**
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create($name){
        global $connect_db;
		
        $req = "INSERT INTO `compagnie`(`name`) VALUES ('$name')";
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
        //sql to delete a record
        $sql_delete = "DELETE FROM compagnie WHERE id_compagnie=".$id;

        // execute la requête précédente
        $connect_db->query($sql_delete);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($new_nom,$id_compagnie){
        global $connect_db;
		
		$sql_update = "UPDATE `compagnie` SET `name`= '".$new_nom."' WHERE id_compagnie =".$id_compagnie;
        $connect_db->query($sql_update);
    }

	
}	
 



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
        $req = "SELECT * from compagnie" ; 
        $resCompagnie = $connect_db->query($req); 

        return $resCompagnie; 

    }




    /**
     * function create 
     * 
	 * @param
     * @return 
     */
    public function create(){
        global $connect_db;
		

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
 



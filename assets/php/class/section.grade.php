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
        $req = "SELECT * from section" ; 
        $resSection = $connect_db->query($req); 

        return $resSection; 
    }

	    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function getSectionByCompagnie(){
        global $connect_db;
        $req = "SELECT  C.name, S.name
				FROM `compagnie` C, `section` S
				WHERE C.id_compagnie=S.id_compagnie"; 
        $resSectionByCompagnie = $connect_db->query($req); 

        return $resSectionByCompagnie; 

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
 



<?php
include __DIR__."./../connexion.php";

class grade {
    
    /**
     * function get 
     * 
	 * @param
     * @return 
     */
    public function get(){
        global $connect_db; 
        //$req : sql requete get all grade 
        $req = "SELECT * from grade" ; 
		//$resIles : execute sql requete
        $resGrade = $connect_db->query($req); 

        return $resGrade;
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
 



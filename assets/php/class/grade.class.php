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
    public function create($name){
        global $connect_db;
		
        $req = "INSERT INTO `grade`(`name`) VALUES ('$name')";
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
        $sql_delete = "DELETE FROM grade WHERE id_grade=".$id;

        // execute la requête précédente
        $connect_db->query($sql_delete);

    }
    
    /**
     * function update 
     * 
	 * @param
     * @return 
     */
    public function update($new_nom,$id_grade){
        global $connect_db;
		
		$sql_update = "UPDATE `grade` SET `name`= '".$new_nom."' WHERE `id_grade` =".$id_grade;
        $connect_db->query($sql_update);
    }

	
}	
 



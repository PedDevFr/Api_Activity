<?php
// clase conexion
class DB{

    private $dbname = "prueba";
    private $user= "root"; 
    private $password="";


    public function conexion(){
        try{
            $cn = new PDO('mysql:host=localhost;dbname='.$this->dbname, $this->user, $this->password);
            return $cn;
        }catch(PDOException $error){
            print_r("error ".$error->getMessage());
        }
    }
    

}

?>


<?php

// incluir una sola vez la clase de conexion
include_once 'db.php';

class Libros extends DB{


    function createLibros(){
        $sql = "INSERT INTO libros(Nombre,Autor) VALUES (:Nombre,:Autor)";
        $cnex = $this->conexion();
        $stmt = $cnex->prepare($sql);
        // asociar variables
        $stmt->bindParam(':Nombre', $_POST['Nombre']);
        $stmt->bindParam(':Autor', $_POST['Autor']);
        $stmt->execute();
        $id = $cnex->lastInsertId();
        return $id;
        

    }
           
    function readLibrosForId(){
        
        $sql = 'SELECT * FROM libros WHERE id =:id';
        $consulta =$this->conexion()->prepare($sql);
        $consulta->bindParam(':id', $_GET['id']);
        $consulta->execute();
        return $consulta;


    }
    
    function readLibros(){
        $sql = 'SELECT * FROM libros';
        $consulta = $this->conexion()->query($sql);
        return $consulta;
    
}
    function updateLibros(){

        $sql = "UPDATE libros SET Nombre =:Nombre , Autor=:Autor WHERE id=:id ";
        $cnex = $this->conexion();
        $stmt = $cnex->prepare($sql);   
        $stmt->bindParam(':Nombre', $_GET['Nombre']);
        $stmt->bindParam(':Autor', $_GET['Autor']);
        $stmt->bindParam(':id',$_GET['id']);
        $stmt->execute();
        

    }

    function deleteLibros(){
        $sql ="DELETE FROM libros WHERE id=:id ";

        $stmt = $this->conexion()->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
       
    }


}


?>
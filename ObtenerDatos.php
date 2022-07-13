<?php
header('Content-Type: application/json');

include_once( 'Libros.php');
$libro = new Libros();


// Mostrar en json datos de la tabla
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    // mostrar por id
    if(isset($_GET['id'])){
        $res= $libro->readLibrosForId();
        $row= $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
    }
    // mostar todos los datos
    else{
        $res= $libro->readLibros();
        $row= $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
    }
}

// mostrar en json datos insertados
elseif($_SERVER['REQUEST_METHOD']=='POST'){

    $res=$libro->createLibros();
    $mensaje[$res] = $_POST;
    echo json_encode($mensaje);
}
// mostar datos actualizados (nombre , autor)
elseif($_SERVER['REQUEST_METHOD']=='PUT'){

    $res=$libro->updateLibros();
    echo json_encode($_GET);

// mostrar id eliminado
}elseif($_SERVER['REQUEST_METHOD']=='DELETE'){
    $res=$libro->deleteLibros();
    echo json_encode($_GET);
}








?>



<?php
include("../models/trabajadorDAO.php");
include("../models/sancionDAO.php");

// Procesar Registro
if(isset($_POST['btnRegistrar'])){
    $numSancion = "SAN-" . rand(1000, 9999);
    $codTrab = $_POST['codTrab'];
    $tipoSancion = $_POST['tipoSancion'];
    $fechaSancion = $_POST['fechaSancion'];
    $dias = $_POST['dias'];
    $motivo = $_POST['motivo'];
    
    $m = insertarSancion($numSancion, $codTrab, $tipoSancion, $fechaSancion, $dias, $motivo);
    header("Location: ../index.php?m=".$m);
} 
// Procesar Modificación
else if(isset($_POST['btnActualizar'])){
    $id = $_POST['id'];
    $tipoSancion = $_POST['tipoSancion'];
    $fechaSancion = $_POST['fechaSancion'];
    $dias = $_POST['dias'];
    $motivo = $_POST['motivo'];
    
    $m = modificarSancion($id, $tipoSancion, $fechaSancion, $dias, $motivo);
    header("Location: ../index.php?m=".$m);
} 
// Procesar Eliminación
else if(isset($_GET['idEliminar'])){
    $id = $_GET['idEliminar'];
    $m = eliminarSancion($id);
    header("Location: ../index.php?m=".$m);
}

function obtenerSancion($id){
    return consultarSancion($id);
}

function listaSanciones(){
    return getSanciones();
}
?>
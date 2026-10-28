<?php
include("../models/clienteDAO.php");

if(isset($_POST['btnActualizar'])){
    $id = $_POST['id'];
    $dni = $_POST['dni'];
    $ape = $_POST['ape'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];
    $dir = $_POST['dir'];
    $m = modificarCliente($id, $dni, $ape, $nom, $email, $cel, $dir);
    header("Location: ../index.php?m=".$m);
} else if(isset($_GET['id'])){
    $id = $_GET['id'];
    $m = eliminarCliente($id);
    header("Location: ../index.php?m=".$m);
} else if(isset($_POST['btnRegistrar'])){
    $dni = $_POST['dni'];
    $ape = $_POST['ape'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];
    $dir = $_POST['dir'];
    $m = insertarCliente($dni, $ape, $nom, $email, $cel, $dir);
    header("Location: ../index.php?m=".$m);
}

function obtenerCliente($id){
    return consultarCliente($id);
}

function listaClientes(){
    return getClientes();
}
?>
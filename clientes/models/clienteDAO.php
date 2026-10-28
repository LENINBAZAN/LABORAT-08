<?php
include("conexion.php");

function insertarCliente($dni, $ape, $nom, $email, $cel, $dir){
    global $cn;
    $sql = "INSERT INTO tcliente(dni, apellidos, nombres, email, celular, direccion) VALUES ('".$dni."', '".$ape."', '".$nom."', '".$email."', '".$cel."', '".$dir."')";
    if(mysqli_query($cn, $sql)){
        return "El cliente fue registrado con éxito!!!";
    } else {
        return "ERROR, no se pudo registrar el cliente";
    }
}

function getClientes(){
    global $cn;
    $sql = "SELECT * FROM tcliente";
    return mysqli_query($cn, $sql);
}

function consultarCliente($id){
    global $cn;
    $sql = "SELECT * FROM tcliente WHERE id='".$id."'";
    return mysqli_query($cn, $sql);
}

function modificarCliente($id, $dni, $ape, $nom, $email, $cel, $dir){
    global $cn;
    $sql = "UPDATE tcliente SET dni='".$dni."', apellidos='".$ape."', nombres='".$nom."', email='".$email."', celular='".$cel."', direccion='".$dir."' WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "Los datos del cliente fueron actualizados correctamente";
    } else {
        return "ERROR, no se pudo actualizar el cliente";
    }
}

function eliminarCliente($id){
    global $cn;
    $sql = "DELETE FROM tcliente WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "El cliente fue eliminado con éxito!!!";
    } else {
        return "ERROR, no se pudo eliminar el cliente";
    }
}
?>
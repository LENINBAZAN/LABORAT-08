<?php
include("conexion.php");

function insertar($cod, $nom, $cic, $nc){
    global $cn;
    $sql = "INSERT INTO tcurso(CodCur, NomCur, Ciclo, NumCre) VALUES ('".$cod."', '".$nom."', '".$cic."', '".$nc."')";
    if(mysqli_query($cn, $sql)){
        return "Los datos fueron registrados con exito!!!";
    } else {
        return "ERROR, los datos no registraron???";
    }
}

function getCursos(){
    global $cn;
    $sql = "SELECT * FROM tcurso";
    return mysqli_query($cn, $sql);
}

function consultarCurso($idc){
    global $cn;
    $sql = "SELECT * FROM tcurso WHERE id='".$idc."'";
    return mysqli_query($cn, $sql);
}

function modificar($id, $cod, $nom, $cic, $numc){
    global $cn;
    $sql = "UPDATE tcurso SET CodCur='".$cod."', NomCur='".$nom."', Ciclo='".$cic."', NumCre='".$numc."' WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "Los datos fueron modificados de manera correcta";
    } else {
        return "ERROR, No se pudo actualizar los datos";
    }
}

function eliminarCurso($id){
    global $cn;
    $sql = "DELETE FROM tcurso WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "El curso fue eliminado con Exito!!!";
    } else {
        return "ERROR, El curso NO eliminado";
    }
}
?>
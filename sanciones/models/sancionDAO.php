<?php
if (!function_exists('buscarTrabajadorPorCod')) {
    include("conexion.php");
}

function insertarSancion($numSancion, $codTrab, $tipoSancion, $fechaSancion, $dias, $motivo){
    global $cn;
    $sql = "INSERT INTO tsancion(numSancion, codTrab, tipoSancion, fechaSancion, dias, motivo) 
            VALUES ('".$numSancion."', '".$codTrab."', '".$tipoSancion."', '".$fechaSancion."', '".$dias."', '".$motivo."')";
    if(mysqli_query($cn, $sql)){
        return "Sanción Nro. ".$numSancion." registrada correctamente";
    } else {
        return "ERROR: Sanción no registrada";
    }
}

function getSanciones(){
    global $cn;
    $sql = "SELECT s.*, t.apellidos, t.nombres, t.cargo, t.area 
            FROM tsancion s 
            INNER JOIN ttrabajador t ON s.codTrab = t.codTrab";
    return mysqli_query($cn, $sql);
}

function consultarSancion($id){
    global $cn;
    $sql = "SELECT s.*, t.apellidos, t.nombres, t.cargo, t.area 
            FROM tsancion s 
            INNER JOIN ttrabajador t ON s.codTrab = t.codTrab 
            WHERE s.id='".$id."'";
    return mysqli_query($cn, $sql);
}

function modificarSancion($id, $tipoSancion, $fechaSancion, $dias, $motivo){
    global $cn;
    $sql = "UPDATE tsancion SET tipoSancion='".$tipoSancion."', fechaSancion='".$fechaSancion."', dias='".$dias."', motivo='".$motivo."' WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "Sanción actualizada correctamente";
    } else {
        return "ERROR: No se pudo actualizar la sanción";
    }
}

function eliminarSancion($id){
    global $cn;
    $sql = "DELETE FROM tsancion WHERE id='".$id."'";
    if(mysqli_query($cn, $sql)){
        return "Sanción eliminada correctamente";
    } else {
        return "ERROR: No se pudo eliminar la sanción";
    }
}
?>
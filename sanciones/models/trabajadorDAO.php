<?php
include("conexion.php");

function buscarTrabajadorPorCod($cod){
    global $cn;
    $sql = "SELECT * FROM ttrabajador WHERE codTrab = '".$cod."'";
    return mysqli_query($cn, $sql);
}
?>
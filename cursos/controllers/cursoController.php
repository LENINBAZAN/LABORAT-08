<?php
include("../models/cursoDAO.php");

if (isset($_POST['btnActualizar'])) { // Modificar
    $id = $_POST['id'];
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $cic = $_POST['cic'];
    $numC = $_POST['numCre'];
    $m = modificar($id, $cod, $nom, $cic, $numC);
    header("Location: ../index.php?m=" . $m);
} else if (isset($_GET['id'])) { // Eliminar
    $id = $_GET['id'];
    $m = eliminarCurso($id);
    header("Location: ../index.php?m=" . $m);
} else if (isset($_POST['btnRegistrar'])) { // Registrar
    $cod = $_POST['cod'];
    $nom = $_POST['nom'];
    $cic = $_POST['cic'];
    $numC = $_POST['numCre'];
    $m = insertar($cod, $nom, $cic, $numC);
    header("Location: ../index.php?m=" . $m);
}

function consultarCur($idc) {
    return consultarCurso($idc);
}

function listaCursos() {
    return getCursos();
}
?>
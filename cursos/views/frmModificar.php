<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Curso</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 420px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 16px; text-align: left; }
        label { display: block; margin-bottom: 6px; color: #475569; font-size: 14px; font-weight: 500; }
        input[type="text"] { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        input[readonly] { background-color: #f1f5f9; color: #64748b; cursor: not-allowed; }
        input[type="text"]:focus:not([readonly]) { border-color: #0284c7; box-shadow: 0 0 0 3px rgba(2,132,199,0.1); }
        .btn-submit { width: 100%; padding: 12px; background-color: #0284c7; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: background 0.2s; }
        .btn-submit:hover { background-color: #0369a1; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
        .back-link:hover { color: #1e293b; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Modificar Curso</h2>
        <?php
        include("../controllers/cursoController.php");
        if (isset($_GET['idC'])) {
            $idC = $_GET['idC'];
            $datos = consultarCur($idC);
            if ($row = mysqli_fetch_array($datos)) {
                $id = $row['id'];
                $cod = $row['CodCur'];
                $nom = $row['NomCur'];
                $cic = $row['Ciclo'];
                $nc = $row['NumCre'];
            }
        ?>
        <form method="post" action="../controllers/cursoController.php">
            <div class="form-group">
                <label>ID del Registro:</label>
                <input type="text" name="id" value="<?php echo $id; ?>" readonly/>
            </div>
            <div class="form-group">
                <label>Código del Curso:</label>
                <input type="text" name="cod" value="<?php echo $cod; ?>" required/>
            </div>
            <div class="form-group">
                <label>Nombre del Curso:</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>" required/>
            </div>
            <div class="form-group">
                <label>Ciclo Académico:</label>
                <input type="text" name="cic" value="<?php echo $cic; ?>" required/>
            </div>
            <div class="form-group">
                <label>Número de Créditos:</label>
                <input type="text" name="numCre" value="<?php echo $nc; ?>" required/>
            </div>
            <input type="submit" name="btnActualizar" value="Actualizar Curso" class="btn-submit"/>
        </form>
        <?php } ?>
        <a href="frmConsultar.php" class="back-link">← Cancelar y volver</a>
    </div>
</body>
</html>
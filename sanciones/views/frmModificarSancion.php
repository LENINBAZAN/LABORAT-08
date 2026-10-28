<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Sanción</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px 0; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 500px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 14px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #475569; font-size: 13px; font-weight: 500; }
        input[type="text"], input[type="date"], select, textarea { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        input[readonly] { background-color: #f1f5f9; color: #64748b; }
        .btn-submit { width: 100%; padding: 12px; background-color: #0284c7; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 15px; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Modificar Datos de Sanción</h2>
        <?php
        include("../controllers/sancionController.php");
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $datos = obtenerSancion($id);
            if($row = mysqli_fetch_array($datos)){
        ?>
        <form method="post" action="../controllers/sancionController.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            
            <div class="form-group">
                <label>Número de Sanción:</label>
                <input type="text" value="<?php echo $row['numSancion']; ?>" readonly />
            </div>
            <div class="form-group">
                <label>Trabajador:</label>
                <input type="text" value="<?php echo $row['apellidos']." ".$row['nombres']; ?>" readonly />
            </div>
            <div class="form-group">
                <label>Tipo de Sanción:</label>
                <select name="tipoSancion" required>
                    <option value="Amonestación" <?php if($row['tipoSancion']=='Amonestación') echo 'selected'; ?>>Amonestación</option>
                    <option value="Suspensión" <?php if($row['tipoSancion']=='Suspensión') echo 'selected'; ?>>Suspensión</option>
                    <option value="Cese por Despido" <?php if($row['tipoSancion']=='Cese por Despido') echo 'selected'; ?>>Cese por Despido</option>
                </select>
            </div>
            <div class="form-group">
                <label>Fecha de Sanción:</label>
                <input type="date" name="fechaSancion" value="<?php echo $row['fechaSancion']; ?>" required />
            </div>
            <div class="form-group">
                <label>Días de Sanción:</label>
                <input type="text" name="dias" value="<?php echo $row['dias']; ?>" required />
            </div>
            <div class="form-group">
                <label>Motivo:</label>
                <textarea name="motivo" rows="3" required><?php echo $row['motivo']; ?></textarea>
            </div>
            <input type="submit" name="btnActualizar" value="Actualizar Sanción" class="btn-submit" />
        </form>
        <?php } } ?>
        <a href="frmListarSancion.php" class="back-link">← Cancelar y volver</a>
    </div>
</body>
</html>
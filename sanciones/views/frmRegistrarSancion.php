<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Sanción</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px 0; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 520px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 14px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #475569; font-size: 13px; font-weight: 500; }
        input[type="text"], input[type="date"], select, textarea { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        input[readonly] { background-color: #f1f5f9; color: #64748b; }
        .search-box { display: flex; gap: 8px; }
        .btn-search { background-color: #475569; color: white; border: none; padding: 0 16px; border-radius: 6px; cursor: pointer; font-weight: 500; }
        .btn-submit { width: 100%; padding: 12px; background-color: #dc2626; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 15px; }
        .btn-submit:hover { background-color: #b91c1c; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Registrar Sanción Disciplinaria</h2>
        
        <?php
        include("../models/trabajadorDAO.php");
        $trabajador = null;
        $msgError = "";

        if (isset($_POST['btnBuscar'])) {
            $cod = $_POST['codTrabBuscar'];
            $res = buscarTrabajadorPorCod($cod);
            if ($row = mysqli_fetch_array($res)) {
                $trabajador = $row;
            } else {
                $msgError = "Trabajador no existe";
            }
        }
        ?>

        <!-- Formulario de Búsqueda -->
        <form method="post" action="">
            <div class="form-group">
                <label>Código del Trabajador:</label>
                <div class="search-box">
                    <input type="text" name="codTrabBuscar" placeholder="Ej: TR001" value="<?php echo isset($_POST['codTrabBuscar']) ? $_POST['codTrabBuscar'] : ''; ?>" required />
                    <button type="submit" name="btnBuscar" class="btn-search">Buscar Trabajador</button>
                </div>
            </div>
        </form>

        <?php if ($msgError != "") { echo "<p style='color:#dc2626; font-weight:500;'>".$msgError."</p>"; } ?>

        <?php if ($trabajador != null) { ?>
        <!-- Formulario de Registro de Sanción -->
        <form method="post" action="../controllers/sancionController.php">
            <input type="hidden" name="codTrab" value="<?php echo $trabajador['codTrab']; ?>" />
            
            <div class="form-group">
                <label>Trabajador:</label>
                <input type="text" value="<?php echo $trabajador['apellidos']." ".$trabajador['nombres']; ?>" readonly />
            </div>
            <div class="form-group">
                <label>Cargo / Área:</label>
                <input type="text" value="<?php echo $trabajador['cargo']." - ".$trabajador['area']; ?>" readonly />
            </div>
            <div class="form-group">
                <label>Tipo de Sanción:</label>
                <select name="tipoSancion" required>
                    <option value="Amonestación">Amonestación</option>
                    <option value="Suspensión">Suspensión</option>
                    <option value="Cese por Despido">Cese por Despido</option>
                </select>
            </div>
            <div class="form-group">
                <label>Fecha de Sanción:</label>
                <input type="date" name="fechaSancion" required value="<?php echo date('Y-m-d'); ?>" />
            </div>
            <div class="form-group">
                <label>Días de Sanción:</label>
                <input type="text" name="dias" required placeholder="Ej: 3" />
            </div>
            <div class="form-group">
                <label>Motivo:</label>
                <textarea name="motivo" rows="3" required placeholder="Describa el motivo de la sanción..."></textarea>
            </div>
            <input type="submit" name="btnRegistrar" value="Grabar Sanción" class="btn-submit" />
        </form>
        <?php } ?>

        <a href="../index.php" class="back-link">← Volver al menú principal</a>
    </div>
</body>
</html>
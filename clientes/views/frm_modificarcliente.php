<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px 0; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 480px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 14px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #475569; font-size: 13px; font-weight: 500; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        input[readonly] { background-color: #f1f5f9; color: #64748b; cursor: not-allowed; }
        .btn-submit { width: 100%; padding: 12px; background-color: #0284c7; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 10px; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Modificar Cliente</h2>
        <?php
        include("../controllers/clienteController.php");
        if(isset($_GET['idC'])){
            $idC = $_GET['idC'];
            $datos = obtenerCliente($idC);
            if($row = mysqli_fetch_array($datos)){
                $id = $row['id'];
                $dni = $row['dni'];
                $ape = $row['apellidos'];
                $nom = $row['nombres'];
                $email = $row['email'];
                $cel = $row['celular'];
                $dir = $row['direccion'];
            }
        ?>
        <form method="post" action="../controllers/clienteController.php">
            <div class="form-group"><label>ID:</label><input type="text" name="id" value="<?php echo $id; ?>" readonly/></div>
            <div class="form-group"><label>DNI:</label><input type="text" name="dni" value="<?php echo $dni; ?>" required maxlength="8"/></div>
            <div class="form-group"><label>Apellidos:</label><input type="text" name="ape" value="<?php echo $ape; ?>" required/></div>
            <div class="form-group"><label>Nombres:</label><input type="text" name="nom" value="<?php echo $nom; ?>" required/></div>
            <div class="form-group"><label>Email:</label><input type="email" name="email" value="<?php echo $email; ?>" required/></div>
            <div class="form-group"><label>Celular:</label><input type="text" name="cel" value="<?php echo $cel; ?>" required maxlength="9"/></div>
            <div class="form-group"><label>Dirección:</label><input type="text" name="dir" value="<?php echo $dir; ?>" required/></div>
            <input type="submit" name="btnActualizar" value="Actualizar Cliente" class="btn-submit"/>
        </form>
        <?php } ?>
        <a href="frmListarcliente.php" class="back-link">← Cancelar y volver</a>
    </div>
</body>
</html>
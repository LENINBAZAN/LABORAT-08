<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Clientes</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); text-align: center; max-width: 400px; width: 100%; }
        h2 { color: #1e293b; margin-bottom: 24px; font-weight: 600; font-size: 24px; }
        .btn { display: block; width: 100%; padding: 12px 20px; margin: 12px 0; background-color: #2563eb; color: white; text-decoration: none; border-radius: 8px; font-weight: 500; transition: background 0.3s ease; }
        .btn:hover { background-color: #1d4ed8; }
        .btn-outline { background-color: transparent; color: #2563eb; border: 2px solid #2563eb; }
        .btn-outline:hover { background-color: #2563eb; color: white; }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['m'])) {
        $m = $_GET['m'];
        echo "<script>alert('" . $m . "');</script>";
    }
    ?>
    <div class="card">
        <h2>Módulo de Clientes</h2>
        <a href="views/frmRegistrarcliente.php" class="btn">Registrar Nuevo Cliente</a>
        <a href="views/frmListarcliente.php" class="btn btn-outline">Ver Lista de Clientes</a>
    </div>
</body>
</html>
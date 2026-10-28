<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px 0; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 480px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 14px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #475569; font-size: 13px; font-weight: 500; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; }
        input:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .btn-submit { width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: background 0.2s; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Registrar Nuevo Cliente</h2>
        <form method="post" action="../controllers/clienteController.php">
            <div class="form-group"><label>DNI:</label><input type="text" name="dni" required maxlength="8" placeholder="Ej: 71234567"/></div>
            <div class="form-group"><label>Apellidos:</label><input type="text" name="ape" required placeholder="Ej: Perez Garcia"/></div>
            <div class="form-group"><label>Nombres:</label><input type="text" name="nom" required placeholder="Ej: Juan Carlos"/></div>
            <div class="form-group"><label>Email:</label><input type="email" name="email" required placeholder="Ej: juan.perez@email.com"/></div>
            <div class="form-group"><label>Celular:</label><input type="text" name="cel" required maxlength="9" placeholder="Ej: 987654321"/></div>
            <div class="form-group"><label>Dirección:</label><input type="text" name="dir" required placeholder="Ej: Av. Principal 123"/></div>
            <input type="submit" name="btnRegistrar" value="Guardar Cliente" class="btn-submit"/>
        </form>
        <a href="../index.php" class="back-link">← Volver al menú principal</a>
    </div>
</body>
</html>
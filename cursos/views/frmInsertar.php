<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Curso</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .form-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 420px; }
        h2 { color: #1e293b; margin-bottom: 20px; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 16px; text-align: left; }
        label { display: block; margin-bottom: 6px; color: #475569; font-size: 14px; font-weight: 500; }
        input[type="text"] { width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; transition: border 0.2s; }
        input[type="text"]:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .btn-submit { width: 100%; padding: 12px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 10px; transition: background 0.2s; }
        .btn-submit:hover { background-color: #1d4ed8; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #64748b; text-decoration: none; font-size: 13px; }
        .back-link:hover { color: #1e293b; }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Registrar Curso</h2>
        <form method="post" action="../controllers/cursoController.php">
            <div class="form-group">
                <label>Código del Curso:</label>
                <input type="text" name="cod" required placeholder="Ej: 345"/>
            </div>
            <div class="form-group">
                <label>Nombre del Curso:</label>
                <input type="text" name="nom" required placeholder="Ej: Ingeniería Web"/>
            </div>
            <div class="form-group">
                <label>Ciclo Académico:</label>
                <input type="text" name="cic" required placeholder="Ej: V"/>
            </div>
            <div class="form-group">
                <label>Número de Créditos:</label>
                <input type="text" name="numCre" required placeholder="Ej: 4"/>
            </div>
            <input type="submit" name="btnRegistrar" value="Guardar Curso" class="btn-submit"/>
        </form>
        <a href="../index.php" class="back-link">← Volver al menú principal</a>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Sanciones</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; padding: 40px 20px; display: flex; justify-content: center; margin: 0; }
        .container { background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 1050px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        h1 { color: #1e293b; font-size: 22px; margin: 0; font-weight: 600; }
        .btn-add { background-color: #dc2626; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f8fafc; color: #475569; text-align: center; padding: 12px; font-size: 13px; font-weight: 600; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px; font-size: 13px; color: #334155; border-bottom: 1px solid #f1f5f9; text-align: center; }
        .action-link { text-decoration: none; font-weight: 500; font-size: 12px; padding: 4px 8px; border-radius: 4px; }
        .edit { color: #0284c7; background: #e0f2fe; }
        .delete { color: #dc2626; background: #fef2f2; }
        .back-btn { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>HISTORIAL DE SANCIONES</h1>
            <a href="frmRegistrarSancion.php" class="btn-add">+ Registrar Sanción</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>N° Sanción</th>
                    <th>Trabajador</th>
                    <th>Cargo/Área</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Días</th>
                    <th>Motivo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../controllers/sancionController.php");
                $sql = listaSanciones();
                while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td><strong>".$row['numSancion']."</strong></td>";
                    echo "<td style='text-align:left;'>".$row['apellidos']." ".$row['nombres']."</td>";
                    echo "<td>".$row['cargo']."</td>";
                    echo "<td>".$row['tipoSancion']."</td>";
                    echo "<td>".$row['fechaSancion']."</td>";
                    echo "<td>".$row['dias']."</td>";
                    echo "<td style='text-align:left;'>".$row['motivo']."</td>";
                    echo "<td><a class='action-link edit' href='frmModificarSancion.php?id=".$row['id']."'>Modificar</a></td>";
                    echo "<td><a class='action-link delete' href='../controllers/sancionController.php?idEliminar=".$row['id']."' onclick='return confirm(\"¿Desea eliminar esta sanción?\");'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../index.php" class="back-btn">← Volver al inicio</a>
    </div>
</body>
</html>
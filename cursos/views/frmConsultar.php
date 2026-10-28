<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Cursos</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; padding: 40px 20px; display: flex; justify-content: center; margin: 0; }
        .container { background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); width: 100%; max-width: 900px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        h1 { color: #1e293b; font-size: 22px; margin: 0; font-weight: 600; }
        .btn-add { background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 500; }
        .btn-add:hover { background-color: #1d4ed8; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f8fafc; color: #475569; text-align: center; padding: 12px; font-size: 13px; font-weight: 600; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px; font-size: 14px; color: #334155; border-bottom: 1px solid #f1f5f9; text-align: center; }
        tr:hover { background-color: #f8fafc; }
        .action-link { text-decoration: none; font-weight: 500; font-size: 13px; padding: 4px 8px; border-radius: 4px; }
        .edit { color: #0284c7; background: #e0f2fe; }
        .edit:hover { background: #bae6fd; }
        .delete { color: #dc2626; background: #fef2f2; }
        .delete:hover { background: #fee2e2; }
        .back-btn { display: inline-block; margin-top: 20px; color: #64748b; text-decoration: none; font-size: 14px; }
        .back-btn:hover { color: #1e293b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>DATOS DE CURSOS</h1>
            <a href="frmInsertar.php" class="btn-add">+ Nuevo Curso</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Ciclo</th>
                    <th>Créditos</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../controllers/cursoController.php");
                $sql = listaCursos();
                while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td><strong>".$row['id']."</strong></td>";
                    echo "<td>".$row['CodCur']."</td>";
                    echo "<td style='text-align:left;'>".$row['NomCur']."</td>";
                    echo "<td>".$row['Ciclo']."</td>";
                    echo "<td>".$row['NumCre']."</td>";
                    echo "<td><a class='action-link edit' href='frmModificar.php?idC=".$row['id']."'>Modificar</a></td>";
                    echo "<td><a class='action-link delete' href='../controllers/cursoController.php?id=".$row['id']."' onclick='return confirm(\"¿Desea eliminar este curso?\");'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../index.php" class="back-btn">← Volver al inicio</a>
    </div>
</body>
</html>
<?php
require_once __DIR__ . '/includes/functions.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarProcesos($_GET['id']);
    $mensaje = $count > 0 ? "Tarea eliminada con éxito." : "No se pudo eliminar la proceso.";
}

$procesos = obtenerProcesos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Gestión de Clientes</h1>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <a href="nuevo.php" class="button">Agregar un Nuevo Cliente</a>

    <h2>Lista de Clientes</h2>
    <!-- ... -->
</div>

<table>
    <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>telefono</th>
        <th>direccion</th>
       
    </tr>
    <?php foreach ($procesos as $proceso): ?>
    <tr>
        <td><?php echo htmlspecialchars($proceso['nombre']); ?></td>
        <td><?php echo htmlspecialchars($proceso['correo']); ?></td>
        <td><?php echo htmlspecialchars($proceso['telefono']); ?></td>
        <td><?php echo htmlspecialchars($proceso['direccion']); ?></td>
        <td class="actions">
        <a href="editar.php?_id=<?php echo $proceso['_id']; ?>" class="button">Editar</a>
            <a href="index.php?accion=eliminar&id=<?php echo $proceso['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>





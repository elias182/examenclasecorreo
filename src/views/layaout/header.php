<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CorreoElias</title>
    
    <!-- Añade los enlaces de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <!-- Tu enlace a tu archivo de estilos personalizado -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/styles.css">
</head>
<body>
    <header>
        <h1>CorreoElias</h1>

        <ul>
            <li><a href="<?=BASE_URL?>">Inicio</a></li>

        </ul>

        <ul>
            <?php if(isset($_SESSION['identity'])): ?>
                <li><a href="<?=BASE_URL?>mensajes">Mis mensajes</a></li> 
                <li><a href="<?=BASE_URL?>logout">Cerrar sesión</a></li> 
                <?php if($_SESSION['identity']->rol == 'admin'): ?>
                    <!-- Aquí puedes agregar enlaces o contenido específico para administradores si lo necesitas -->
                <?php endif; ?>
                <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
            <?php else: ?>
                <li><a href="<?=BASE_URL?>registro">Crear cuenta</a></li>
                <li><a href="<?=BASE_URL?>login">Identifícate</a></li> 
            <?php endif; ?>
        </ul> 
    </header>

    <!-- Añade los enlaces de Bootstrap JS (jQuery y Popper.js son requeridos por Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


<?php
include_once "conexion.php";

// Definir una variable para almacenar el mensaje de error
$error_msg = "";

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "conexion.php";
    
    // Recuperar los datos del formulario
    $nombre_usuario = $_POST["nombre_usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $confirmar_contrasena = $_POST["confirmar_contrasena"];
    
    // Verificar si las contraseñas coinciden
    if ($contrasena !== $confirmar_contrasena) {
        $error_msg = "Las contraseñas no coinciden.";
    } else {
        // Cifrar la contraseña
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        
        // Preparar la consulta SQL para insertar el usuario en la base de datos
        $consulta = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
        
        // Preparar la sentencia
        $stmt = $conexion->prepare($consulta);
        
        // Vincular los parámetros
        $stmt->bind_param("sss", $nombre_usuario, $email, $hash_contrasena);
        
        // Ejecutar la sentencia
        if ($stmt->execute()) {
            // Registro exitoso
            header("Location: registro_exitoso.php");
            exit; // Asegúrate de salir del script después de redirigir
        } else {
            // Error al registrar
            $error_msg = "Error al registrar el usuario: " . $stmt->error;
        }
        
        // Cerrar la conexión y la sentencia
        $stmt->close();
        $conexion->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            position: relative;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-top: 10px; /* Ajusta el espacio entre el título y el formulario según sea necesario */
            margin-bottom: 10px; /* Ajusta el espacio entre el título y el formulario según sea necesario */
        }

        /* Estilos para el formulario */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px; /* Ajusta el espacio entre los campos según sea necesario */
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-msg {
            color: red;
            text-align: center;
            margin-bottom: 20px; /* Ajusta el espacio entre el mensaje de error y el formulario */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <!-- Imprimir el mensaje de error si existe -->
        <?php if (!empty($error_msg)) { ?>
            <div class="error-msg"><?php echo $error_msg; ?></div>
        <?php } ?>
        <form action="registro.php" method="post">
            <label for="nombre_usuario">Nombre de usuario:</label><br>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required><br>
            <label for="confirmar_contrasena">Confirmar Contraseña:</label><br>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required><br>
            
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>

<?php
    include('dbconn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $new_password = $_POST["new_password"];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT, array('cost'=>10));

        $sql = "UPDATE users SET password='$hashed_password' WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Contraseña actualizada correctamente";
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="estilo.css" />
</head>
<body>
    <h1>Restablecer Contraseña</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-12">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="username">Nombre de usuario:</label><br>
                    <input type="username" id="username" name="username" required><br><br>
                    
                    <label for="new_password">Nueva Contraseña:</label><br>
                    <input type="password" id="new_password" name="new_password" required><br><br>
                    
                    <input type="submit" value="Restablecer Contraseña">
                    <button><a href="index.php">Iniciar sesión</a></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

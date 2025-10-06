<?php
session_start();
include("backend/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Validaciones
    if (empty($nombre) || empty($correo) || empty($contrasena)) {
        $_SESSION['error'] = "Todos los campos son obligatorios";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Formato de correo electrónico inválido";
    } elseif ($contrasena !== $confirmar_contrasena) {
        $_SESSION['error'] = "Las contraseñas no coinciden";
    } elseif (strlen($contrasena) < 6) {
        $_SESSION['error'] = "La contraseña debe tener al menos 6 caracteres";
    } else {
        try {
            // Verificar si el correo ya existe
            $sql = "SELECT id FROM usuarios WHERE correo = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['error'] = "El correo electrónico ya está registrado";
            } else {
                // Hash de la contraseña
                $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

                // Insertar nuevo usuario
                $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $nombre, $correo, $hash_contrasena);

                if ($stmt->execute()) {
                    $_SESSION['success'] = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
                    header("Location: index.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Error al registrar el usuario";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $_SESSION['error'] = "Error del sistema: " . $e->getMessage();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CLIMAXA - Crear Cuenta</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(180deg, #8cd3ff, #005c97);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .register-container {
      background: white;
      border-radius: 16px;
      padding: 35px 30px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
    }

    /* Encabezado con logo */
    .header {
      margin-bottom: 25px;
      text-align: center;
    }

    .logo {
      max-width: 160px;
      height: auto;
      margin-bottom: 8px;
    }

    .form-title {
      color: #00aaff;
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 25px;
      text-align: center;
    }

    /* Grupos de formulario más compactos */
    .form-group {
      margin-bottom: 18px;
    }

    .input-label {
      display: block;
      color: #2c3e50;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 6px;
    }

    .form-input {
      width: 100%;
      padding: 12px 15px;
      border: 1.5px solid #e0e0e0;
      border-radius: 8px;
      font-size: 15px;
      font-family: 'Poppins', sans-serif;
      transition: all 0.2s ease;
      background: #f8f9fa;
    }

    .form-input:focus {
      outline: none;
      border-color: #00aaff;
      background: white;
      box-shadow: 0 0 0 3px rgba(0, 170, 255, 0.1);
    }

    .form-input::placeholder {
      color: #a0a0a0;
      font-weight: 400;
    }

    /* Botón más compacto */
    .register-btn {
      width: 100%;
      padding: 14px;
      background: #00aaff;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      transition: all 0.2s ease;
      margin: 25px 0 20px 0;
    }

    .register-btn:hover {
      background: #0090dd;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(0, 170, 255, 0.3);
    }

    /* Enlace de login más compacto */
    .login-link {
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #f0f0f0;
    }

    .login-link-text {
      color: #666;
      font-size: 14px;
      margin-right: 5px;
    }

    .login-link-btn {
      color: #00aaff;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    .login-link-btn:hover {
      color: #0090dd;
      text-decoration: underline;
    }

    /* Mensajes de error más compactos */
    .error-message {
      color: #d32f2f;
      background: #ffebee;
      padding: 10px 12px;
      border-radius: 6px;
      margin-bottom: 15px;
      border: 1px solid #f44336;
      font-size: 13px;
    }

    .success-message {
      color: #2e7d32;
      background: #e8f5e9;
      padding: 10px 12px;
      border-radius: 6px;
      margin-bottom: 15px;
      border: 1px solid #c8e6c9;
      font-size: 13px;
    }

    /* Responsive para móviles */
    @media (max-width: 480px) {
      .register-container {
        padding: 25px 20px;
        margin: 10px;
      }
      
      .logo {
        max-width: 140px;
      }
      
      .form-title {
        font-size: 20px;
        margin-bottom: 20px;
      }
      
      .form-group {
        margin-bottom: 15px;
      }
    }

    /* Para pantallas muy pequeñas */
    @media (max-width: 360px) {
      .register-container {
        padding: 20px 15px;
      }
      
      .form-input {
        padding: 10px 12px;
        font-size: 14px;
      }
      
      .register-btn {
        padding: 12px;
        font-size: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="register-container">
    <!-- Encabezado con logo -->
    <div class="header">
      <?php if (file_exists('img/logo.png')): ?>
        <img src="img/logo.png" alt="CLIMAXA" class="logo">
      <?php else: ?>
        <!-- Si no hay logo, mostrar texto simple -->
        <h1 style="color: #2c3e50; font-size: 28px; font-weight: 700; margin-bottom: 10px;">CLIMAXA</h1>
      <?php endif; ?>
    </div>

    <h2 class="form-title">Crear una Cuenta</h2>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }
    ?>

    <form action="register.php" method="POST">
      <div class="form-group">
        <label for="nombre" class="input-label">Nombre completo</label>
        <input 
          type="text" 
          name="nombre" 
          id="nombre" 
          class="form-input"
          placeholder="Escribe tu nombre" 
          required 
          value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"
        />
      </div>

      <div class="form-group">
        <label for="correo" class="input-label">Correo electrónico</label>
        <input 
          type="email" 
          name="correo" 
          id="correo" 
          class="form-input"
          placeholder="Ejemplo@gmail.com" 
          required 
          value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>"
        />
      </div>

      <div class="form-group">
        <label for="contrasena" class="input-label">Contraseña</label>
        <input 
          type="password" 
          name="contrasena" 
          id="contrasena" 
          class="form-input"
          placeholder="Mínimo 6 caracteres" 
          required 
        />
      </div>

      <div class="form-group">
        <label for="confirmar_contrasena" class="input-label">Confirmar Contraseña</label>
        <input 
          type="password" 
          name="confirmar_contrasena" 
          id="confirmar_contrasena" 
          class="form-input"
          placeholder="Repite tu contraseña" 
          required 
        />
      </div>

      <button type="submit" class="register-btn">Crear Cuenta</button>

      <div class="login-link">
        <span class="login-link-text">¿Ya tienes una cuenta?</span>
        <a href="index.php" class="login-link-btn">Iniciar Sesión</a>
      </div>
    </form>
  </div>
</body>
</html>
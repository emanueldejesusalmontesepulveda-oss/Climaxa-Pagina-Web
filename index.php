<?php
// Activar errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Manejo de errores de sesión
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CLIMAXA - Iniciar Sesión</title>
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
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .login-container {
      background: white;
      border-radius: 20px;
      padding: 50px 40px;
      width: 100%;
      max-width: 450px;
      text-align: center;
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* Encabezado con logo */
    .header {
      margin-bottom: 30px;
    }

    .logo {
      max-width: 200px; /* Un poco más grande para mejor visibilidad */
      height: auto;
      margin-bottom: 10px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    /* Título del formulario */
    .form-title {
      color: #00aaff;
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 30px;
      text-align: center;
    }

    /* Grupos de formulario */
    .form-group {
      margin-bottom: 25px;
      text-align: left;
    }

    .input-label {
      display: block;
      color: #2c3e50;
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .form-input {
      width: 100%;
      padding: 15px 20px;
      border: 2px solid #e8e8e8;
      border-radius: 12px;
      font-size: 16px;
      font-family: 'Poppins', sans-serif;
      transition: all 0.3s ease;
      background: #f8f9fa;
    }

    .form-input:focus {
      outline: none;
      border-color: #00aaff;
      background: white;
      box-shadow: 0 0 0 3px rgba(0, 170, 255, 0.1);
    }

    .form-input::placeholder {
      color: #bdc3c7;
      font-weight: 300;
    }

    /* Recuperar contraseña */
    .recover-password {
      margin: 25px 0;
      text-align: center;
    }

    .recover-password span {
      color: #7f8c8d;
      font-size: 14px;
      margin-right: 5px;
    }

    .recover-link {
      color: #00aaff;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .recover-link:hover {
      color: #0090dd;
      text-decoration: underline;
    }

    /* Separador */
    .separator {
      height: 1px;
      background: linear-gradient(to right, transparent, #e8e8e8, transparent);
      margin: 30px 0;
    }

    /* Botón de login */
    .login-btn {
      width: 100%;
      padding: 16px;
      background: #00aaff;
      border: none;
      border-radius: 12px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-bottom: 25px;
    }

    .login-btn:hover {
      background: #0090dd;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 170, 255, 0.3);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    /* Crear cuenta */
    .create-account {
      text-align: center;
    }

    .create-account span {
      color: #7f8c8d;
      font-size: 14px;
      margin-right: 5px;
    }

    .create-link {
      color: #00aaff;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .create-link:hover {
      color: #0090dd;
      text-decoration: underline;
    }

    /* Mensajes de error */
    .error-message {
      color: #d32f2f;
      background: #ffebee;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #f44336;
      font-size: 14px;
    }

    .success-message {
      color: #2e7d32;
      background: #e8f5e9;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #c8e6c9;
      font-size: 14px;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .login-container {
        padding: 40px 25px;
        margin: 20px;
      }
      
      .logo {
        max-width: 180px;
      }
      
      .form-title {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <!-- Encabezado principal con logo SOLO -->
    <div class="header">
      <?php if (file_exists('img/logo.png')): ?>
        <img src="img/logo.png" alt="CLIMAXA" class="logo">
      <?php else: ?>
        <!-- Si no hay logo, mostrar texto simple -->
        <h1 style="color: #2c3e50; font-size: 32px; font-weight: 700; margin-bottom: 30px;">CLIMAXA</h1>
      <?php endif; ?>
    </div>

    <!-- Título del formulario -->
    <h2 class="form-title">Ingresa a tu cuenta</h2>

    <!-- Mostrar errores si existen -->
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

    <!-- Formulario de login -->
    <form action="backend/login.php" method="POST">
      <!-- Campo correo electrónico -->
      <div class="form-group">
        <label for="correo" class="input-label">Correo electrónico</label>
        <input 
          type="email" 
          name="correo" 
          id="correo" 
          class="form-input"
          placeholder="Ejemplo@gmail.com" 
          required 
        />
      </div>

      <!-- Campo contraseña -->
      <div class="form-group">
        <label for="contrasena" class="input-label">Contraseña</label>
        <input 
          type="password" 
          name="contrasena" 
          id="contrasena" 
          class="form-input"
          placeholder="********" 
          required 
        />
      </div>

      <!-- Enlace recuperar contraseña -->
      <div class="recover-password">
        <span>¿Olvidaste tu contraseña?</span>
        <a href="#" class="recover-link">Recuperar Contraseña</a>
      </div>

      <!-- Separador -->
      <div class="separator"></div>

      <!-- Botón iniciar sesión -->
      <button type="submit" class="login-btn">Iniciar Sesión</button>

      <!-- Enlace crear cuenta -->
      <div class="create-account">
        <span>¿No tienes una cuenta?</span>
        <a href="register.php" class="create-link">Crear una Cuenta</a>
      </div>
    </form>
  </div>

  <script>
  function validarFormulario() {
      const correo = document.getElementById('correo').value;
      const contrasena = document.getElementById('contrasena').value;
      
      if (!correo || !contrasena) {
          alert('Por favor, complete todos los campos');
          return false;
      }
      
      if (!correo.includes('@')) {
          alert('Por favor, ingrese un correo electrónico válido');
          return false;
      }
      
      return true;
  }
  </script>
</body>
</html>
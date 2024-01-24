<?php
session_start(); // Inicia o continúa la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alameda Motor - Tu Gasolinera de Confianza</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
   <!-- Barra de Navegación -->
   <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand"
                href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'index.php' : 'index.html'; ?>">  <a class="navbar-brand" href="#"> <img class="img-logo" src="imgs/Alam-icon.png" alt="Alameda Motor"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link"
                            href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'index.php' : 'index.html'; ?>">Inicio</a>
                    </li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">Mi Perfil</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Regístrate</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="carrito.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span id="contador-carrito">
                                    <?php echo array_sum($_SESSION['carrito'] ?? []); ?>
                                </span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'valores.php' : 'valores.html'; ?>">Nuestros
                            Valores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Servicios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item"
                                href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'tienda.php' : 'tienda.php'; ?>">Tienda</a>
                            <a class="dropdown-item"
                                href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'precios.php' : 'precios.html'; ?>">Combustibles</a>
                            <a class="dropdown-item"
                                href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'carga_electricos.php' : 'carga_electricos.html'; ?>">Carga
                                de eléctricos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) ? 'contacto.php' : 'contacto.html'; ?>">Contacto</a>
                    </li>
                    <li class="nav-item">
                    <div id="google_translate_element"></div>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
<!-- Sección Sobre Nosotros -->
<div class="about-us-section container">
    <h2>Nuestros Valores</h2>
    <div class="row"> <!-- Elimina la clase row-eq-height si no la estás definiendo en otra parte -->
      <!-- Columna 1: Servicio al Cliente -->
      <div class="col-md-4 d-flex">
        <div class="value-item service-customer flex-fill text-center" onmouseover="hoverEffect(this)" onmouseout="hoverOut(this)">
          <img src="imgs/customer-service.png" alt="Servicio al Cliente" class="icon mx-auto">
          <h3>Servicio al Cliente</h3>
          <p>En Alameda Motor, nos dedicamos a proporcionar un servicio excepcional, asegurando una experiencia satisfactoria en cada visita.</p>
        </div>
      </div>
  
      <!-- Columna 2: Calidad y Confiabilidad -->
      <div class="col-md-4 d-flex">
        <div class="value-item quality-reliability flex-fill text-center" onmouseover="hoverEffect(this)" onmouseout="hoverOut(this)">
          <img src="imgs/quality.png" alt="Calidad y Confiabilidad" class="icon mx-auto">
          <h3>Calidad y Confiabilidad</h3>
          <p>Ofrecemos productos de la más alta calidad y un servicio confiable para que siempre llegues a tu destino sin preocupaciones.</p>
        </div>
      </div>
  
      <!-- Columna 3: Compromiso Ambiental -->
      <div class="col-md-4 d-flex">
        <div class="value-item environmental-commitment flex-fill text-center" onmouseover="hoverEffect(this)" onmouseout="hoverOut(this)">
          <img src="imgs/save-the-planet.png" alt="Compromiso Ambiental" class="icon mx-auto">
          <h3>Compromiso Ambiental</h3>
          <p>Comprometidos con el planeta, implementamos prácticas sostenibles y promovemos la utilización de energías renovables.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Chat Button -->
  <!-- Botón de Soporte Rápido -->
<div class="support-button">
  Soporte Rápido
</div>
<!-- Ventana de Soporte Rápido -->
<div class="support-window">
  <div class="support-header">
    Soporte Rápido
    <span class="close-support">&times;</span>
  </div>
  <div class="support-messages"></div>
  <div class="support-content">
    <button class="back-to-options" style="display:none;">Volver a las opciones</button>
    <div class="quick-help">
      <h4>¿Cómo podemos ayudarte hoy?</h4>
      <ul>
        <li><button class="help-option" data-problem="account_issue">Problemas con mi cuenta</button></li>
        <li><button class="help-option" data-problem="payment_issue">Problemas con el pago</button></li>
        <li><button class="help-option" data-problem="technical_issue">Problemas técnicos</button></li>
        <li><button class="help-option" data-problem="other_issue">Otros problemas</button></li>
      </ul>
    </div>
  </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="main.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>

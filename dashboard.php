<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIMAXA - Productos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00aaff;
            --primary-dark: #0090dd;
            --nav-bg: #ffffff;
            --nav-text: #333333;
            --main-bg: #f5f7fa;
            --text-dark: #333333;
            --text-light: #666666;
            --border: #e0e0e0;
            --card-bg: #ffffff;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--main-bg);
            color: var(--text-dark);
        }

        /* Navigation Bar */
        .navbar {
            background: var(--nav-bg);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        .nav-logo {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            height: 100%;
        }

        .logo {
<<<<<<< HEAD
            width: 80px;
=======
            width: 80px; /* Tamaño fijo 80x50px */
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
            height: 50px;
            object-fit: contain;
            transform: translateY(3px);
        }

        .nav-search {
            flex: 1;
            max-width: 500px;
            margin: 0 30px;
            position: relative;
        }

        .search-container {
            display: flex;
            align-items: center;
            background: #f5f7fa;
            border-radius: 25px;
            padding: 8px 20px;
            border: 1px solid var(--border);
        }

        .search-container i {
            color: var(--text-light);
            margin-right: 10px;
        }

        .search-container input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }

        .search-container input::placeholder {
            color: #999;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            flex: 0 0 auto;
        }

        .nav-link {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            white-space: nowrap;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 30px;
            flex: 0 0 auto;
            margin-left: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .user-profile:hover {
            background: rgba(0, 170, 255, 0.05);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-name {
            font-weight: 500;
        }

        .logout-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background: var(--primary-dark);
        }

        /* Main Content */
        .main-content {
            padding: 30px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 16px;
        }

        /* Section Titles */
        .section-title {
            font-size: 24px;
            font-weight: 600;
            margin: 50px 0 20px 0;
            color: var(--text-dark);
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
        }

        /* Categories Buttons Section */
        .categories-buttons {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
            text-align: center;
        }

        .categories-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
            color: var(--text-dark);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .category-button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            max-width: 250px;
        }

        .category-button:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 170, 255, 0.3);
        }

        .category-image {
            width: 100%;
            max-width: 250px;
            height: 180px;
            background: linear-gradient(135deg, #f5f7fa, #e4e8f0);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 14px;
            overflow: hidden;
<<<<<<< HEAD
            position: relative;
=======
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
        }

        .category-image img {
            width: 100%;
            height: 100%;
<<<<<<< HEAD
            object-fit: contain;
            padding: 10px;
=======
            object-fit: cover;
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
        }

        /* Products Grid - 3 columnas fijas */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        .product-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #f5f7fa, #e4e8f0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 14px;
            overflow: hidden;
<<<<<<< HEAD
            position: relative;
=======
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
        }

        .product-image img {
            width: 100%;
            height: 100%;
<<<<<<< HEAD
            object-fit: contain;
            padding: 10px;
=======
            object-fit: cover;
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
        }

        .product-info {
            padding: 20px;
        }

        .product-brand {
            font-size: 14px;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .product-specs {
            font-size: 12px;
            color: var(--text-light);
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .product-price {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 15px;
        }

        .add-to-cart {
            width: 100%;
            padding: 10px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: var(--primary-dark);
        }

        /* Botón Ver Más */
        .view-more-container {
            text-align: center;
            margin: 30px 0 50px 0;
        }

        .view-more-btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .view-more-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 170, 255, 0.3);
        }

        /* Service Card Styles */
        .service-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding: 30px 20px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .service-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .service-description {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .service-price {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .service-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        .service-btn:hover {
            background: var(--primary-dark);
        }

        /* Footer */
        .dashboard-footer {
            background: #1e2a3a;
            color: #b0b7c3;
            padding: 30px 20px;
            margin-top: 50px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #b0b7c3;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-container {
                flex-wrap: wrap;
                height: auto;
                padding: 15px 20px;
            }
            
            .nav-search {
                order: 3;
                max-width: 100%;
                margin: 15px 0 0 0;
                flex: 0 0 100%;
            }
            
            .logo {
                width: 70px;
                height: 45px;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 15px;
            }
            
            .nav-link {
                font-size: 14px;
            }
            
            .user-name {
                display: none;
            }
            
            .nav-actions {
                gap: 20px;
            }
            
            .logo {
                width: 60px;
                height: 40px;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .categories-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .category-button {
                max-width: 300px;
            }

            .category-image {
                max-width: 300px;
            }
        }

        @media (max-width: 576px) {
            .nav-links {
                gap: 10px;
            }
            
            .nav-link {
                font-size: 12px;
            }
            
            .nav-actions {
                gap: 15px;
            }
            
            .logo {
                width: 50px;
                height: 35px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .categories-buttons {
                padding: 30px 20px;
            }

            .category-button {
                padding: 12px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <?php if (file_exists('img/logo2.png')): ?>
                    <img src="img/logo2.png" alt="CLIMAXA" class="logo">
                <?php else: ?>
                    <h2 style="font-size: 18px;">CLIMAXA</h2>
                <?php endif; ?>
            </div>
            
            <div class="nav-search">
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="¿Qué producto buscas?">
                </div>
            </div>
            
            <div class="nav-links">
                <a href="#" class="nav-link">Aires acondicionados</a>
                <a href="#" class="nav-link">Freezers</a>
                <a href="#" class="nav-link">Neveras</a>
                <a href="#" class="nav-link">Servicios</a>
            </div>
            
            <div class="nav-actions">
                <div class="user-profile">
                    <div class="user-avatar">
                        <?php echo strtoupper(substr($_SESSION['usuario_nombre'], 0, 1)); ?>
                    </div>
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
                </div>
                <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Descubre todos nuestros productos</h1>
        <p class="page-subtitle">Ven y prueba la calidad de todos nuestros aires acondicionados, freezers, neveras y servicios técnicos.</p>

        <!-- Categories Buttons Section -->
        <div class="categories-buttons">
            <h2 class="categories-title">Explora Nuestras Categorías</h2>
            <div class="categories-grid">
                <!-- Aires Acondicionados -->
                <div class="category-item">
                    <button class="category-button" data-category="aires">
                        Ver Aires Acondicionados
                    </button>
                    <div class="category-image">
                        <?php if (file_exists('img/producto1.png')): ?>
                            <img src="img/producto1.png" alt="Aire Acondicionado">
                        <?php else: ?>
<<<<<<< HEAD
                            <?php if (file_exists('img/aire-ejemplo.jpg')): ?>
                                <img src="img/aire-ejemplo.jpg" alt="Aire Acondicionado">
                            <?php else: ?>
                                [Imagen de Aire Acondicionado]
                            <?php endif; ?>
=======
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                                <i class="fas fa-snowflake" style="font-size: 48px;"></i>
                            </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Freezers -->
                <div class="category-item">
                    <button class="category-button" data-category="freezers">
                        Ver Freezers
                    </button>
                    <div class="category-image">
                        <?php if (file_exists('img/freezer1.png')): ?>
                            <img src="img/freezer1.png" alt="Freezer">
                        <?php else: ?>
<<<<<<< HEAD
                            <?php if (file_exists('img/freezer-ejemplo.jpg')): ?>
                                <img src="img/freezer-ejemplo.jpg" alt="Freezer">
                            <?php else: ?>
                                [Imagen de Freezer]
                            <?php endif; ?>
=======
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                                <i class="fas fa-icicles" style="font-size: 48px;"></i>
                            </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Neveras -->
                <div class="category-item">
                    <button class="category-button" data-category="neveras">
                        Ver Neveras
                    </button>
                    <div class="category-image">
                        <?php if (file_exists('img/nevera1.png')): ?>
                            <img src="img/nevera1.png" alt="Nevera">
                        <?php else: ?>
<<<<<<< HEAD
                            <?php if (file_exists('img/nevera-ejemplo.jpg')): ?>
                                <img src="img/nevera-ejemplo.jpg" alt="Nevera">
                            <?php else: ?>
                                [Imagen de Nevera]
                            <?php endif; ?>
=======
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                                <i class="fas fa-refrigerator" style="font-size: 48px;"></i>
                            </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Aires Acondicionados -->
        <h2 class="section-title" id="aires-section">Aires Acondicionados</h2>
        <div class="products-grid">
            <!-- Producto 1 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/producto1.png')): ?>
<<<<<<< HEAD
                        <img src="img/producto1.png" alt="Aire Acondicionado Gree 12,000 BTU">
                    <?php else: ?>
                        [Imagen del Aire Acondicionado]
=======
                        <img src="img/producto1.png" alt="Aire Acondicionado Gree 12,000 BTU" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-snowflake" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">GREE</div>
                    <h3 class="product-name">Aire Acondicionado Gree Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 228 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/producto2.png')): ?>
<<<<<<< HEAD
                        <img src="img/producto2.png" alt="Aire Acondicionado AirMax 12,000 BTU">
                    <?php else: ?>
                        [Imagen del Aire Acondicionado]
=======
                        <img src="img/producto2.png" alt="Aire Acondicionado AirMax 12,000 BTU" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-snowflake" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">AirMax</div>
                    <h3 class="product-name">Aire Acondicionado AirMax 12,000 BTU Inverter 21 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 167 SEER</div>
                    <div class="product-price">RD$27,200</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/producto3.png')): ?>
<<<<<<< HEAD
                        <img src="img/producto3.png" alt="Aire Acondicionado Gree 12,000 BTU">
                    <?php else: ?>
                        [Imagen del Aire Acondicionado]
=======
                        <img src="img/producto3.png" alt="Aire Acondicionado Gree 12,000 BTU" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-snowflake" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">GREE</div>
                    <h3 class="product-name">Aire Acondicionado Gree Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 208 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>
        </div>

        <!-- Botón Ver Más para Aires -->
        <div class="view-more-container">
            <a href="aires.php" class="view-more-btn">Ver Más Aires Acondicionados</a>
        </div>

        <!-- Sección de Freezers -->
        <h2 class="section-title" id="freezers-section">Freezers</h2>
        <div class="products-grid">
            <!-- Freezer 1 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/freezer1.png')): ?>
<<<<<<< HEAD
                        <img src="img/freezer1.png" alt="Freezer Mabe 5.5 Pies">
                    <?php else: ?>
                        [Imagen del Freezer]
=======
                        <img src="img/freezer1.png" alt="Freezer Mabe 5.5 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-icicles" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">MABE</div>
                    <h3 class="product-name">Freezer Vertical Mabe 5.5 Pies Cúbicos Plateado</h3>
                    <div class="product-specs">Capacidad: 5.5 pies³ • Tecnología No Frost</div>
                    <div class="product-price">RD$18,500</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Freezer 2 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/freezer2.png')): ?>
<<<<<<< HEAD
                        <img src="img/freezer2.png" alt="Freezer Indurama 7 Pies">
                    <?php else: ?>
                        [Imagen del Freezer]
=======
                        <img src="img/freezer2.png" alt="Freezer Indurama 7 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-icicles" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">INDURAMA</div>
                    <h3 class="product-name">Freezer Horizontal Indurama 7 Pies Cúbicos Blanco</h3>
                    <div class="product-specs">Capacidad: 7 pies³ • Caja Fuerte Fría</div>
                    <div class="product-price">RD$22,300</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Freezer 3 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/freezer3.png')): ?>
<<<<<<< HEAD
                        <img src="img/freezer3.png" alt="Freezer LG 6.2 Pies">
                    <?php else: ?>
                        [Imagen del Freezer]
=======
                        <img src="img/freezer3.png" alt="Freezer LG 6.2 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-icicles" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">LG</div>
                    <h3 class="product-name">Freezer Vertical LG 6.2 Pies Cúbicos Inverter</h3>
                    <div class="product-specs">Capacidad: 6.2 pies³ • Linear Inverter • No Frost</div>
                    <div class="product-price">RD$25,800</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>
        </div>

        <!-- Botón Ver Más para Freezers -->
        <div class="view-more-container">
            <a href="freezers.php" class="view-more-btn">Ver Más Freezers</a>
        </div>

        <!-- Sección de Neveras -->
        <h2 class="section-title" id="neveras-section">Neveras</h2>
        <div class="products-grid">
            <!-- Nevera 1 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/nevera1.png')): ?>
<<<<<<< HEAD
                        <img src="img/nevera1.png" alt="Nevera Mabe 18 Pies">
                    <?php else: ?>
                        [Imagen de la Nevera]
=======
                        <img src="img/nevera1.png" alt="Nevera Mabe 18 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-refrigerator" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">MABE</div>
                    <h3 class="product-name">Nevera Mabe 18 Pies Cúbicos French Door</h3>
                    <div class="product-specs">Capacidad: 18 pies³ • Dispensador de Agua • No Frost</div>
                    <div class="product-price">RD$45,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Nevera 2 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/nevera2.png')): ?>
<<<<<<< HEAD
                        <img src="img/nevera2.png" alt="Nevera LG 20 Pies">
                    <?php else: ?>
                        [Imagen de la Nevera]
=======
                        <img src="img/nevera2.png" alt="Nevera LG 20 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-refrigerator" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">LG</div>
                    <h3 class="product-name">Nevera LG 20 Pies Cúbicos InstaView Door</h3>
                    <div class="product-specs">Capacidad: 20 pies³ • Linear Inverter • InstaView</div>
                    <div class="product-price">RD$62,500</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Nevera 3 -->
            <div class="product-card">
                <div class="product-image">
                    <?php if (file_exists('img/nevera3.png')): ?>
<<<<<<< HEAD
                        <img src="img/nevera3.png" alt="Nevera Samsung 19 Pies">
                    <?php else: ?>
                        [Imagen de la Nevera]
=======
                        <img src="img/nevera3.png" alt="Nevera Samsung 19 Pies" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0; color: #666;">
                            <i class="fas fa-refrigerator" style="font-size: 48px;"></i>
                        </div>
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">SAMSUNG</div>
                    <h3 class="product-name">Nevera Samsung 19 Pies Family Hub</h3>
                    <div class="product-specs">Capacidad: 19 pies³ • Digital Inverter • Family Hub</div>
                    <div class="product-price">RD$58,700</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>
        </div>

        <!-- Botón Ver Más para Neveras -->
        <div class="view-more-container">
            <a href="neveras.php" class="view-more-btn">Ver Más Neveras</a>
        </div>

        <!-- Sección de Servicios -->
        <h2 class="section-title" id="servicios-section">Servicios Técnicos</h2>
        <div class="products-grid">
            <!-- Servicio 1 -->
            <div class="service-card">
                <div class="service-icon">🔧</div>
                <h3 class="service-name">Instalación Profesional</h3>
                <p class="service-description">Instalación profesional de aires acondicionados, freezers y neveras por técnicos certificados.</p>
                <div class="service-price">RD$2,500+</div>
                <button class="service-btn">Solicitar Servicio</button>
            </div>

            <!-- Servicio 2 -->
            <div class="service-card">
                <div class="service-icon">🛠️</div>
                <h3 class="service-name">Mantenimiento Preventivo</h3>
                <p class="service-description">Limpieza y mantenimiento completo para optimizar el rendimiento de tus equipos.</p>
                <div class="service-price">RD$1,800+</div>
                <button class="service-btn">Solicitar Servicio</button>
            </div>

            <!-- Servicio 3 -->
            <div class="service-card">
                <div class="service-icon">⚡</div>
                <h3 class="service-name">Reparación de Emergencia</h3>
                <p class="service-description">Servicio de reparación urgente las 24 horas para fallas críticas en tus equipos.</p>
                <div class="service-price">RD$3,500+</div>
                <button class="service-btn">Solicitar Servicio</button>
            </div>
        </div>

        <!-- Footer -->
        <footer class="dashboard-footer">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="#">CAMBIO</a>
                    <a href="#">Producto / Foyer</a>
                    <a href="#">Inversa o colaboración</a>
                    <a href="#">Reflexe al Producto</a>
                    <a href="#">Colaborado</a>
                </div>
                <div class="copyright">
                    <p>&copy; 2024 CLIMAXA. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Script para manejar la interactividad
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar productos al carrito
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productCard = this.closest('.product-card');
                    const productName = productCard.querySelector('.product-name').textContent;
                    const productPrice = productCard.querySelector('.product-price').textContent;
                    const productBrand = productCard.querySelector('.product-brand').textContent;
                    
                    alert(`Agregado al carrito: ${productBrand} - ${productName} - ${productPrice}`);
                    
                    const originalText = this.textContent;
                    this.textContent = '✓ Agregado';
                    this.style.background = '#2ecc71';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 2000);
                });
            });

            // Solicitar servicios
            const serviceButtons = document.querySelectorAll('.service-btn');
            serviceButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const serviceCard = this.closest('.service-card');
                    const serviceName = serviceCard.querySelector('.service-name').textContent;
                    const servicePrice = serviceCard.querySelector('.service-price').textContent;
<<<<<<< HEAD
                    
                    alert(`Servicio solicitado: ${serviceName} - ${servicePrice}`);
                    
                    const originalText = this.textContent;
                    this.textContent = '✓ Solicitado';
                    this.style.background = '#2ecc71';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 2000);
                });
            });

            // Botones de categorías
            const categoryButtons = document.querySelectorAll('.category-button');
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    let targetSection;
                    
                    if (category === 'aires') {
                        targetSection = document.getElementById('aires-section');
                    } else if (category === 'freezers') {
                        targetSection = document.getElementById('freezers-section');
                    } else if (category === 'neveras') {
                        targetSection = document.getElementById('neveras-section');
                    }
                    
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Buscar productos
            const searchInput = document.querySelector('.nav-search input');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const productCards = document.querySelectorAll('.product-card');
                const serviceCards = document.querySelectorAll('.service-card');
                
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    const productBrand = card.querySelector('.product-brand').textContent.toLowerCase();
                    
                    if (productName.includes(searchTerm) || productBrand.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });

                serviceCards.forEach(card => {
                    const serviceName = card.querySelector('.service-name').textContent.toLowerCase();
                    
                    if (serviceName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Navegación por enlaces de la barra
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const linkText = this.textContent;
                    
                    let targetSection;
                    if (linkText.includes('Aires')) {
                        targetSection = document.getElementById('aires-section');
                    } else if (linkText.includes('Freezers')) {
                        targetSection = document.getElementById('freezers-section');
                    } else if (linkText.includes('Neveras')) {
                        targetSection = document.getElementById('neveras-section');
                    } else if (linkText.includes('Servicios')) {
                        targetSection = document.getElementById('servicios-section');
                    }
                    
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
    </script>
</body>
</html>
=======
                    
                    alert(`Servicio solicitado: ${serviceName} - ${servicePrice}`);
                    
                    const originalText = this.textContent;
                    this.textContent = '✓ Solicitado';
                    this.style.background = '#2ecc71';
                    
                    setTimeout(() => {
                        this.textContent = originalText
>>>>>>> d30f07e50e9cec95238c9ce59d8d0409857b05e6

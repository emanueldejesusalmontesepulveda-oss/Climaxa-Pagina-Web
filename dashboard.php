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
            max-width: 55px; /* Reducido al 50% (de 110px a 55px) */
            height: auto;
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

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
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

        /* Categories Section */
        .categories-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--shadow);
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .category-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .category-card:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .category-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .category-name {
            font-weight: 500;
        }

        /* Sección de servicios */
        .services-section {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        .services-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 600;
        }

        .services-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .service-card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card h3 {
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            font-size: 1.2rem;
        }

        .service-card p {
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .btn-details {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: background-color 0.3s;
        }

        .btn-details:hover {
            background-color: var(--primary-dark);
        }

        .divider {
            height: 1px;
            background-color: var(--border);
            margin: 1rem 0;
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
                max-width: 50px;
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
                max-width: 45px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
            
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
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
                max-width: 40px;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .categories-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 15px;
                text-align: center;
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
                    <h2 style="font-size: 20px;">CLIMAXA</h2>
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
                <a href="#nuestros-servicios" class="nav-link">Servicios</a>
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
        <p class="page-subtitle">Ven y prueba la calidad de todos nuestros aires acondicionados, freezers y neveras.</p>

        <!-- Categories Section -->
        <div class="categories-section">
            <h2 class="section-title">Categorías Principales</h2>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">❄️</div>
                    <div class="category-name">Aires Acondicionados</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">🧊</div>
                    <div class="category-name">Freezers</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">🍎</div>
                    <div class="category-name">Neveras</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">🔧</div>
                    <div class="category-name">Servicios</div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            <!-- Producto 1 -->
            <div class="product-card">
                <div class="product-image">
                    [Imagen del Producto]
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
                    [Imagen del Producto]
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
                    [Imagen del Producto]
                </div>
                <div class="product-info">
                    <div class="product-brand">GREE</div>
                    <h3 class="product-name">Aire Acondicionado Gree Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 208 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="product-card">
                <div class="product-image">
                    [Imagen del Producto]
                </div>
                <div class="product-info">
                    <div class="product-brand">AirMax</div>
                    <h3 class="product-name">Aire Acondicionado Green Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 208 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>
        </div>

        <!-- Sección de servicios -->
        <section id="nuestros-servicios" class="services-section">
            <h2 class="services-title">Nuestros Servicios</h2>
            <div class="services-container">
                <div class="service-card">
                    <h3>Diagnóstico y Evaluación de Aire Acondicionado</h3>
                    <p>Nuestro servicio de diagnóstico y evaluación de aire acondicionado permite identificar problemas que afectan el rendimiento de su equipo. Realizamos pruebas de presión, medición de temperatura y análisis de consumo energético para ofrecerle la mejor solución.</p>
                    <a href="#" class="btn-details">Ver Detalles</a>
                </div>
                
                <div class="divider"></div>
                
                <div class="service-card">
                    <h3>Instalación Básica de Aire Acondicionado 12K-18K BTU</h3>
                    <p>Nuestro servicio de instalación básica de aire acondicionado tipo split (12,000 y 18,000 BTU) incluye montaje de unidad interior y exterior, conexión eléctrica, instalación de línea de drenaje y prueba de funcionamiento. Garantía de 6 meses en la instalación.</p>
                    <a href="#" class="btn-details">Ver Detalles</a>
                </div>
                
                <div class="divider"></div>
                
                <div class="service-card">
                    <h3>Instalación Básica de Aire Acondicionado 24,000 BTU</h3>
                    <p>Servicio de instalación básica de aire acondicionado split de 24,000 BTU. Incluye los materiales de instalación, soportes, tuberías de cobre, cableado y accesorios necesarios. Realizamos la evacuación de aire y carga de refrigerante según especificaciones del fabricante.</p>
                    <a href="#" class="btn-details">Ver Detalles</a>
                </div>
            </div>
        </section>

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
                    <p>&copy; 2025 CLIMAXA. Todos los derechos reservados.</p>
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
                    
                    // Aquí puedes agregar la lógica para añadir al carrito
                    alert(`Agregado al carrito: ${productName} - ${productPrice}`);
                    
                    // Cambiar temporalmente el texto del botón
                    const originalText = this.textContent;
                    this.textContent = '✓ Agregado';
                    this.style.background = '#2ecc71';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 2000);
                });
            });

            // Buscar productos
            const searchInput = document.querySelector('.nav-search input');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const productCards = document.querySelectorAll('.product-card');
                
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    const productBrand = card.querySelector('.product-brand').textContent.toLowerCase();
                    
                    if (productName.includes(searchTerm) || productBrand.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Navegación por categorías
            const categoryCards = document.querySelectorAll('.category-card');
            categoryCards.forEach(card => {
                card.addEventListener('click', function() {
                    const categoryName = this.querySelector('.category-name').textContent;
                    alert(`Navegando a: ${categoryName}`);
                    // Aquí puedes agregar la lógica para filtrar productos por categoría
                });
            });
            
            // Navegación suave al hacer clic en el enlace de servicios
            document.querySelector('a[href="#nuestros-servicios"]').addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('#nuestros-servicios').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
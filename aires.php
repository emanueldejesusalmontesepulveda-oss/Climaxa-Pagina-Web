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
    <title>Aires Acondicionados - CLIMAXA</title>
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
            width: 80px;
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

        .nav-link.active {
            color: var(--primary);
            font-weight: 600;
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
            overflow: hidden;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
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

        /* Back to Dashboard */
        .back-container {
            margin-bottom: 30px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
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
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
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
            
            .products-grid {
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
                <?php 
                if (file_exists('img/logo2.png')) {
                    echo '<img src="img/logo2.png" alt="CLIMAXA" class="logo">';
                } else {
                    echo '<h2 style="font-size: 18px;">CLIMAXA</h2>';
                }
                ?>
            </div>
            
            <div class="nav-search">
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar aires acondicionados...">
                </div>
            </div>
            
            <div class="nav-links">
                <a href="#" class="nav-link active">Aires acondicionados</a>
                <a href="freezers.php" class="nav-link">Freezers</a>
                <a href="neveras.php" class="nav-link">Neveras</a>
                <a href="dashboard.php" class="nav-link">Servicios</a>
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
        <div class="back-container">
            <a href="dashboard.php" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Volver a la pantalla principal
            </a>
        </div>

        <h1 class="page-title">Aires Acondicionados</h1>
        <p class="page-subtitle">Descubre nuestra amplia gama de aires acondicionados de las mejores marcas.</p>

        <div class="products-grid">
            <!-- Productos existentes del dashboard -->
            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto1.png')) {
                        echo '<img src="img/producto1.png" alt="Aire Acondicionado Gree 12,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">GREE</div>
                    <h3 class="product-name">Aire Acondicionado Gree Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 228 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto2.png')) {
                        echo '<img src="img/producto2.png" alt="Aire Acondicionado AirMax 12,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">AirMax</div>
                    <h3 class="product-name">Aire Acondicionado AirMax 12,000 BTU Inverter 21 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 167 SEER</div>
                    <div class="product-price">RD$27,200</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto3.png')) {
                        echo '<img src="img/producto3.png" alt="Aire Acondicionado Gree 12,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">GREE</div>
                    <h3 class="product-name">Aire Acondicionado Gree Inverter 12,000 BTU - 22 SEER WIFI</h3>
                    <div class="product-specs">108 BTU 208 SEER</div>
                    <div class="product-price">RD$28,900</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <!-- Productos adicionales -->
            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto4.png')) {
                        echo '<img src="img/producto4.png" alt="Aire Acondicionado Samsung 12,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">SAMSUNG</div>
                    <h3 class="product-name">Aire Acondicionado Samsung Wind-Free 12,000 BTU</h3>
                    <div class="product-specs">Tecnología Wind-Free • 22 SEER • WiFi</div>
                    <div class="product-price">RD$31,500</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto5.png')) {
                        echo '<img src="img/producto5.png" alt="Aire Acondicionado LG 18,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">LG</div>
                    <h3 class="product-name">Aire Acondicionado LG Dual Inverter 18,000 BTU</h3>
                    <div class="product-specs">Dual Inverter • 24 SEER • Plasmaster</div>
                    <div class="product-price">RD$35,800</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
            </div>

            <div class="product-card">
                <div class="product-image">
                    <?php
                    if (file_exists('img/producto6.png')) {
                        echo '<img src="img/producto6.png" alt="Aire Acondicionado TCL 24,000 BTU">';
                    } else {
                        echo '[Imagen del Aire Acondicionado]';
                    }
                    ?>
                </div>
                <div class="product-info">
                    <div class="product-brand">TCL</div>
                    <h3 class="product-name">Aire Acondicionado TCL Inverter 24,000 BTU</h3>
                    <div class="product-specs">24,000 BTU • Inverter • WiFi • 20 SEER</div>
                    <div class="product-price">RD$42,300</div>
                    <button class="add-to-cart">Agregar al carrito</button>
                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar productos al carrito
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productCard = this.closest('.product-card');
                    const productName = productCard.querySelector('.product-name').textContent;
                    const productPrice = productCard.querySelector('.product-price').textContent;
                    const productBrand = productCard.querySelector('.product-brand').textContent;
                    
                    alert('Agregado al carrito: ' + productBrand + ' - ' + productName + ' - ' + productPrice);
                    
                    const originalText = this.textContent;
                    this.textContent = '✓ Agregado';
                    this.style.background = '#2ecc71';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 2000);
                });
            });

            // Buscar productos específicos de aires
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
        });
    </script>
</body>
</html>

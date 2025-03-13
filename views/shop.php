<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .navbar-nav .nav-link:hover {
            color: red !important;
        }

        footer {
            padding: 10px 0;
            font-size: 14px;
        }

        footer h5 {
            font-size: 16px;
        }

        footer p,
        footer ul li {
            margin-bottom: 5px;
        }

        footer .social-icons a {
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="py-2" style="background-color: #405189;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-6 col-md-2 text-center">
                    <a class="navbar-brand" href="#">
                        <img src="./img/logo.PNG" alt="Logo" style="height: 40px;">
                    </a>
                </div>
                <div class="col-6 col-md-8 d-flex align-items-center justify-content-center">
                    <!-- Search Bar -->
                    <form class="d-flex w-75" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i> <!-- Đây là icon kính lúp -->
                        </button>
                    </form>
                    <a href="#" class="ms-3 text-white">
                        <i class="fas fa-shopping-cart" style="font-size: 24px;"></i>
                    </a>
                    <a href="#" class="ms-3 btn btn-outline-light">Login</a>
                    <a href="#" class="ms-3 btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg" style="background-color: black;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./Dell.php">Dell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./Hp.php">HP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./Acer.php">Acer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="./help.php">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-center">Our Products</h3>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <!-- Product Card -->
                <!-- Repeat this structure for each product -->
                <div class="row text-center d-flex flex-wrap justify-content-center">
                    <?php foreach ($products as $product): ?>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="card">
                                <img src="<?= $product['image_url'] ?: 'default-image.png' ?>" class="img-fluid" alt="">
                                <div class="card-body">
                                    <p><strong><?= $product['name'] ?></strong></p>
                                    <p><?= $product['price'] ?>vnđ</p>
                                    <a href="?act=Chitietsanpham&id=<?= $product['id'] ?>" class="btn btn-primary">Mua</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
               
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>About Us</h5>
                    <p>Chúng tôi cung cấp các tiện ích và thiết bị điện tử mới nhất với nhiều ưu đãi.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="./Home.php" class="text-white">Home</a></li>
                        <li><a href="./shop.php" class="text-white">Shop</a></li>
                        <li><a href="./help.php" class="text-white">Help</a></li>
                        <li><a href="./contact.php" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-map-marker-alt"></i> 222 Trịnh Văn Bô</p>
                    <p><i class="fas fa-phone"></i> 0987654321</p>
                    <p><i class="fas fa-envelope"></i> protechhub@gmail.com</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">&copy; 2024 Protech Hub. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
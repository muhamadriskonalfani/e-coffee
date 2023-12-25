<?php
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - M-Coffee</title>

    <!-- bootstrap 5 link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css link -->
    <link rel="stylesheet" href="assets/custom/style-index15.css">

    <style>
        
    </style>

</head>
<body>

    <div class="container-fluid">

        <header class="header">
            <a href="index.php" class="logo">
                <img src="assets/img/logo_2.png" alt="">
            </a>

            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#product">product</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
                <?php if(isset($_SESSION['userID'])) { ?>
                    <a href="login.php" style="display: none;">login</a>
                <?php } else { ?>
                    <a href="login.php">login</a>
                <?php } ?>
            </nav>

            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
                <?php 
                    if(isset($_SESSION['userID'])) {
                        $userID = $_SESSION['userID'];
                        $sqlUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$userID'");
                        $userData = mysqli_fetch_array($sqlUser);
                ?>
                    <a href="user/profile-data.php?userID=<?php echo $_SESSION['userID']; ?>" class="profile">
                        <?php if($userData['foto_profil'] == NULL) { ?>
                            <img src="assets/img/profile.jpeg" alt="">
                        <?php } else { ?>
                            <img src="assets/photo_profile/<?php echo $userData['foto_profil']; ?>" title="<?php echo $userData['username']; ?>" alt="">
                        <?php } ?>
                    </a>
                <?php
                    }
                ?>
            </div>

            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

            <div class="cart-items-container">
                <div class="cart-box">
                    <?php
                        if(isset($_SESSION['userID'])) {
                            $userID = $_SESSION['userID'];
                            $sqlCart = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE id_keranjang = '$userID'");
                            while($dataCart = mysqli_fetch_array($sqlCart)) {
                    ?>
                        <div class="cart-item">
                            <div class="cart-image">
                                <img src="assets/product_image/<?php echo $dataCart['gambar_produk']; ?>" alt="">
                            </div>
                            <div class="content">
                                <h3><?php echo $dataCart['nama_produk']; ?> <span><?php echo $dataCart['quantity']; ?>x</span></h3>
                                <div class="price">Rp.<?php echo $dataCart['harga']; ?></div>
                            </div>
                            <div class="delete-cart">
                                <a href="proses.php?delete-cart=<?php echo $dataCart['id_produk']; ?>" class="fas fa-times" onclick="return confirm('Apakah Anda Yakin?')"></a>
                            </div>
                        </div>
                    <?php
                            }
                        }
                    ?>
                </div>

                <div class="checkout">
                    <?php if(isset($_SESSION['userID'])) { ?>
                        <a href="checkout.php?cartID=<?php echo $_SESSION['userID']; ?>" class="btn">checkout now</a>
                    <?php } else { ?>
                        <a href="login.php" class="btn">checkout now</a>
                    <?php } ?>
                </div>
            </div>
        </header>

        <section class="home" id="home">
            <div class="home-text">
                <div class="content">
                    <h3>fresh coffee in the morning</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae id neque error modi! Dignissimos quisquam ex amet nesciunt esse, tempore praesentium quod distinctio molestias iste tenetur aliquam harum, asperiores minima!</p>
                    <a href="#" class="btn">get yours now</a>
                </div>
            </div>
            <div class="home-image">
                <img src="assets/img/main.png" alt="">
            </div>
        </section>

        <div class="divider"></div>

        <section class="about" id="about">
            <img src="assets/img/halaman3.png" alt="">
        </section>

        <div class="divider"></div>

        <section class="menu" id="menu">
            <h1 class="heading"> our <span>menu</span> </h1>
            <div class="box-container">
                <div class="box">
                    <div class="menu-image">
                        <img src="assets/img/toraja.jpg" alt="">
                    </div>
                    <h3>Kopi Ethiopia Yirgacheffe</h3>
                    <p>Kopi Ethiopia Yirgacheffe memiliki cita rasa buah-buahan segar dan keaslian yang unik. Rasakan aroma bunga yang harum dan rasa buah berry yang lembut dalam setiap tegukan.</p>
                </div>

                <div class="box">
                    <div class="menu-image">
                        <img src="assets/img/arabica.jpg" alt="">
                    </div>
                    <h3>Kopi Colombia Supremo</h3>
                    <p>Kopi Colombia Supremo adalah kopi yang lembut dengan rasa kacang, cokelat, dan sentuhan buah. Rasakan kenikmatan kopi Kolombia terbaik.</p>
                </div>

                <div class="box">
                    <div class="menu-image">
                        <img src="assets/img/kopi1.jpg" alt="">
                    </div>
                    <h3>Kopi Espresso Italia</h3>
                    <p>Espresso Italia adalah campuran kopi pilihan yang diolah dengan sempurna untuk menghasilkan espresso klasik. Nikmati kekuatan dan keaslian rasa dalam setiap tegukan.</p>
                </div>

                <div class="box">
                    <div class="menu-image">
                        <img src="assets/img/kopi2.jpg" alt="">
                    </div>
                    <h3>Kopi Colombia Supremo</h3>
                    <p>Kopi Colombia Supremo adalah kopi yang lembut dengan rasa kacang, cokelat, dan sentuhan buah. Rasakan kenikmatan kopi Kolombia terbaik.</p>
                </div>

            </div>
        </section>

        <div class="divider"></div>

        <section class="product" id="product">
            <h1 class="heading"> our <span>product</span> </h1>
            <div class="box-container">
                <?php
                    $sqlProduct = mysqli_query($koneksi, "SELECT * FROM tb_produk");
                    while($data = mysqli_fetch_array($sqlProduct)) {
                ?>
                    <div class="box">
                        <img src="assets/product_image/<?php echo $data['gambar_produk']; ?>" alt="">
                        <h3><?php echo $data['nama_produk']; ?></h3>
                        <div class="price"><?php echo $data['harga']; ?> <span>20.99</span></div>
                        <?php if(isset($_SESSION['userID'])) { ?>
                            <a href="proses.php?id_produk=<?php echo $data['id_produk']; ?>" class="btn">add to cart</a>
                        <?php } else { ?>
                            <a href="login.php" class="btn">add to cart</a>
                        <?php } ?>
                    </div>
                <?php
                    }
                ?>
            </div>
        </section>

        <div class="divider"></div>

        <section class="review" id="review">
            <h1 class="heading"> customer's <span>review</span></h1>
            <div class="box-container">
                <div class="box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse laborum a velit rem! Unde nam praesentium aperiam fugiat similique iusto necessitatibus quibusdam, debitis neque dolor veritatis error nisi consectetur minus officia.</p>
                    <img src="assets/img/logo2.png" class="user" alt="">
                    <h3>john doe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                
                <div class="box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse laborum a velit rem! Unde nam praesentium aperiam fugiat similique iusto necessitatibus quibusdam, debitis neque dolor veritatis error nisi consectetur minus officia.</p>
                    <img src="assets/img/logo2.png" class="user" alt="">
                    <h3>john doe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="box">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse laborum a velit rem! Unde nam praesentium aperiam fugiat similique iusto necessitatibus quibusdam, debitis neque dolor veritatis error nisi consectetur minus officia.</p>
                    <img src="assets/img/logo2.png" class="user" alt="">
                    <h3>john doe</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </section>

        <div class="divider"></div>

        <section class="contact" id="contact">
            <img src="assets/img/halaman4.png" alt="">
        </section>

        <div class="divider"></div>

        <section class="footer">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
                <a href="#" class="fab fa-pinterest"></a>
            </div>
            <div class="links">
                <a href="#">home</a>
                <a href="#">about</a>
                <a href="#">menu</a>
                <a href="#">products</a>
                <a href="#">review</a>
                <a href="#">contact</a>
                <a href="#">blogs</a>
            </div>
            <div class="credit">created by <span>mr. web designer</span> | all right reserve</div>
        </section>

    </div>


    <!-- custom js file link -->
    <script src="assets/custom/script-index2.js"></script>
</body>
</html>




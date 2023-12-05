<?php
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototype 1</title>

    <!-- bootstrap 5 link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css link -->
    <link rel="stylesheet" href="assets/custom/style-index7.css">

</head>
<body>
    <div class="container-fluid">

        <header class="header">
            <a href="#" class="logo">
                <img src="assets/img/logo2.png" alt="">
            </a>

            <nav class="navbar">
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#product">product</a>
                <a href="#review">review</a>
                <a href="#contact">contact</a>
                <a href="form-login.php">login</a>
            </nav>

            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>

            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

            <div class="cart-items-container">
                <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="assets/img/logo2.png" alt="">
                    <div class="content">
                        <h3>cart item 1</h3>
                        <div class="price">$15.99</div>
                    </div>
                </div>
                <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="assets/img/logo2.png" alt="">
                    <div class="content">
                        <h3>cart item 2</h3>
                        <div class="price">$15.99</div>
                    </div>
                </div>
                <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="assets/img/logo2.png" alt="">
                    <div class="content">
                        <h3>cart item 3</h3>
                        <div class="price">$15.99</div>
                    </div>
                </div>
                <div class="cart-item">
                    <span class="fas fa-times"></span>
                    <img src="assets/img/logo2.png" alt="">
                    <div class="content">
                        <h3>cart item 4</h3>
                        <div class="price">$15.99</div>
                    </div>
                </div>
                <a href="#" class="btn">checkout now</a>
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
                <div class="box">
                    <img src="assets/img/p1.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p2.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p3.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p4.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p5.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p6.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p5.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
                <div class="box">
                    <img src="assets/img/p6.png" alt="">
                    <h3>tasty and healty</h3>
                    <div class="price">$15.99 <span>20.99</span></div>
                    <a href="#" class="btn">add to cart</a>
                </div>
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
    <script src="assets/custom/script-index1.js"></script>
</body>
</html>




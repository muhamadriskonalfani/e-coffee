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

    <style>
        :root {
            --white: #fff;
            --black: #1a1a1a;
            --main-color: #d3ad7f;
            --btn-primary: #0d6efd;
            --btn-primary-hover: #0a58ca;

            /* --border: 1px solid black; */
            --border: none;
        }

        body {
            background: var(--white);
            background-image: url(assets/img/bg.png);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            background: var(--white);
            display: grid;
            grid-template-areas: 'header sidebar'
                                 'main sidebar';
            grid-template-columns: 2fr 1.4fr;
            grid-template-rows: 1fr;
            padding: 1rem;
            min-height: 100vh;

            border: var(--border);
        }
        
        .header {
            grid-area: header;
            background: var(--white);
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            padding: 0 2rem;
            overflow: hidden;

            border: var(--border);
        }
        
        .main {
            grid-area: main;
            padding: 2rem;
            min-height: 100vh;
            overflow: hidden;

            border: var(--border);
        }
        
        .sidebar {
            grid-area: sidebar;
            background: var(--main-color);
            padding: 1rem;
            min-height: 100vh;
            overflow: hidden;

            border: var(--border);
        }

        .sidebar .cart-item {
            background: var(--white);
            display: grid;
            grid-template-areas: 'image content delete';
            grid-template-columns: 1fr 4fr 1fr;
            margin-bottom: 1rem;
            padding: 1rem;

            border: var(--border);
        }
        
        .sidebar .cart-item .cart-image {
            grid-area: image;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 4rem;
            min-height: 4rem;
            overflow: hidden;

            border: var(--border);
        }

        .sidebar .cart-item .cart-image img {
            width: 100%;
            height: 100%;
            transition: .6s;
        }

        .sidebar .cart-item:hover .cart-image img {
            transform: scale(1.35);
        }

        .sidebar .cart-item .cart-content {
            grid-area: content;
            padding: 0 1rem;

            border: var(--border);
        }

        .sidebar .cart-item .cart-content h6#qty {
            display: flex;
            justify-content: space-between;

            border: var(--border);
        }

        .sidebar .cart-item .cart-delete {
            grid-area: delete;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            font-size: 1.5rem;

            border: var(--border);
        }

        .sidebar .cart-item .cart-delete .fa-times {
            text-decoration: none;
            transition: .2s;
            color: var(--black);

            border: var(--border);
        }
        
        .sidebar .cart-item .cart-delete .fa-times:hover {
            color: var(--main-color);
        }


        .main {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .main .information .contact {
            margin-bottom: 2rem;

            border: var(--border);
        }

        .main .information .contact h5 {
            margin-bottom: 1.7rem;

            border:  var(--border);
        }

        .main .information .contact .contact-info {
            display: grid;
            grid-template-areas: 'item1 item2'
                                 'item3 item4'
                                 'item5 item5';
            grid-template-columns: repeat(2, 1fr);
            column-gap: 2rem;
            row-gap: 1.5rem;
            margin-bottom: 2rem;

            border: var(--border);
        }

        .main .information .contact .contact-info .info-item {
            border: var(--border);
        }

        .main .information .contact .contact-info .info-item:last-child {
            grid-area: item5;

            border: var(--border);
        }

        .main .information .contact .contact-info .info-item h6 {
            color: var(--black);
            
            border: var(--border);
        }


        .sidebar .subtotal {
            padding: 1rem;
            text-align: center;

            border: var(--border);
        }

        .main .order {
            display: flex;
            justify-content: center;
            align-items: center;

            border: var(--border);
        }

        .sidebar .subtotal h5 {
            display: flex;
            justify-content: space-between;

            border: var(--border);
        }


        .btn {
            width: 100%;
            padding: .4rem 1.5rem;
            font-size: 1.5rem;
            color: var(--white);
            background: var(--main-color);
            cursor: pointer;
            transition: .1s;
        }

        .btn:hover {
            color: var(--white);
            letter-spacing: .07rem;
        }
    </style>

</head>
<body>

    <form method="POST" action="proses.php">
        <div class="container">
            <div class="header">
                <a href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </a>
                <h1>Checkout</h1>
            </div>

            <div class="sidebar">
                <?php
                    if(isset($_GET['cartID'])) {
                        $cartID = $_GET['cartID'];
                        $sqlCart = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE id_keranjang = '$cartID'");
                        while($dataCart = mysqli_fetch_array($sqlCart)) {
                ?>
                    <div class="cart-item">
                        <div class="cart-image">
                            <img src="assets/img/<?php echo $dataCart['gambar_produk']; ?>" alt="x">
                        </div>
                        <div class="cart-content">
                            <h6 id="qty"><?php echo $dataCart['nama_produk']; ?> <span><?php echo $dataCart['quantity']; ?>x</span></h6>
                            <h6>Rp.<?php echo $dataCart['harga'] / $dataCart['quantity']; ?>/pcs</h6>
                            <h6>Total Rp.<?php echo $dataCart['harga']; ?></h6>
                        </div>
                        <div class="cart-delete">
                            <a href="#" data-product-id="<?php echo $dataCart['id_produk']; ?>" class="fas fa-times delete-product"></a>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>

                <div class="subtotal">
                    <?php
                        if(isset($_GET['cartID'])) {
                            $cartID = $_GET['cartID'];

                            // Menghitung jumlah total barang
                            $sqlSumQuantity = mysqli_query($koneksi, "SELECT SUM(quantity) AS total_barang FROM tb_keranjang WHERE id_keranjang = '$cartID'");
                            if($sqlSumQuantity) {
                                $resultQuantity = mysqli_fetch_array($sqlSumQuantity);
                                $totalBarang = $resultQuantity['total_barang'];
                            }

                            // Menghitung total harga
                            $sqlSumPrice = mysqli_query($koneksi, "SELECT SUM(harga) AS total_harga FROM tb_keranjang WHERE id_keranjang = '$cartID'");
                            if($sqlSumPrice) {
                                $resultSum = mysqli_fetch_array($sqlSumPrice);
                                $totalHarga = $resultSum['total_harga'];
                            }        
                    ?>
                        <h5>Total Barang: <span><?php echo $totalBarang; ?> pcs</span></h5>
                        <h5>Total Pesanan <span>Rp.<?php echo $totalHarga; ?></span></h5>
                        <input type="hidden" name="quantity" value="<?php echo $totalBarang; ?>">
                        <input type="hidden" name="jumlah_total" value="<?php echo $totalHarga; ?>">
                    <?php
                        }
                    ?>
                </div>

            </div>

            <div class="main">
                <!-- Form Detail Pengguna -->
                <?php
                    if(isset($_GET['cartID'])):
                        $cartID = $_GET['cartID'];
                        $sqlUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$cartID'");
                        $dataUser = mysqli_fetch_array($sqlUser);
                ?>
                    <div class="information">
                        <div class="contact">
                            <h5>1. Contact Information</h5>
                            <div class="contact-info">
                                <input type="hidden" name="id_pengguna" value="<?php echo $dataUser['id_pengguna']; ?>">
                                <div class="info-item">
                                    <h6>First Name</h6>
                                    <input class="form-control" type="text" name="nama_depan" placeholder="Nama depan" value="<?php echo $dataUser['nama_depan'] ?>" required>
                                </div>
                                <div class="info-item">
                                    <h6>Last Name</h6>
                                    <input class="form-control" type="text" name="nama_belakang" placeholder="Nama belakang" value="<?php echo $dataUser['nama_belakang'] ?>" required>
                                </div>
                                <div class="info-item">
                                    <h6>Phone</h6>
                                    <input class="form-control" type="text" name="nomor_telepon" placeholder="Nomor telepon" value="<?php echo $dataUser['nomor_telepon'] ?>" required>
                                </div>
                                <div class="info-item">
                                    <h6>E-mail</h6>
                                    <input class="form-control" type="email" name="alamat_email" placeholder="Email" value="<?php echo $dataUser['alamat_email'] ?>" required>
                                </div>
                                <div class="info-item wide">
                                    <h6>Address</h6>
                                    <textarea class="form-control" name="alamat_pengiriman" placeholder="Alamat pengiriman" required><?php echo $dataUser['alamat_pengiriman']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="order">
                        <button type="submit" name="order" class="btn make-order">buat pesanan</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <?php
        if(isset($_GET['delete-cart'])) {
            $delCartID = $_GET['delete-cart'];
            if(isset($_SESSION['userID'])) {
                $userID = $_SESSION['userID'];
                $sqlDeleteCart = mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE id_pengguna = '$userID' AND id_produk = '$delCartID'");
                if($sqlDeleteCart) {
                    echo "<meta http-equiv=refresh content=0;URL='checkout.php?cartID=$userID'>";
                }
            }
        }
    ?>

    <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
    
    <script>
        
        // Delete Product Item
        const deleteButtons = document.querySelectorAll('.delete-product');

        deleteButtons.forEach((button) => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `?delete-cart=${productId}`;
                    } else {
                        Swal.fire("Cancelled", "Your file is safe :)", "info");
                    }
                });
            });
        });
        
    </script>
</body>
</html>




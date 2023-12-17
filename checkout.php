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
        body {
            background: #fff;
            /* background-image: url(assets/img/checkout-bg.jpg); */
            background-size: cover;
            background-attachment: fixed;
        }

        .container {
            display: grid;
            grid-template-areas: 'header sidebar'
                                 'main sidebar';
            grid-template-columns: 2fr 1.4fr;
            grid-template-rows: 5rem;
            background: #fff;
            padding: 1rem;

            /* border: 1px solid black; */
        }
        
        .header {
            grid-area: header;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            padding: 2rem;
            background: #fff;
            overflow: hidden;

            /* border: 1px solid black; */
        }
        
        .main {
            grid-area: main;
            padding: 2rem;
            min-height: 100vh;
            overflow: hidden;

            /* border: 1px solid black; */
        }
        
        .sidebar {
            grid-area: sidebar;
            padding: 1rem;
            min-height: 100vh;
            background: #eee;
            overflow: hidden;
        }

        .sidebar .cart-item {
            display: grid;
            grid-template-areas: 'image content delete';
            grid-template-columns: 1fr 4fr 1fr;
            margin-bottom: 1rem;
            background: #fff;
            padding: 1rem;

            /* border: 1px solid grey; */
        }
        
        .sidebar .cart-item .cart-image {
            grid-area: image;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 4rem;
            overflow: hidden;
        }

        .sidebar .cart-item .cart-image img {
            width: 100%;
            transition: .6s;
        }

        .sidebar .cart-item:hover .cart-image img {
            transform: scale(1.35);
        }

        .sidebar .cart-item .cart-content {
            grid-area: content;
            padding: 0 1rem;
        }

        .sidebar .cart-item .cart-content h6#qty {
            display: flex;
            justify-content: space-between;
        }

        .sidebar .cart-item .cart-delete {
            grid-area: delete;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
        }

        .sidebar .cart-item .cart-delete .fa-times {
            transition: .2s;
        }
        
        .sidebar .cart-item .cart-delete .fa-times:hover {
            transform: scale(1.2);
        }


        .main .information .contact {
            margin-bottom: 2rem;
        }

        .main .information .contact h5 {
            margin-bottom: 2rem;

            /* border:  1px solid black; */
        }

        .main .information .contact .contact-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .main .information .contact .contact-info .info-item {
            width: 280px;

            /* border: 1px solid black; */
        }

        .main .information .contact .contact-info .info-item.wide {
            width: 100%;
        }

        .main .information .contact .contact-info .info-item h6 {
            text-transform: uppercase;
        }

        .main .information .delivery {
            margin-bottom: 2rem;
        }

        .main .information .delivery h5,
        .main .information .payment h5 {
            margin-bottom: 2rem;
        }

        .main .information .delivery .delivery-box,
        .main .information .payment .payment-box {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 2rem;
        }

        .main .information .delivery .delivery-box .delivery-item,
        .main .information .payment .payment-box .payment-item {
            width: 7rem;
            height: 4rem;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main .information .delivery .delivery-box .delivery-item:hover,
        .main .information .payment .payment-box .payment-item:hover {
            border: 2px solid #0f0;
        }

        .main .information .delivery .delivery-box .delivery-item.active,
        .main .information .payment .payment-box .payment-item.active {
            border: 2px solid #0f0;
        }

        .main .information .delivery .delivery-box .delivery-item input,
        .main .information .payment .payment-box .payment-item input {
            display: unset;
        }

        .main .information .delivery .delivery-box .delivery-item img,
        .main .information .payment .payment-box .payment-item img {
            width: 100%;
        }


        .sidebar .subtotal {
            padding: 1rem;
            text-align: center;
        }

        .main .order {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar .subtotal h5 {
            display: flex;
            justify-content: space-between;
        }


        .btn {
            width: 100%;
            padding: .4rem 1.5rem;
            font-size: 1.5rem;
            color: #fff;
            background: #d3ad7f;
            cursor: pointer;
            transition: .1s;
        }

        .btn:hover {
            color: #fff;
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
                            <a href="?delete-cart=<?php echo $dataCart['id_produk']; ?>" class="fas fa-times" onclick="return confirm('Apakah Anda Yakin?')"></a>
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
                            $sqlSumPrice = mysqli_query($koneksi, "SELECT SUM(harga) AS total_harga FROM tb_keranjang WHERE id_keranjang = '$cartID'");
                            if($sqlSumPrice) {
                                $resultSum = mysqli_fetch_array($sqlSumPrice);
                                $totalHarga = $resultSum['total_harga'];
                            }        
                    ?>
                        <h5>Total Pesanan <span>Rp.<?php echo $totalHarga; ?></span></h5>
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
                        <hr>

                        <div class="delivery">
                            <h5>2. Delivery Method</h5>
                            <div class="delivery-box">
                                <div class="delivery-item">
                                    <input type="radio" id="delivery1" name="delivery" required>
                                    <label for="delivery1"><img src="assets/img/jne.jpeg" alt=""></label>
                                </div>
                                <div class="delivery-item">
                                    <input type="radio" id="delivery2" name="delivery" required>
                                    <label for="delivery2"><img src="assets/img/jnt.jpeg" alt=""></label>
                                </div>
                                <div class="delivery-item">
                                    <input type="radio" id="delivery3" name="delivery" required>
                                    <label for="delivery3"><img src="assets/img/sicepat.jpeg" alt=""></label>
                                </div>
                                <div class="delivery-item">
                                    <input type="radio" id="delivery4" name="delivery" required>
                                    <label for="delivery4"><img src="assets/img/gosend.jpeg" alt=""></label>    
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="payment">
                            <h5>3. Payment Method</h5>
                            <div class="payment-box">
                                <div class="payment-item">
                                    <input type="radio" id="payment1" name="payment" required>
                                    <label for="payment1"><img src="assets/img/bca.jpeg" alt=""></label>
                                </div>
                                <div class="payment-item">
                                    <input type="radio" id="payment2" name="payment" required>
                                    <label for="payment2"><img src="assets/img/gopay.jpeg" alt=""></label>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="order">
                        <button type="button" name="order" class="btn make-order">buat pesanan</button>
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
        const deliverItems = document.querySelectorAll('.delivery-item');
        for (let i = 0; i < deliverItems.length; i++) {
            deliverItems[i].addEventListener('click', () => {
                deliverItems.forEach((e) => {
                    e.classList.remove('active');
                })
                deliverItems[i].classList.add('active');
            })
        }

        const paymentItem = document.querySelectorAll('.payment-item');
        for (let i = 0; i < paymentItem.length; i++) {
            paymentItem[i].addEventListener('click', () => {
                paymentItem.forEach((e) => {
                    e.classList.remove('active');
                })
                paymentItem[i].classList.add('active');
            })
        }


        // Form Validasi
        const orderBtn = document.querySelector('.make-order');
        function validateForm() {
            orderBtn.removeEventListener('click', validateForm); // dibawah ada kode untuk klik orderBtn secara otomatis, kode ini ditambahkan supaya orderBtn tidak menjalankan fungsi validateForm 2 kali

            const delivery = document.querySelector('input[name="delivery"]:checked');
            const payment = document.querySelector('input[name="payment"]:checked');

            if(delivery !== null && payment !== null) { // jika delivery dan payment tidak null
                Swal.fire({
                    title: "Buat pesanan?",
                    text: "Total tagihan Rp.<?php echo $totalHarga; ?>",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        orderBtn.type = 'submit'; // mengganti tipe button dengan tipe submit pada orderBtn
                        orderBtn.click(); // orderBtn diklik secara otomatis
                    } else {
                        orderBtn.addEventListener('click', validateForm); // jika blok else dieksekusi maka orderBtn tidak memiliki event lagi, karena itu kode ini ditambahkan
                    }
                })
            } else { // jika delivery atau payment tidak diisi
                Swal.fire({
                    title: "Ada yang terlewat...",
                    text: "Silahkan lengkapi data anda!",
                    icon: "info"
                });
                orderBtn.addEventListener('click', validateForm); // jika blok else dieksekusi maka orderBtn tidak memiliki event lagi, karena itu kode ini ditambahkan
            }
        }
        orderBtn.addEventListener('click', validateForm); // jika orderBtn diklik maka akan menjalankan fungsi validateForm

        
        
    </script>
</body>
</html>


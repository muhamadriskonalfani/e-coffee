<?php
    include('koneksi.php');
    session_start();

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sqlLogin = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE alamat_email = '$email' AND password = '$pass'");
        $userID = mysqli_fetch_array($sqlLogin)['id_pengguna'];
        $checkUser = mysqli_num_rows($sqlLogin);
        if(!$checkUser) {
            $sqlAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE email = '$email' AND password = '$pass'");
            $adminID = mysqli_fetch_array($sqlAdmin)['id_admin'];
            $checkAdmin = mysqli_num_rows($sqlAdmin);
            if($checkAdmin) {
                $_SESSION['adminID'] = $adminID;
                header('location: admin/admin.php');
            } else {
                $_SESSION['gagal'] = "Username atau Password yang anda masukan salah. Silahkan coba lagi";
                header('location: form-login.php');
            }
        } else if($checkUser) {
            $_SESSION['userID'] = $userID;
            header('location: index.php');
        }
    }

    if(isset($_POST['daftar'])) {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confirm = $_POST['confirm-password'];

        if($pass !== $confirm) {
            $_SESSION['gagal'] = "Password yang anda masukan berbeda";
            header('location: form-daftar.php');
        } else {
            $sqlDaftar = mysqli_query($koneksi, "INSERT INTO tb_pengguna (id_pengguna, username, password, nama_depan, nama_belakang, alamat_email, alamat_pengiriman, nomor_telepon, tanggal_registrasi) VALUES (NULL, '$user', '$pass', '', '', '$email', '', '', NOW())");
            if($sqlDaftar) {
                $dataDaftar = array(
                    'email' => $email,
                    'pass' => $pass
                );
                $_SESSION['dataDaftar'] = $dataDaftar;
                header('location: form-login.php');
            } else {
                $_SESSION['gagal'] = "Username atau Password sudah digunakan";
                header('location: form-daftar.php');
            }
        }
    }

    if(isset($_GET['id_produk'])) {
        if(!isset($_SESSION['userID'])) {
            header('location: form-login.php');
        } else {
            $userID = $_SESSION['userID'];
            $cartID = $userID;
            $id_produk = $_GET['id_produk'];

            $sqlProduct = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk = '$id_produk'");
            $dataProduk = mysqli_fetch_array($sqlProduct);

            $nama = $dataProduk['nama_produk'];
            $gambar = $dataProduk['gambar_produk'];
            $harga = $dataProduk['harga'];
            $quantity = 1;

            $sqlCart = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE id_keranjang = '$cartID' AND id_produk = '$id_produk'");
            $dataCart = mysqli_fetch_array($sqlCart);
            $checkCart = mysqli_num_rows($sqlCart);
            if(!$checkCart) {
                $sqlInsert = mysqli_query($koneksi, "INSERT INTO tb_keranjang (id_keranjang, id_pengguna, id_produk, nama_produk, gambar_produk, harga, quantity, tanggal_pembuatan) VALUES('$cartID', '$userID', '$id_produk', '$nama', '$gambar', '$harga', '$quantity', NOW())");
                if($sqlInsert) {
                    header('location: index.php#product');
                }

            } else {
                $upQuantity = $dataCart['quantity'] + 1;
                $upHarga = $harga * $upQuantity;

                $sqlUpdate = mysqli_query($koneksi, "UPDATE tb_keranjang SET harga = '$upHarga', quantity = '$upQuantity' WHERE id_produk = '$id_produk'");
                if($sqlUpdate) {
                    header('location: index.php#product');
                }
            }    
        }
    }

    if(isset($_POST['order'])) {
        $userID = $_POST['id_pengguna'];
        $firstName = $_POST['nama_depan'];
        $lastName = $_POST['nama_belakang'];
        $address = $_POST['alamat_pengiriman'];
        $emailAdd = $_POST['alamat_email'];
        $phone = $_POST['nomor_telepon'];
        $subTotal = $_POST['jumlah_total'];
        

        $sqlMakeOrder = mysqli_query($koneksi, "INSERT INTO tb_pesanan (id_pesanan, id_pengguna, nama_depan, nama_belakang, alamat_pengiriman, alamat_penagihan, alamat_email, nomor_telepon, tanggal_pesanan, jumlah_total, status_pesanan, metode_pembayaran, status_pembayaran, metode_pengiriman, nomor_pelacakan, catatan) VALUES (NULL, '$userID', '$firstName', '$lastName', '$address', '', '$emailAdd', '$phone', NOW(), '$subTotal', '', '', '', '', '', '')");

        if($sqlMakeOrder) {
            header('location: detail_pesanan.php');
        }
    }

    if(isset($_GET['delete-cart'])) {
        $delCartID = $_GET['delete-cart'];
        if(isset($_SESSION['userID'])) {
            $userID = $_SESSION['userID'];
            $sqlDeleteCart = mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE id_pengguna = '$userID' AND id_produk = '$delCartID'");
            if($sqlDeleteCart) {
                header('location: index.php');
            }
        }
    }
    

?>

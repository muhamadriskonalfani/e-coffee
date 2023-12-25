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
                header('location: login.php');
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
            header('location: register.php');
        } else {
            $sqlDaftar = mysqli_query($koneksi, "INSERT INTO tb_pengguna (id_pengguna, username, password, nama_depan, nama_belakang, alamat_email, alamat_pengiriman, nomor_telepon, tanggal_registrasi) VALUES (NULL, '$user', '$pass', '', '', '$email', '', '', NOW())");
            if($sqlDaftar) {
                $dataDaftar = array(
                    'email' => $email,
                    'pass' => $pass
                );
                $_SESSION['dataDaftar'] = $dataDaftar;
                header('location: login.php');
            } else {
                $_SESSION['gagal'] = "Username atau Password sudah digunakan";
                header('location: register.php');
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
        $quantity = $_POST['quantity'];
        $subTotal = $_POST['jumlah_total'];
        

        $sqlMakeOrder = mysqli_query($koneksi, "INSERT INTO tb_pesanan (id_pesanan, id_pengguna, nama_depan, nama_belakang, alamat_pengiriman, alamat_email, nomor_telepon, tanggal_pesanan, quantity, jumlah_total, status_pesanan, status_pembayaran) VALUES (NULL, '$userID', '$firstName', '$lastName', '$address', '$emailAdd', '$phone', NOW(), '$quantity', '$subTotal', '', '')");

        if($sqlMakeOrder) {
            $orderID = $koneksi->insert_id;
            header("location: midtrans/examples/snap/checkout-process-simple-version.php?order_id=$orderID");
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

    if(isset($_POST['edit-profile'])) {
        $userID = $_POST['id_pengguna'];
        $nickname = $_POST['nama_depan'];
        $last_name = $_POST['nama_belakang'];
        $username = $_POST['username'];
        $email = $_POST['alamat_email'];
        $gender = $_POST['jenis_kelamin'];
        $phone = $_POST['nomor_telepon'];
        $address = $_POST['alamat_pengiriman'];
        $city = $_POST['kota'];

        $sqlUpdateProfile = mysqli_query($koneksi, "UPDATE tb_pengguna SET nama_depan = '$nickname', nama_belakang = '$last_name', username = '$username', alamat_email = '$email', jenis_kelamin = '$gender', nomor_telepon = '$phone', alamat_pengiriman = '$address', kota = '$city' WHERE id_pengguna = '$userID'");

        if($sqlUpdateProfile) {
            header('location: user/profile-data.php');
        }
    }

    if(isset($_POST['update-photo'])) {
        $userID = $_POST['id_pengguna'];

        $dir = "assets/photo_profile/";
        $sqlUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$userID'");
        $dataUser = mysqli_fetch_assoc($sqlUser);

        if($dataUser['foto_profil'] == "") {
            $foto_profil = $userID.$_FILES['foto_profil']['name'];
        } else {
            $foto_profil = $userID.$_FILES['foto_profil']['name'];
            unlink($dir.$dataUser['foto_profil']);
        }

        $tmp_file = $_FILES['foto_profil']['tmp_name'];
        move_uploaded_file($tmp_file, $dir.$foto_profil);

        $sqlUpdatePhoto = mysqli_query($koneksi, "UPDATE tb_pengguna SET foto_profil = '$foto_profil' WHERE id_pengguna = '$userID'");
        if($sqlUpdatePhoto) {
            $_SESSION['berhasil'] = "Data berhasil diperbarui";
            header('location: user/profile-data.php');
        } else {
            $_SESSION['gagal'] = "Data gagal diperbarui";
            header('location: user/profile-data.php');
        }
        
    }
    

?>


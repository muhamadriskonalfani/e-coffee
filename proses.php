<?php
    include('koneksi.php');
    session_start();

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE alamat_email = '$email' AND password = '$pass'");
        $user = mysqli_fetch_array($query)['username'];
        $check = mysqli_num_rows($query);
        if(!$check) {
            $query2 = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE email = '$email' AND password = '$pass'");
            $admin = mysqli_fetch_array($query2)['username'];
            $check2 = mysqli_num_rows($query2);
            if($check2) {
                $_SESSION['admin'] = $admin;
                header('location: admin/admin.php');
            } else {
                $_SESSION['gagal'] = "Username atau Password yang anda masukan salah. Silahkan coba lagi";
                header('location: form-login.php');
            }
        } else if($check) {
            $_SESSION['user'] = $user;
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
            $query = mysqli_query($koneksi, "INSERT INTO tb_pengguna (username, password, nama_depan, nama_belakang, alamat_email, alamat_pengiriman, nomor_telepon, tanggal_registrasi) VALUES ('$user', '$pass', '', '', '$email', '', '', NOW())");
            if($query) {
                $data = array(
                    'email' => $email,
                    'pass' => $pass
                );
                $_SESSION['data'] = $data;
                header('location: form-login.php');
            } else {
                $_SESSION['gagal'] = "Username atau Password sudah digunakan";
                header('location: form-daftar.php');
            }
        }
    }

    
?>

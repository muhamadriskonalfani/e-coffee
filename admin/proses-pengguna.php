<?php
    include('../koneksi.php');
    session_start();

    // Tambah Pengguna
    if(isset($_POST['tambah-pengguna'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $alamat_email = $_POST['alamat_email'];
        $alamat_pengiriman = $_POST['alamat_pengiriman'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $tanggal_registrasi = $_POST['tanggal_registrasi'];
        $query = mysqli_query($koneksi, "INSERT INTO tb_pengguna (username, password, nama_depan, nama_belakang, alamat_email, alamat_pengiriman, nomor_telepon, tanggal_registrasi) VALUES ('$username', '$password', '$nama_depan', '$nama_belakang', '$alamat_email', '$alamat_pengiriman', '$nomor_telepon', '$tanggal_registrasi')");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil ditambahkan";
            header('location: pengguna.php');
        } else {
            $_SESSION['gagal'] = "Data gagal ditambahkan";
            header('location: pengguna.php');
        }
    }

    // Edit pengguna
    if(isset($_POST['edit-pengguna'])) {
        $id_pengguna = $_POST['id_pengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $alamat_email = $_POST['alamat_email'];
        $alamat_pengiriman = $_POST['alamat_pengiriman'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $tanggal_registrasi = $_POST['tanggal_registrasi'];
        $query = mysqli_query($koneksi, "UPDATE tb_pengguna SET username = '$username', password = '$password', nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', alamat_email = '$alamat_email', alamat_pengiriman = '$alamat_pengiriman', nomor_telepon = '$nomor_telepon', tanggal_registrasi = '$tanggal_registrasi' WHERE id_pengguna = '$id_pengguna'");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil diperbarui";
            header('location: pengguna.php');
        } else {
            $_SESSION['gagal'] = "Data gagal diperbarui";
            header('location: pengguna.php');
        }
    }

    // Hapus pengguna
    if(isset($_GET['hapus-pengguna'])) {
        $id_pengguna = $_GET['hapus-pengguna'];
        $query = mysqli_query($koneksi, "DELETE FROM tb_pengguna WHERE id_pengguna = '$id_pengguna'");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil dihapus";
            header('location: pengguna.php');
        }
    }

?>

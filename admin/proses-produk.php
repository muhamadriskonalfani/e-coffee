<?php
    include('../koneksi.php');
    session_start();

    // Tambah Produk
    if(isset($_POST['tambah-produk'])) {
        $nama_produk = $_POST['nama_produk'];
        $gambar_produk = $_POST['gambar_produk'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $query = mysqli_query($koneksi, "INSERT INTO tb_produk (nama_produk, gambar_produk, deskripsi, harga, stok) VALUES ('$nama_produk', '$gambar_produk', '$deskripsi', '$harga', '$stok')");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil ditambahkan";
            header('location: produk.php');
        } else {
            $_SESSION['gagal'] = "Data gagal ditambahkan";
            header('location: produk.php');
        }
    }

    // Edit Produk
    if(isset($_POST['edit-produk'])) {
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $gambar_produk = $_POST['gambar_produk'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $query = mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk = '$nama_produk', gambar_produk = '$gambar_produk', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok' WHERE id_produk = '$id_produk'");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil diperbarui";
            header('location: produk.php');
        } else {
            $_SESSION['gagal'] = "Data gagal diperbarui";
            header('location: produk.php');
        }
    }

    // Hapus Produk
    if(isset($_GET['hapus-produk'])) {
        $id_produk = $_GET['hapus-produk'];
        $query = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_produk = '$id_produk'");
        if($query) {
            $_SESSION['berhasil'] = "Data berhasil dihapus";
            header('location: produk.php');
        }
    }

?>

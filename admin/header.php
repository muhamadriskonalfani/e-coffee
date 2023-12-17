<?php
    include('../koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css">

    <style>

        :root {
            --main-color: #d3ad7f;
            --black: #13131a;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: .2s linear;
        }

        .container-fluid {
            padding: 0;
            display: grid;
            grid-template-areas: 'header header'
                                'aside main';
            grid-template-columns: 250px;
            grid-template-rows: 70px;
            height: 100vh;
            overflow: hidden;
        }

        .header {
            grid-area: header;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ddd;
            padding: 0 4%;
        }

        header a {
            text-decoration: none;
        }

        .header h5 {
            color: var(--black);
        }

        .header h6 {
            color: var(--black);
        }


        .aside {
            grid-area: aside;
            padding: 20px;
            background: #eee;
        }

        .aside .links {
            margin-top: 20px;
        }

        .aside .aside-btn {
            width: 100%;
            border: none;
            text-align: left;
        }

        .main {
            grid-area: main;
            padding: 20px;
            background: var(--white);
            overflow: auto;
        }

        .main::-webkit-scrollbar {
            width: .8rem;
        }

        .main::-webkit-scrollbar-track {
            background: transparent;
        }

        .main::-webkit-scrollbar-thumb {
            background: var(--white);
            border-radius: 5rem;
        }

    </style>
</head>
<body>
    <div class="container-fluid">

        <header class="header">
            <div class="title">
                <a href="../index.php"><h5>Monoline Coffee</h5></a>
            </div>
            
            <?php 
                if(isset($_SESSION['adminID'])) {
                    $adminID = $_SESSION['adminID'];
                    $sqlAdmin = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin = '$adminID'");
                    $adminName = mysqli_fetch_array($sqlAdmin)['username'];
            ?>
                <h6>Hi, <?php echo $adminName; ?></h6>
            <?php 
                }
            ?>
        </header>

        <section class="aside">
            <div class="logo">
                <img src="../assets/img/logo_2.png" alt="" class="img-thumbnail">
            </div>

            <div class="links">
                <ul class="list-unstyled">
                    <li class="list-item"><a href="admin.php" class="btn btn-outline-primary mb-2 aside-btn">Dashboard</a></li>
                    <li class="list-item"><a href="produk.php" class="btn btn-outline-primary mb-2 aside-btn">Produk</a></li>
                    <li class="list-item"><a href="pengguna.php" class="btn btn-outline-primary mb-2 aside-btn">Pengguna</a></li>
                    <li class="list-item"><a href="pesanan.php" class="btn btn-outline-primary mb-2 aside-btn">Pesanan</a></li>
                    <li class="list-item"><a href="laporan.php" class="btn btn-outline-primary mb-2 aside-btn">Laporan</a></li>
                    <li class="list-item"><a href="pengaturan.php" class="btn btn-outline-primary mb-2 aside-btn">Pengaturan</a></li>
                </ul>
            </div>
        </section>

        

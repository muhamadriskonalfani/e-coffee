<?php
    include('../koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- bootstrap 5 link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        :root {
            --milk: #fff;
            --chocolate: #734f32;
            --dark-chocolate: #1a1a1a;
            --caramel: #e3ca76;
            --btn-primary: #0d6efd;
            --btn-primary-hover: #0a58ca;

            /* --border: 1px solid black; */
            --border: none;
        }
        
        body {
            background: var(--milk);
            background-image: url(../assets/img/bg.png);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            background: var(--milk);
            display: grid;
            grid-template-areas: 'header header header'
                                 'left center right';
            grid-template-columns: 1.2fr 3fr 1fr;
            grid-template-rows: 1fr 90%;
            padding: 1rem;
            min-height: 100vh;

            border: var(--border);
        }

        .header {
            grid-area: header;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            padding: 0 2rem;

            border: var(--border);
        }
        
        .profile-container-left {
            grid-area: left;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            border: var(--border);
        }

        .profile-container-left .profile {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
            border: var(--border);
        }

        .profile-container-left .profile .profile-picture {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 10rem;
            height: 10rem;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .5);

            border: var(--border);
        }
        
        .profile-container-left .profile .profile-picture img {
            width: 100%;
            height: 100%;
        }

        .profile-container-left .profile .profile-content {
            position: relative;
        }
        
        .profile-container-left .profile .profile-content .camera-icon {
            position: absolute;
            bottom: 45px;
            right: -50px;
            cursor: pointer;
            background: var(--caramel);
            border-radius: 50%;
            padding: 7px 12px;
            color: var(--chocolate);
            transition: .2s;

            border: var(--border);
        }

        .profile-container-left .profile .profile-content .camera-icon:hover {
            color: var(--milk);
        }

        .profile-container-left .profile .profile-content h5 {
            margin-top: 1rem;
            text-align: center;
            color: var(--dark-chocolate);

            border: var(--border);
        }

        .profile-container-left .profile-button {
            display: grid;
            gap: 1rem;
            
            border: var(--border);
        }

        .profile-container-left .profile-button a {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: .5rem;
            font-weight: 500;
            letter-spacing: .5px;
            color: var(--chocolate);
            border: 1px solid var(--chocolate);
            transition: .2s;
        }

        .profile-container-left .logout-button {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: .5rem;
            font-weight: 500;
            letter-spacing: .5px;
            color: var(--chocolate);
            border: 1px solid var(--chocolate);
            transition: .2s;
        }

        .profile-container-left .profile-button a:hover,
        .profile-container-left .logout-button:hover {
            letter-spacing: 1px;
            background: var(--caramel);
            border: 1px solid var(--caramel);
            color: var(--milk);
        }


        .profile-container-center {
            grid-area: center;
            padding: 2rem;
            padding-top: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            border: var(--border);
        }
        
        .profile-container-center .title {
            margin-bottom: 1.7rem;
            color: var(--chocolate);

            border: var(--border);
        }

        .profile-container-center .kotak-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 2rem;
            row-gap: 1.5rem;
            margin-bottom: 2rem;

            border: var(--border);
        }

        .profile-container-center .kotak-info .info-item {
            border: var(--border);
        }

        .profile-container-center .kotak-info .info-item .show-data {
            height: 2.4rem;
            background: var(--caramel);
            color: var(--milk);
            font-weight: 500;
            letter-spacing: .5px;
            border: 1px solid var(--caramel);
        }

        .profile-container-center .kotak-info .info-item .hidden-input {
            border: 1px solid var(--chocolate);
            color: var(--chocolate);
        }

        .profile-container-center .edit-profile {
            border: var(--border);
        }

        .profile-container-center .edit-profile a {
            min-width: 8rem;
        }

        .profile-container-center .edit-profile button,
        .profile-container-center .edit-profile a {
            font-weight: 500;
            letter-spacing: .5px;
            border: 1px solid var(--chocolate);
            color: var(--chocolate);
        }

        .profile-container-center .edit-profile button:hover,
        .profile-container-center .edit-profile a:hover {
            border: 1px solid var(--caramel);
            background: var(--caramel);
            color: var(--milk);
        }


        .profile-container-right {
            grid-area: right;
            padding: 2rem;

            border: var(--border);
        }

        .hide {
            display: none;
        }

        

    </style>
</head>
<body>

    <div class="container">
        <?php
            if(isset($_SESSION['userID'])) {
                $userID = $_SESSION['userID'];
                $sqlUser = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$userID'");
                $dataUser = mysqli_fetch_array($sqlUser);
        ?>
            <div class="header">
                <a href="../index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </a>
                <h2>My Profile</h2>
            </div>

            <div class="profile-container-left">
                <div class="profile">
                    <div class="profile-picture">
                        <?php if($dataUser['foto_profil'] == NULL) { ?>
                            <img src="../assets/img/profile.jpeg" alt="">
                        <?php } else { ?>
                            <img src="../assets/photo_profile/<?php echo $dataUser['foto_profil']; ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="profile-content">
                        <form id="form-photo" method="POST" action="proses.php" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengguna" value="<?php echo $dataUser['id_pengguna']; ?>">

                            <label for="input-photo" class="camera-icon"><i class="fa fa-camera"></i></label>
                            <input id="input-photo" type="file" name="foto_profil" style="display: none;">
                            
                            <button type="submit" name="update-photo" style="display: none;"></button>
                        </form>
                        <h5><?php echo $dataUser['username']; ?></h5>
                    </div>
                </div>
                <div class="profile-button">
                    <a href="profile-data.php" class="btn btn-outline-light"><i class="fas fa-user"></i> Akun Saya</a>
                    <a href="profile-order.php" class="btn btn-outline-light"><i class="fa fa-clipboard-list"></i> Pesanan Saya</a>
                    <a href="profile-cart.php" class="btn btn-outline-light"><i class="fa fa-shopping-cart"></i> Keranjang Saya</a>
                    <a href="profile-notification.php" class="btn btn-outline-light"><i class="fa fa-bell"></i> Notifikasi</a>
                </div>
                <div class="profile-logout">
                    <a href="#" user-id="<?php echo $userID; ?>" class="btn btn-outline-light logout-button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" id="logout-svg" fill="var(--chocolate)" viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                        Logout
                    </a>
                </div>
            </div>
        <?php
            }
        ?>
        

        
<?php
    include('koneksi.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KopiKita</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('assets/img/bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .kotak-login {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #734f32;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #734f32;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .link-daftar {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="kotak-login">
        <img src="assets/img/logo_1.png" width="100px" alt="">
        <h1>Monoline Coffee</h1>
        <form method="POST" action="proses.php">
            <input type="email" name="email" placeholder="Email" required value="<?php if(isset($_SESSION['dataDaftar'])): echo $_SESSION['dataDaftar']['email']; endif; ?>">
            <input type="password" name="password" placeholder="Password" required value="<?php if(isset($_SESSION['dataDaftar'])): echo $_SESSION['dataDaftar']['pass']; endif; ?>">
            <button type="submit" name="login">Login</button>
        </form>
        <p class="link-daftar">Belum punya akun? <a href="form-daftar.php">Daftar</a></p>

        <?php if(isset($_SESSION['gagal'])): ?>
            <p style="color: red;"><?php echo $_SESSION['gagal']; ?></p>
        <?php endif; session_destroy(); ?>
    </div>
</body>
</html>

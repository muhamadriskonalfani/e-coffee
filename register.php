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
            --border: #734f32;
            --main-color: #e3ca76;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(assets/img/bg.png);
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }

        .login-container {
            display: grid;
            grid-template-areas: 'form image';
            grid-template-columns: repeat(2, 1fr);
            background: var(--main-color);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .login-container .login-right-side {
            grid-area: image;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--main-color);
        }

        .login-container .login-right-side .image {
            width: 25rem;
            padding: 1.5rem;
            background: var(--main-color);
        }

        .login-container .login-right-side .image img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .login-container .login-left-side {
            grid-area: form;
            display: grid;
            gap: 1rem;
            padding: 1.5rem 0rem 1rem 2rem;
            background: var(--main-color);
        }

        .login-container .login-left-side h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--border);
        }

        .login-container .login-left-side form {
            display: grid;
            gap: .5rem;
        }

        .login-container .login-left-side form .email {
            /* border: 1px solid black; */
        }

        .login-container .login-left-side form .password {
            /* border: 1px solid black; */
        }

        .login-container .login-left-side form label {
            font-weight: 500;
            color: var(--border);
        }

        .login-container .login-left-side form input {
            font-weight: 500;
            color: var(--border);
            border: 2px solid var(--border);
        }

        .login-container .login-left-side form button {
            display: block;
            font-size: 20px;
            font-weight: 500;
            color: var(--border);
            border: 2px solid var(--border);
            border-radius: 10px;
            transition: .2s;
        }

        .login-container .login-left-side form button:hover {
            letter-spacing: 2px;
        }

        .login-container .login-left-side .link-login {
            font-weight: 500;
            color: var(--border);
        }

        .login-container .login-left-side .link-login a {
            text-decoration: none;
        }

        .login-container .login-left-side .pesan-gagal {
            max-width: 350px;
            text-align: left;
            font-weight: 500;
            color: red;
            transform: translateY(-1.5rem);
        }
        
    </style>

</head>
<body>
    <div class="login-container">
        <div class="login-left-side">
            <h1>Monoline Coffee</h1>
            <form method="POST" action="proses.php">
                <div class="username">
                    <label for="username">Username</label>
                    <input id="username" class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="confirm">
                    <label for="confirm">Konfirmasi Password</label>
                    <input id="confirm" class="form-control" type="password" name="confirm-password" placeholder="Konfirmasi Password" required>
                </div>
                
                <button type="submit" name="daftar" class="mt-3">Daftar</button>
            </form>
            <p class="link-login">Sudah punya akun? <a href="login.php">Login</a></p>

            <?php if(isset($_SESSION['gagal'])): ?>
                <p class="pesan-gagal"><?php echo $_SESSION['gagal']; ?></p>
            <?php endif; session_destroy(); ?>
        </div>

        <div class="login-right-side">
            <div class="image">
                <img src="assets/img/waifu2.jpg" alt="">
            </div>
        </div>
    </div>
</body>
</html>


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
            grid-template-areas: 'image form';
            grid-template-columns: repeat(2, 1fr);
            background: var(--main-color);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .login-container .login-left-side {
            grid-area: image;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container .login-left-side .image {
            width: 25rem;
            padding: 1.5rem;
            background: var(--main-color);
        }

        .login-container .login-left-side .image img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .login-container .login-right-side {
            grid-area: form;
            display: grid;
            gap: 1rem;
            padding: 1.5rem 2rem 1rem 0rem;
            background: var(--main-color);
        }

        .login-container .login-right-side h1 {
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--border);
        }

        .login-container .login-right-side form {
            display: grid;
            gap: .5rem;
        }

        .login-container .login-right-side form .email {
            /* border: 1px solid black; */
        }

        .login-container .login-right-side form .password {
            /* border: 1px solid black; */
        }

        .login-container .login-right-side form label {
            font-weight: 500;
            color: var(--border);
        }

        .login-container .login-right-side form input {
            font-weight: 500;
            color: var(--border);
            border: 2px solid var(--border);
        }

        .login-container .login-right-side form button {
            display: block;
            font-size: 20px;
            font-weight: 500;
            color: var(--border);
            border: 2px solid var(--border);
            border-radius: 10px;
            transition: .2s;
        }

        .login-container .login-right-side form button:hover {
            letter-spacing: 2px;
        }

        .login-container .login-right-side .link-daftar {
            font-weight: 500;
            color: var(--border);
        }

        .login-container .login-right-side .link-daftar a {
            text-decoration: none;
        }

        .login-container .login-right-side .pesan-gagal {
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
            <div class="image">
                <img src="assets/img/waifu.jpeg" alt="">
            </div>
        </div>

        <div class="login-right-side">
            <h1>Monoline Coffee</h1>
            <form method="POST" action="proses.php">
                <div class="email">
                    <label for="email"><h5>Email</h5></label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="Email" required value="<?php if(isset($_SESSION['dataDaftar'])): echo $_SESSION['dataDaftar']['email']; endif; ?>">
                </div>
                <div class="password">
                    <label for="password"><h5>Password</h5></label>
                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required value="<?php if(isset($_SESSION['dataDaftar'])): echo $_SESSION['dataDaftar']['pass']; endif; ?>">
                </div>
                <button type="submit" name="login" class="mt-3">Login</button>
            </form>
            <p class="link-daftar">Belum punya akun? <a href="register.php">Daftar</a></p>

            <?php if(isset($_SESSION['gagal'])): ?>
                <p class="pesan-gagal"><?php echo $_SESSION['gagal']; ?></p>
            <?php endif; session_destroy(); ?>
        </div>
    </div>
</body>
</html>


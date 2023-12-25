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
            --black: #1a1a1a;
            --btn-primary: #0d6efd;
            --btn-primary-hover: #0a58ca;

            /* --border: 1px solid black; */
            --border: none;
        }
        
        body {
            background: var(--white);
            background-image: url(assets/img/bg.png);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
        }

        .container {
            background: var(--white);
            display: grid;
            grid-template-areas: 'header header header'
                                 'part1 part2 part3';
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
            </a>
            <h2>Detail Pesanan</h2>
        </div>


    </div>
</body>
</html>



<?php
    include('koneksi.php');
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
</head>
<body>
    <?php
        if(isset($_SESSION['userID'])) {
            $_SESSION['user'] = $user;
            $query = mysqli_query($koneksi, "select * from tb_pengguna where username = $user");
            $data = mysqli_fetch_array($query);
        }
    ?>
    <a href="?logout=<?php echo $_SESSION['user']; ?>">logout</a>

    <?php
        if(isset($_GET['logout'])) {
            session_destroy();
            header('location: index.php');
        }
    ?>
    
</body>
</html>
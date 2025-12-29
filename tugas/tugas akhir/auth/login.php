<?php
session_start();
include '../db/koneksi.php';


if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}


if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['username'] = $data['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Akib Web</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">

<div class="card col-md-4 mx-auto ">
  <h5 class="card-header text-center">Login</h5>
  <div class="card-body">

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-primary w-100">
            Login
        </button>
    </form>

  </div>
</div>

</body>
</html>

<?php include 'cek_login.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h5">
             Sistem Penjualan Helm
        </span>
        <span class="text-white">
            Login sebagai: <strong><?= $_SESSION['username']; ?></strong>
        </span>
    </div>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm text-center">
                <div class="card-body">

                    <h4 class="mb-3">Selamat Datang 👋</h4>
                    <p class="text-muted">
                        Anda login sebagai <strong><?= $_SESSION['username']; ?></strong>.
                        Gunakan menu di bawah untuk mengelola transaksi penjualan helm.
                    </p>

                    <div class="d-grid gap-2 mt-4">
                        <a href="../transaksi/index.php" class="btn btn-success btn-lg">
                            📋 Kelola Transaksi
                        </a>

                        <a href="logout.php" 
                           class="btn btn-danger"
                           onclick="return confirm('Yakin ingin logout?')">
                            🚪 Logout
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>

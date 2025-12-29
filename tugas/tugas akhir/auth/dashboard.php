<?php include 'cek_login.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Akib _helm WEb</title>

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary shadow">
    <div class="container">
        <span class="navbar-brand mb-0 h5">
             Sistem Penjualan Helm: Akib Supandi <br>      Nim :221011402724         
        </span>
        
    </div>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow-sm text-center">
                <div class="card-body">

                    
                    <p class="text-muted">
                        Anda login sebagai <strong><?= $_SESSION['username']; ?></strong> di dashboard
                       
                    </p>

                    <div class="d-grid gap-2 mt-4">
                        <a href="../transaksi/index.php" class="btn btn-success btn-lg">
                             Kelola Transaksi
                        </a>

                        <a href="../auth/logout.php" 
                           class="btn btn-danger">
                             Logout
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>

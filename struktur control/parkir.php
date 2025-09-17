<?php
$jumlah = 0;

if (isset($_POST['kirim'])) {
    $tarif = $_POST['tarif'];
    $jam = $_POST['jam'];
    $jumlah = $tarif * $jam;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Parkir Employie
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">masukan tarif</label>
                        <input type="number" class="form-control" name="tarif" value="4000">
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="jam" id="">
                            <option selected>Masukan jam</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7"> Jam</option>
                            <option value="8">8 Jam</option>
                            <option value="9">9 Jam</option>
                            <option value="10">10 Jam</option>
                            <option value="12">12 Jam</option>
                            <option value="24">24 Jam</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="kirim">Submit </button>
                </form>

            </div>
            <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <?php ?>
            <p><strong>Total Bayar: Rp <?= number_format($jumlah, 0, ',', '.'); ?></strong></p>
            <?php ?>
        </div>
    </div>
        </div>
    </div>

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
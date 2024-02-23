<?php
require("../../function.php");
session_start();
$result = mysqli_query($conn, "SELECT * FROM buku WHERE bukuID = '$_GET[id]'");
$rate = mysqli_query($conn, "SELECT * FROM ulasanbuku WHERE bukuID = '$_GET[id]'");
// Lakukan query untuk memeriksa status peminjaman buku
$status_query = mysqli_query($conn, "SELECT statuspeminjaman FROM peminjaman WHERE bukuID = '$_GET[id]'");

// Ambil status peminjaman buku
$status_row = mysqli_fetch_assoc($status_query);

// Tentukan apakah tombol harus ditampilkan atau disembunyikan berdasarkan status peminjaman
if ($status_row && $status_row['statuspeminjaman'] === 'dipinjam') {
    // Jika status peminjaman adalah "dipinjam", tombol disembunyikan
    $button_display = 'none';
} elseif ($status_row && $status_row['statuspeminjaman'] === 'selesai') {
    // Jika status peminjaman bukan "dipinjam", tombol ditampilkan
    $button_display = 'block';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

</head>
<body>
    <?php while ($res = mysqli_fetch_array($result)) { ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                     <?php echo "<img src='../mod_book/assets/img/$res[coverbuku]' class='img-fluid rounded-start' alt='Book cover'>"; ?>
                </div>
                <div class="col-md-8">
                    <h1 class="fw-bold mb-3"><?= $res['judul'] ?></h1>
                    <p class="lead mb-3">Penulis : <?= $res['penulis'] ?></p>
                    <p class="text-muted">Kategori : <?= $res['kategori'] ?></p>
                    <div class="d-grid gap-2 d-md-block ">
                        <form action="proses_ulasan.php" method="post">
                            <input type="hidden" name="bukuID" value="<?= $res['bukuID'] ?>">
                            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
                        <div class="mb-3">
                            <label for="inputReview" class="form-label">Your Review</label>
                            <textarea class="form-control" id="inputReview" rows="3" name="review"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="selectRating" class="form-label">Rating</label>
                            <select class="form-select" id="selectRating" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="ulasan">Submit</button>
                    </form>
                    <a href="../../dash.php?module=dashboard" class="btn btn-danger">Gak ah males gak mau review</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
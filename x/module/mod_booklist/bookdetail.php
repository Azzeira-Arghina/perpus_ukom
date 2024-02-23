<?php
require("../../function.php");
include("../../config/tanggalindo.php");
date_default_timezone_set('Asia/Jakarta');
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
    <title>Book Detail</title>

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
                    <p class="lead mb-3">Author : <?= $res['penulis'] ?></p>
                    <p class="text-muted">Categories : <?= $res['kategori'] ?></p>
                    <div class="d-grid gap-2 d-md-block ">
                        <form action="proses_koleksi.php" method="post">
                            <input type="hidden" name="userID" value="<?= $_SESSION['userID'] ?>">
                            <input type="hidden" name="bukuID" value="<?= $res['bukuID'] ?>">
                            <button type="submit" class="btn btn-success" name="koleksi">Private Collection</button>
                        </form>
                        <?php if ($status_row && $status_row['statuspeminjaman'] === 'dipinjam') { ?>
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#pinjamBuku" style="display: none;">Pinjam Buku nya ya hehe :)</button>
                        <?php } else {?>
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#pinjamBuku" style="display: block;">Pinjam Buku nya ya hehe :)</button>
                        <?php } ?>
                        <a href="../../dash.php?module=book-list" type="button" class="btn btn-danger "> Back </a>
                    </div>
                    <h5 class="mt-5">User Reviews :</h5>
                    <ul class="list-unstyled">
                    <?php while ($ulasan = mysqli_fetch_array($rate)) { ?>
                        <li class="media mb-4">
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"> ~<?= $ulasan['username'] ?></h6>
                                <span><?= $ulasan['ulasan'] ?></span>
                            </div>
                            <span class="fw-bold">⭐<?= $ulasan['rating'] ?> / 5</span>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pinjamBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Apakah kamu ingin meminjam buku ini?</h5>
                    </div>
                    <form action="proses_pinjam.php" method="post">
                        <input type="hidden" name="userID" value="<?= $_SESSION['userID'] ?>">
                        <input type="hidden" name="bukuID" value="<?= $res['bukuID'] ?>">
                        <input type="hidden" name="tanggalPinjam" value="<?= tgl_indo(date("Y m d")) ?>">
                        <input type="hidden" name="status" value="dipinjam">
                        <div class="modal-body text-center">
                            <p class="fw-bold text-decoration-underline"><?= $res['judul'] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="pinjam">Sure</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
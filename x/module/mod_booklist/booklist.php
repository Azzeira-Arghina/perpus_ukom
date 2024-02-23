<?php
require('./function.php');
$result = mysqli_query($conn, "SELECT * FROM buku ORDER BY bukuID");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booklist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

</head>
<body>
    <div class="row">
        <?php while ($res = mysqli_fetch_array($result)) { ?>
            <div class="col-3 mb-5">
                <div class="card" style="width: 14rem;">
                <?php 
                    echo "<a href='module/mod_booklist/bookdetail.php?id=$res[bukuID]'>";
                    echo "<img src='./module/mod_book/assets/img/$res[coverbuku]' class='card-img-top' height='300px'>";
                ?>
                </a>
                <div class="card-body">
                <?php
                // Query untuk mendapatkan status peminjaman terakhir untuk buku ini
                $status_query = mysqli_query($conn, "SELECT statuspeminjaman FROM peminjaman WHERE bukuID = '$res[bukuID]' ORDER BY peminjamanID DESC LIMIT 1");

                // Ambil status peminjaman buku
                $status_row = mysqli_fetch_assoc($status_query);
            
                // Tentukan apakah tombol harus ditampilkan atau disembunyikan berdasarkan status peminjaman
                if ($status_row && $status_row['statuspeminjaman'] === 'dipinjam') {
                    $button_class = 'btn-success';
                    $button_text = 'Balikin Woy';
                    $button_name = 'kembalikan';
                    $button_href = 'module/mod_booklist/proses_return.php?id=' . $res['bukuID'];
                } else {
                    $button_class = 'btn-primary';
                    $button_text = 'Lihat Buku';
                    $button_name = 'show';
                    $button_href = 'module/mod_booklist/bookdetail.php?id=' . $res['bukuID'];
                }
                    echo "<h5 class='card-title'>$res[judul]</h5>";
                    echo "<a href='$button_href' class='btn $button_class mt-5' name='$button_name'>$button_text</a>";
                ?>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>

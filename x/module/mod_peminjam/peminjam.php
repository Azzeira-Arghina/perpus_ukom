<?php
require("./function.php");

$query = "SELECT peminjaman.*, users.username, buku.judul AS judul_buku 
          FROM peminjaman 
          INNER JOIN users ON peminjaman.userID = users.userID 
          INNER JOIN buku ON peminjaman.bukuID = buku.bukuID";

$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    <div class="container pb-2">
        <h2 class="pb-3 text-center">DATA PEMINJAM BUKU</h2>
    </div>

    <div class="container">
        <table class="table table-striped text-center" border="1">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
            </tr>
            <?php
                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['peminjamanID'] . "</td>";
                    echo "<td>" . $res['username'] . "</td>";
                    echo "<td>" . $res['judul_buku'] . "</td>";
                    echo "<td>" . $res['tanggalpeminjaman'] . "</td>";
                    echo "<td>" . $res['tanggalpengembalian'] . "</td>";}
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

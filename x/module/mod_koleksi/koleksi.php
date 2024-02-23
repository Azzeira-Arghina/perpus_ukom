<?php
require("./function.php");


// Pastikan ID pengguna tersedia dalam sesi
if(isset($_SESSION['userID'])) {
    // Ambil ID pengguna dari sesi
    $userID = $_SESSION['userID'];

    // Query untuk mengambil data buku berdasarkan ID pengguna yang login
    $query = "SELECT koleksipribadi.*, buku.judul AS judul_buku, users.username 
              FROM koleksipribadi 
              INNER JOIN buku ON koleksipribadi.bukuID = buku.bukuID 
              INNER JOIN users ON koleksipribadi.userID = users.userID
              WHERE koleksipribadi.userID = '$userID'
              ORDER BY koleksipribadi.userID";

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
        <h2 class="pb-3 text-center">KOLEKSI BUKU</h2>
    </div>

    <div class="container">
        <table class="table table-striped text-center" border="1">
            <tr>
                <th scope="col">Judul Buku</th>
                <th scope="col">Action</th>
            </tr>
            <?php
                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['judul_buku'] . "</td>"; // Menampilkan judul buku
                    echo "<td><a href=\"actions/delete.php?id=$res[userID]\" class='btn btn-danger'><i class='bi bi-trash-fill'></i></a>";
                }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
} else {
    // Jika ID pengguna tidak tersedia dalam sesi, arahkan pengguna kembali ke halaman login atau lakukan tindakan lain sesuai kebutuhan Anda
    header("Location: login.php");
    exit();
}
?>

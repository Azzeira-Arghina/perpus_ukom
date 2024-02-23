<?php
require("./function.php");
$result = mysqli_query($conn, "SELECT * FROM buku ORDER BY bukuID");
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
        <h2 class="pb-3 text-center">DATA BUKU</h2>
        <a href="./module/mod_book/add_book.php"><button class="btn btn-primary">Create Data</button></a>
    </div>

    <div class="container">
        <table class="table table-striped text-center" border="1">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Book Code</th>
                <th scope="col">Title</th>
                <th scope="col">Categories</th>
                <th scope="col">Author</th>
                <th scope="col">publisher</th>
                <th scope="col">Publication Year</th>
                <th scope="col">Status</th>
                <th scope="col">Book Cover</th>
                <th scope="col">ACTION</th> 
            </tr>
            <?php
                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['bukuID'] . "</td>";
                    echo "<td>" . $res['kodebuku'] . "</td>";
                    echo "<td>" . $res['judul'] . "</td>";
                    echo "<td>" . $res['kategori'] . "</td>";
                    echo "<td>" . $res['penulis'] . "</td>";
                    echo "<td>" . $res['penerbit'] . "</td>";
                    echo "<td>" . $res['tahunterbit'] . "</td>";
                    echo "<td>" . $res['status'] . "</td>";
                    echo "<td>" . $res['coverbuku'] . "</td>";
                    echo "<td><a href=\"module/mod_book/update_book.php?id=$res[bukuID]\" class='btn btn-primary'><i class='bi bi-pencil-square'></i></a><span class='p-1'></span><a href=\"module/mod_book/delete_book.php?id=$res[bukuID]\" class='btn btn-danger'><i class='bi bi-trash-fill'></i></a>";
                }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
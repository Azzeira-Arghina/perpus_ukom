<?php
require("./function.php");

$result = mysqli_query($conn, "SELECT * FROM kategoribuku ORDER BY kategoriID");
?>

<html>
<head>
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    <div class="container pb-2">
        <h2 class="pb-3 text-center">DATA KATEGORI</h2>
        <a href="./module/mod_categories/add_categories.php"><button class="btn btn-primary">Create Data</button></a>
    </div>

    <div class="container">
        <table class="table table-striped text-center" border="1">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">ACTION</th>
            <?php
                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $res['kategoriID'] . "</td>";
                    echo "<td>" . $res['namakategori'] . "</td>";
                    echo "<td><a href=\"module/mod_categories/categories.php?id=$res[kategoriID]\" class='btn btn-primary'><i class='bi bi-pencil-square'></i></a><span class='p-1'></span><a href=\"module/mod_categories/delete_categories.php?id=$res[kategoriID]\" class='btn btn-danger'><i class='bi bi-trash-fill'></i></a>";
                }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
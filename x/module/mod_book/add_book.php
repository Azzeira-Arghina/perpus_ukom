<?php
require('../../function.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>BOOK DATA</title>
</head>
<body>
    <div class="container py-5 shadow">
        <h1 class="text-center pb-5">BOOK DATA</h1>
        <form action="proses_add_book.php" method="post" enctype='multipart/form-data'>
            <div class="row mb-3">
                <input type="hidden" name="id">
                <label for="username" class="col-sm-2 col-form-label">Book Code</label>
                <div class="col-sm-4">
                    <input type="text" name="kodebuku" class="form-control" id="kodebuku">
                </div>
            </div>
            <div class="row mb-3">
                <label for="judul" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-4">
                    <input type="text" name="judul" class="form-control" id="judul">
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Categories</label>
                <div class="col-sm-4">
                    <select name="kategoriID" id="kategoriID">
                    <?php
                    $selkg = mysqli_query($conn, "SELECT * FROM kategoribuku");
                    while ($kg = mysqli_fetch_array($selkg)) {
                        echo "<option value='$kg[namakategori]'>$kg[namakategori]</option>";
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="penulis" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-4">
                    <input type="text" name="penulis" class="form-control" id="penulis">
                </div>
            </div>
            <div class="row mb-3">
                <label for="penerbit" class="col-sm-2 col-form-label">Publisher</label>
                <div class="col-sm-4">
                    <input type="text" name="penerbit" class="form-control" id="penerbit">
                </div>
            </div>

            <div class="row mb-3">
                <label for="tahunterbit" class="col-sm-2 col-form-label">Publication Year</label>
                <div class="col-sm-4">
                    <input type="text" name="tahunterbit" class="form-control" id="tahunterbit">
                </div>
            </div>

            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <?php
                            $sql = "SHOW COLUMNS FROM buku WHERE Field = 'status'";
                            $query = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($query);
                                                
                            $options = explode(",", str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type'])-6))));
                            foreach ($options as $option) {
                                echo "<input class='form-check-input' type='radio' name='status' id='$option' value='$option' required>";
                                echo "<label for='$option'>$option</label><br>";
                            }
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="" class="form-label">Book Cover</label>
                <br>
                    <input type="file" class="form-control" id="image" name="coverbuku" required>
                <br>
            </div>
            <div class="d-flex mb-3">
                <div class="me-auto p-2">
                    <button type="submit" class="btn btn-primary" name="create">Create Data</button>
                </div>
        </form>    
                <div class="p-2"><a href="../../dash.php?module=book" type="submit" class="btn btn-danger">Back</a></div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
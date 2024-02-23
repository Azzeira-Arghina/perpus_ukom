<?php
require('../../function.php');

if (isset($_POST['update-buku'])) {
	$ID         = $_POST['id'];
	$kodebuku   = $_POST['kodebuku'];
    $judul      = $_POST['judul'];
    // $kategori   = $_POST['kategoriID'];
    $penulis    = $_POST['penulis'];
    $penerbit       = $_POST['penerbit'];
    $tahunterbit    = $_POST['tahunterbit'];
    $status         = $_POST['status'];
    // $coverbuku         = $_POST['coverbuku'];

    $target = "assets/img/";
    $fotoName = $_FILES['coverbuku']['name'];
    $photoTmp = $_FILES['coverbuku']['tmp_name'];
    $photoPath = $target . $fotoName;

    // $update = "UPDATE buku SET kodebuku='$kodebuku', judul='$judul', kategori='uhuy123', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit', status='$status', coverbuku='$fotoName' WHERE bukuID='$ID'";
    // if (mysqli_query($conn, $update)) {
    //     header("Location: ../../dash.php?module=book");
    // }else {
    //     echo "Gagal";
    // }


        if (move_uploaded_file($photoTmp, $photoPath)) {
            mysqli_query($conn, "UPDATE buku SET kodebuku='$kodebuku', judul='$judul', kategori='wadad', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit', status='$status', coverbuku='$fotoName' WHERE bukuID='$ID'");
            header("Location: ../../dash.php?module=book");
        } else {
            echo "Gagal mengunggah file.";
            header("Location: ../../dash.php?module=book");
        }
}

$row = mysqli_query($conn, "SELECT * FROM buku WHERE bukuID = '$_GET[id]'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>EDIT DATA</title>
</head>
<body>

<?php $no = 1; ?>
    <?php $result = mysqli_fetch_array($row) ?>
    <div class="container py-5">
        <h1 class="text-center pb-5">UPDATE DATA</h1>
        <form action="update_book.php" method="post" enctype='multipart/form-data'>
            <div class="row mb-3">
                <label for="kodebuku" class="col-sm-2 col-form-label">Book Code</label>
                <div class="col-sm-4">
                    <input value="<?= $result['kodebuku']?>"type="text" name="kodebuku" class="form-control" id="kodebuku">
                </div>
            </div>
            <div class="row mb-3">
                <label for="judul" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-4">
                    <input value="<?= $result['judul']?>"type="text" name="judul" class="form-control" id="judul">
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="penulis" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-4">
                    <input value="<?= $result['penulis']?>"type="text" name="penulis" class="form-control" id="penulis">
                </div>
            </div>
            <div class="row mb-3">
                <label for="penerbit" class="col-sm-2 col-form-label">Publisher</label>
                <div class="col-sm-4">
                    <input value="<?= $result['penerbit']?>"type="text" name="penerbit" class="form-control" id="penerbit">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tahunterbit" class="col-sm-2 col-form-label">Publication Year</label>
                <div class="col-sm-4">
                    <input value="<?= $result['tahunterbit']?>"type="text" name="tahunterbit" class="form-control" id="tahunterbit">
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-4">
                    <?php 
                    echo "<input type='radio' name='status' value='tersedia' " . ($result['status'] == 'tersedia' ? 'checked' : '') . "> Tersedia<br>";
                    echo "<input type='radio' name='status' value='tidak tersedia' " . ($result['status'] == 'tidak tersedia' ? 'checked' : '') . "> Tidak Tersedia<br>";
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <label for="" class="form-label">Book Cover</label>
                <br>
                <?php 
                 echo "<img src='assets/img/$result[coverbuku]' width='100' height='100'>";
                 ?>
                 <input type="file" class="form-control" id="image" name="coverbuku">
             </div>
            <div class="d-flex mb-3">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="me-auto p-2">
                    <button type="submit" class="btn btn-primary" name="update-buku">Update Data</button>
                </div>
                <div class="p-2"><a href="../../dash.php?module=book" type="submit" class="btn btn-danger">Back</a></div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!--- <?php
require('../function.php');

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
    move_uploaded_file($fotoName, $target);

    $update = "UPDATE buku SET kodebuku='$kodebuku', judul='$judul', kategori='uhuy123', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit', status='$status', coverbuku='$fotoName' WHERE bukuID='$ID'";
    if (mysqli_query($conn, $update)) {
        header("Location: ../../dash.php?module=book");
    }else {
        echo "Gagal";
    }


        // if (move_uploaded_file($photoTmp, $photoPath)) {
        //     mysqli_query($conn, "UPDATE buku SET kodebuku='$kodebuku', judul='$judul', kategori='uhuy123', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit', status='$status', coverbuku='$fotoName' WHERE bukuID='$ID'");
        //     header("Location: ../../dash.php?module=book");
        // } else {
        //     echo "Gagal mengunggah file.";
        //     header("Location: ../../dash.php?module=book");
        // }
}
?>
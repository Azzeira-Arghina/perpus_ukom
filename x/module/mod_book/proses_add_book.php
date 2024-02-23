<!-- <?php 
require('../../function.php');

if (isset($_POST['create'])) {
    // Mendapatkan nilai dari formulir
    // $ID         = $_POST['id'];
    $kodebuku   = $_POST['kodebuku'];
    $judul      = $_POST['judul'];
    $kategori   = $_POST['kategoriID'];
    $penulis    = $_POST['penulis'];
    $penerbit   = $_POST['penerbit'];
    $tahunterbit= $_POST['tahunterbit'];
    $status     = $_POST['status'];

    $target = "assets/img/";
    $fotoName = $_FILES['coverbuku']['name'];
    $photoTmp = $_FILES['coverbuku']['tmp_name'];
    $photoPath = $target . $fotoName;
        if (move_uploaded_file($photoTmp, $photoPath)) {
            mysqli_query($conn, "INSERT INTO buku (bukuID, kodebuku, judul, kategori, penulis, penerbit, tahunterbit, status, coverbuku) VALUES ('', '$kodebuku', '$judul', '$kategori', '$penulis', '$penerbit', '$tahunterbit', '$status', '$fotoName')");
            header("Location: ../../dash.php?module=book");
        } else {
            echo "Gagal mengunggah file.";
        }


            // Query untuk menyimpan data ke database
            // $query = mysqli_query($conn, "INSERT INTO buku (bukuID, kodebuku, judul, penulis, penerbit, tahunterbit, status, coverbuku) VALUES ('$ID', '$kodebuku', '$judul', '$penulis', '$penerbit', '$tahunterbit', '$tatus', 'oto.jpg')");
            
            // if ($query) {
            //     echo "<script>
            //             alert('Data buku berhasil ditambahkan!');
            //             document.location='../dash.php?module=book';
            //         </script>";
            // } else {
            //     echo "<script>
            //             alert('Gagal menambahkan data buku!');
            //             document.location='../dash.php';
            //         </script>";
            //         exit;
            // }
    } 
?> -->

<?php 
require('../../function.php');

if (isset($_POST['submit'])) {
    // Mendapatkan nilai dari formulir
    // $ID         = $_POST['id'];
    // $kodebuku   = $_POST['kategoriID'];
    $namakategori      = $_POST['namakategori'];


            mysqli_query($conn, "INSERT INTO kategoribuku (kategoriID, namakategori) VALUES ('', '$namakategori')");
            header("Location: ../../dash.php?module=categories");
        } else {
            echo "Gagal mengunggah file.";
        }
    
?>
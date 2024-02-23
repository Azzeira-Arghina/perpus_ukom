<?php
require("../../function.php");

if (isset($_POST['koleksi'])) {
    // require("../../function.php");

    $userID   = $_POST['userID'];
    $bukuId   = $_POST['bukuID'];
    
    // Buat query SQL dengan benar
    $result   = "INSERT INTO koleksipribadi (userID, bukuID) VALUES ('$userID', '$bukuId')";

    // Eksekusi query
    if (mysqli_query($conn, $result)) {
        header("Location: ../../dash.php?module=book-list");
        exit(); // Pastikan untuk keluar dari skrip setelah redirect
    } else {
        echo "Gagal : " . mysqli_error($conn);
        exit(); // Keluar dari skrip jika terjadi kesalahan
    }    
}

?>
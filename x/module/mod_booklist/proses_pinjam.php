<?php
require("../../function.php");

if (isset($_POST['pinjam'])) {
    // require("../../function.php");

    $userID   = $_POST['userID'];
    $bukuId   = $_POST['bukuID'];
    $status   = $_POST['status'];
    
    // Buat query SQL dengan benar
    $result   = "INSERT INTO peminjaman (userID, bukuID, tanggalpeminjaman, tanggalpengembalian, statuspeminjaman) VALUES ('$userID', '$bukuId', NOW(), '', '$status')";

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
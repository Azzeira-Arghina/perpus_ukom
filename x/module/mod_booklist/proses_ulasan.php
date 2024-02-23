<?php
require("../../function.php");

if (isset($_POST['ulasan'])) {
    // require("../../function.php");

    $bukuId   = $_POST['bukuID'];
    $username   = $_POST['username'];
    $ulasan   = $_POST['review'];
    $rating   = $_POST['rating'];
    
    // Buat query SQL dengan benar
    $result   = "INSERT INTO ulasanbuku (bukuID, username, ulasan, rating) VALUES ('$bukuId', '$username', '$ulasan', '$rating')";

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
<?php
// Mengimpor file function.php untuk koneksi database
require('../../function.php');

// Pastikan bahwa parameter 'id' telah diterima dari permintaan
if(isset($_GET['id'])) {
    // Dapatkan id buku dari parameter URL
    $bukuID = $_GET['id'];
    
    // Query untuk mendapatkan peminjamanID terbaru berdasarkan bukuID
    $query = "SELECT peminjamanID FROM peminjaman WHERE bukuID = '$bukuID' ORDER BY peminjamanID DESC LIMIT 1";
    
    // Eksekusi query untuk mendapatkan peminjamanID terbaru
    $result = mysqli_query($conn, $query);
    
    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Ambil peminjamanID terbaru dari hasil query
        $row = mysqli_fetch_assoc($result);
        
        // Pastikan peminjamanID terbaru ditemukan
        if ($row) {
            $latest_peminjamanID = $row['peminjamanID'];
            
            // Lakukan pembaruan ke tabel peminjaman, mengatur statuspeminjaman menjadi 'selesai' berdasarkan peminjamanID terbaru
            $update_query = "UPDATE peminjaman SET statuspeminjaman = 'selesai', tanggalpengembalian = NOW() WHERE peminjamanID = '$latest_peminjamanID'";
            
            // Jalankan kueri pembaruan
            if(mysqli_query($conn, $update_query)) {
                // Jika pembaruan berhasil, arahkan kembali pengguna ke halaman sebelumnya atau halaman lain yang sesuai
                header("Location: ulasan.php?id=$bukuID"); // Ganti 'index.php' dengan halaman yang sesuai jika diperlukan
                exit();
            } else {
                // Jika terjadi kesalahan saat menjalankan kueri pembaruan
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Jika peminjamanID terbaru tidak ditemukan
            echo "PeminjamanID terbaru tidak ditemukan.";
        }
    } else {
        // Jika terjadi kesalahan saat menjalankan query untuk mendapatkan peminjamanID terbaru
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika parameter 'id' tidak diterima
    echo "ID buku tidak ditemukan.";
}
?>

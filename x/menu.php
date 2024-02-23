<?php
require('function.php');

if ($_SESSION['status']=='admin') {
    $modul = mysqli_query($conn, "SELECT * FROM module WHERE (status = 'admin' OR status = 'petugas' OR status = 'all') AND aktif='Y' ORDER BY urutan");
}
elseif ($_SESSION['status']=='petugas') {
    $modul = mysqli_query($conn, "SELECT * FROM module WHERE (status = 'petugas' OR status = 'all') AND aktif='Y' ORDER BY urutan");
}
elseif ($_SESSION['status']=='user') {
    $modul = mysqli_query($conn, "SELECT * FROM module WHERE (status = 'user' OR status = 'all') AND aktif='Y' ORDER BY urutan");
}

while ($menu = mysqli_fetch_array($modul)) {
    echo "<li class='nav-item'>
            <a class='nav-link text-dark' href='$menu[link]'>
            <span class='ml-2'>$menu[namaModul]</span>
            </a>
          </li>";
}
?>
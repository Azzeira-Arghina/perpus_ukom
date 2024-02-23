<?php 
require('function.php');

if ($_GET['module']=='dashboard') {
    echo "
    <div class='container'>
    <div class='row align-items-center' style='height: 50vh;'>
    <div class='col text-center'>
    Selamat Datang<br>
    Halo <b>$_SESSION[namalengkap]</b>, Selamat Datang dihalaman ini.
    </div>
    </div>
    </div>
    ";
}

elseif ($_GET['module']=='user') {
    include('module/mod_users/users.php');
}
elseif ($_GET['module']=='book') {
    include('module/mod_book/book.php');
}
elseif ($_GET['module']=='book-list') {
    include('module/mod_booklist/booklist.php');
}
elseif ($_GET['module']=='categories') {
    include('module/mod_categories/categories.php');
}
elseif ($_GET['module']=='private-collection') {
    include('module/mod_koleksi/koleksi.php');
}
elseif ($_GET['module']=='peminjam') {
    include('module/mod_peminjam/peminjam.php');
}
?>
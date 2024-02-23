<?php
require('function.php');
function antiinjection($data) {
    global $conn;
    $filter_sql = mysqli_real_escape_string($conn, $data);
    $filter_sql = stripcslashes(strip_tags(htmlspecialchars($filter_sql, ENT_QUOTES)));
    return $filter_sql;
}

$username = antiinjection($_POST['username']);
$password = antiinjection(md5($_POST['password']));

$proses     = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
$user       = mysqli_num_rows($proses);
$db         = mysqli_fetch_array($proses);

if ($user > 0) {
    session_start();
    $_SESSION['userID']       = $db['userID'];
    $_SESSION['username']       = $db['username'];
    $_SESSION['password']       = $db['password'];
    $_SESSION['email']       = $db['email'];
    $_SESSION['namalengkap']          = $db['namalengkap'];
    $_SESSION['alamat']          = $db['alamat'];
    $_SESSION['status']         = $db['status'];

    echo "<center>LOGIN BERHASIL <br></center>";
    header("Location: dash.php?module=dashboard");
} else {
    echo "<center>LOGIN GAGAL <br>
    Username atau Password Anda tidak valid.<br>
    Atau akun Anda sedang diblokir.<br>";
    echo "<a href=../><b>ULANGI LAGI</b></a></center>";
}
?>
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'perpustakaan';

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed to load" . mysqli_connect_error());
}
?>
<?php
session_start();
$_SESSION['username']       = '';
$_SESSION['namalengkap']    = '';
$_SESSION['password']       = '';
$_SESSION['level']          = '';

unset($_SESSION['username']);
unset($_SESSION['namalengkap']);
unset($_SESSION['password']);
unset($_SESSION['level']);
session_unset();
session_destroy();
header("Location: ../");
?>
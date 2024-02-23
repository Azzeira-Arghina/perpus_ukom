<?php
require('../../function.php');

$ID = $_GET["id"];
$delete = "DELETE FROM kategoribuku WHERE kategoriID = '$ID'";

if (mysqli_query($conn, $delete)) {
    echo "<script>window.location.href = '../../dash.php?module=categories';</script>";

    echo "Error: " . $delete . "<br>" .mysqli_error($conn);
}
mysqli_close($conn);
?>
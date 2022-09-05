<?php
$conn = mysqli_connect ("localhost","root","","db_absensi");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}
?>
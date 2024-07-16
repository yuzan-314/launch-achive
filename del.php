<?php
$conn = mysqli_connect('localhost', 'root', '1234', 'launch_achive');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$deleteAllQuery = "DELETE FROM launch";
mysqli_query($conn, $deleteAllQuery);

// 초기화된 $result 변수
$result = mysqli_query($conn, "SELECT * FROM launch");
?>
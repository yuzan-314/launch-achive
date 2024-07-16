<?php
$conn = mysqli_connect('localhost', 'root', '1234', 'launch_achive');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$del = $_POST["deleteButton"];
$del2 = "del";

if ($del == $del2)
{
    $deleteAllQuery = "DELETE FROM launch";
    mysqli_query($conn, $deleteAllQuery);

    // 초기화된 $result 변수
    $result = mysqli_query($conn, "SELECT * FROM launch");
}

$name = $_POST["name"];
$date = $_POST["date"];
$meal = $_POST["meal"];
$review = $_POST["review"];

$name = mysqli_real_escape_string($conn, $name);
$date = mysqli_real_escape_string($conn, $date);
$meal = mysqli_real_escape_string($conn, $meal);
$review = mysqli_real_escape_string($conn, $review);

$insert_sql = "INSERT INTO launch (name, date, meal, review) VALUES ('$name', '$date', '$meal', '$review')";


if (mysqli_query($conn, $insert_sql)) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if (isset($_POST)) {
    $breedId = $_POST['breedId'];
    $breedData = $_POST['breedType'];
    $breedTypeData = explode(" | ", $breedData);
    $breedType = $breedTypeData[1];
    $salesDate = $_POST['salesDate'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $remarks = $_POST['remarks'];
}
require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into income values('$breedId', '$breedType', '$salesDate', '$quantity', '$amount', '$remarks')";
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            header('refresh:1, url= income.php');
            } else {
        echo "Query error ".mysqli_error($conn);
            }
}

if ($breedType == 'goat') {
    $sql = "DELETE FROM `breedexpense` WHERE `breedid` = '$breedId'";
    if(mysqli_query($conn, $sql)) {
    } else {
        echo "Query error ".mysqli_error($conn);
            }
}
}
?>
<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if (isset($_POST)) {
    $breedId = $_POST['breedId'];
    $nwork = $_POST['pname'];
    $pdate = $_POST['pdate'];
    $amt = $_POST['amt'];
    $remarks = $_POST['remarks'];
}
require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into labourexpense values('$breedId', '$nwork', '$pdate', '$amt', '$remarks')";
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            header('refresh:1, url= labourExpense.php');
            } else {
        echo "Query error ".mysqli_error($conn);
            }
}
}
?>
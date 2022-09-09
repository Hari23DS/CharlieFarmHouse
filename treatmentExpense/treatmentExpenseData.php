<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if (isset($_POST)) {
    $breedType = $_POST['breedType'];
    $pdate = $_POST['pdate'];
    $treatment = $_POST['treatment'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $remarks = $_POST['remarks'];
}
require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into treatementExpense values('$breedType', '$pdate', '$treatment', '$quantity', '$amount', '$remarks')";
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            header('refresh:1, url= treatmentExpense.php');
            } else {
        echo "Query error ".mysqli_error($conn);
            }
}
}

?>
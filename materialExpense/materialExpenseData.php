<?php
session_start();
if ($_SESSION['auth'] == 'true') {

if (isset($_POST)) {
    $pname = $_POST['pname'];
    $pusedfr = $_POST['pusedfr'];
    $amt = $_POST['amt'];
    $dt = $_POST['dt'];
    $remarks = $_POST['remarks'];
}
require '../assets/template/db.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into materialexpense values('$pname', '$pusedfr', '$dt', '$amt', '$remarks')";
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            header('refresh:1, url= materialExpense.php');
            } else {
        echo "Query error ".mysqli_error($conn);
            }
}
}

?>
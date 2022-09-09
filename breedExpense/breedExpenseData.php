<?php
session_start();
if ($_SESSION['auth'] == 'true') {
if (isset($_POST)) {
    $breedId = $_POST['breedId'];
    $breedType = $_POST['breedType'];
    $breedName = $_POST['breedName'];
    $gender = $_POST['gender'];
    $purchaseDate = $_POST['purchaseDate'];
    $weight = $_POST['weight'];
    $amount = $_POST['amount'];
    $remarks = $_POST['remarks'];
}

require '../assets/template/db.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "insert into breedexpense values('$breedId', '$breedType', '$breedName', '$gender',  '$purchaseDate', '$weight', '$amount', '$remarks')";
    try {
        if(mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>";
            echo "alert('Data saved successfully')";
            echo "</script>";
            header('refresh:1, url= breedExpense.php');
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('Breed ID unavailable')";
                echo "</script>";
                header('refresh:1, url= breedExpense.php');
            }
    } catch (Exception $e){
        echo "<script type='text/javascript'>";
        echo "alert('Breed ID unavailable')";
        echo "</script>";
        header('refresh:1, url= breedExpense.php');
    }
}
        
}

?>